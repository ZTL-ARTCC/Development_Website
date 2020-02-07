<?php
namespace App\Libraries;
use Exception;
use DB;
use TeamSpeak3;
use TeamSpeak3_Adapter_ServerQuery_Exception;
use TeamSpeak3_Node_Client;
/**
 * Provides static methods for managing TeamSpeak.
 */
class TeamSpeak
{
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
    
    public static function enabled()
    {
        return env('TS_HOST') && env('TS_USER')  && env('TS_PASS') && env('TS_PORT') && env('TS_QUERY_PORT');
    }

    public static function run($nickname = 'ZTL TeamSpeak Bot', $nonBlocking = false)
    {
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
        try {
            $factory = TeamSpeak3::factory($connectionUrl);
        } catch (TeamSpeak3_Adapter_ServerQuery_Exception $e) {
            if (stripos($e->getMessage(), 'nickname is already in use')) {
                // Try again in 3 seconds
                sleep(3);
                $factory = TeamSpeak3::factory($connectionUrl);
            }
        }

        return $factory;
    }

 
    }     
