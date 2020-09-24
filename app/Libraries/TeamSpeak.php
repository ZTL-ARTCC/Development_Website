<?php

namespace App\Libraries;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use TeamSpeak3_Node_Client;

/**
 * Provides static methods for managing TeamSpeak.
 */
class TeamSpeak {
    const CONNECTION_TIMED_OUT = 110;
    const CONNECTION_REFUSED = 111;
    const CLIENT_INVALID_ID = 512;
    const CLIENT_NICKNAME_INUSE = 513;
    const DATABASE_EMPTY_RESULT_SET = 1281;
    const PERMISSIONS_CLIENT_INSUFFICIENT = 2568;
    const CACHE_NOTIFICATION_MANDATORY = 'teamspeak_notify_mandatory_';
    const CACHE_NICKNAME_PARTIALLY_CORRECT = 'teamspeak_nickname_partially_correct_';
    const CACHE_NICKNAME_PARTIALLY_CORRECT_GRACE = 'teamspeak_nickname_partially_correct_grace_';
    const CACHE_PREFIX_IDLE_NOTIFY = 'teamspeak_notify_idle_';

    public static function enabled() {
        return env('TS_HOST') && env('TS_USER') && env('TS_PASS') && env('TS_PORT') && env('TS_QUERY_PORT');
    }

    public static function run($nickname = 'ZTL TeamSpeak Bot', $nonBlocking = false) {
        $connectionUrl = sprintf(
            'serverquery://%s:%s@%s:%s/?nickname=%s&server_port=%s%s#no_query_clients',
            urlencode(env('TS_USER')),
            urlencode(env('TS_PASS')),
            env('TS_HOST'),
            env('TS_QUERY_PORT'),
            urlencode($nickname),
            env('TS_PORT'),
            $nonBlocking ? '&blocking=0' : ''
        );

    }

    public static function checkClientIdleTime(TeamSpeak3_Node_Client $client, Account $member) {
        $idleTime = floor($client['client_idle_time'] / 1000 / 60); // minutes
        if ($member->hasPermissionTo('teamspeak/idle/permanent') || $member->is_on_network) {
            return;
        } else {
            if ($member->hasPermissionTo('teamspeak/idle/temporary')) {
                $maxIdleTime = 120;
            } else {
                $maxIdleTime = 60;

            }
        }
        $notified = Cache::has(self::CACHE_PREFIX_IDLE_NOTIFY . $client['client_database_id']);
        if ($idleTime >= $maxIdleTime) {
            self::pokeClient($client, trans('teamspeak.idle.kick.poke.1', ['maxIdleTime' => $maxIdleTime]));
            self::pokeClient($client, trans('teamspeak.idle.kick.poke.2'));
            self::kickClient($client, trans('teamspeak.idle.kick.reason'));
            throw new ClientKickedFromServerException;
        } else {
            if ($idleTime >= $maxIdleTime - 5 && !$notified) {
                self::pokeClient($client, trans('teamspeak.idle.poke', ['idleTime' => $idleTime]));
                Cache::put(self::CACHE_PREFIX_IDLE_NOTIFY . $client['client_database_id'], Carbon::now(), 5 * 60);
            } else {
                if (($maxIdleTime - 15 > 0) && ($idleTime >= $maxIdleTime - 15 && !$notified)) {
                    self::messageClient($client, trans('teamspeak.idle.message',
                                                       ['idleTime' => $idleTime, 'maxIdleTime' => $maxIdleTime]));
                    Cache::put(self::CACHE_PREFIX_IDLE_NOTIFY . $client['client_database_id'], Carbon::now(), 10 * 60);

                }
            }
        }

    }

}
