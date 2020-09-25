<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id    public function getTimeOnlineAttribute() {
        $time_logon = Carbon::createFromTimestamp($this->time_logon);
        $time_now = Carbon::now();

        $time_online = $time_logon->diffInMinutes($time_now) * 60;

        $time = date("H:i", $time_online);

        return $time;
    }

    public function getLogonTimeAttribute() {
        $time = Carbon::createFromTimestamp($this->time_logon);
        return $time->format('m/d/Y H:i') . 'z';
    }
 * @property int $controller_cid
 * @property string $name
 * @property string $position
 * @property string $freq
 * @property string $time_logon
 * @property string $created_at
 * @property string $updated_at
 */
class OnlineAtc extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'online_atc';

    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'name', 'position', 'freq', 'time_logon', 'created_at', 'updated_at'];

    public function getTimeOnlineAttribute() {
        $time_logon = Carbon::createFromTimestamp($this->time_logon);
        $time_now = Carbon::now();

        $time_online = $time_logon->diffInMinutes($time_now) * 60;

        $time = date("H:i", $time_online);

        return $time;
    }

    public function getLogonTimeAttribute() {
        $time = Carbon::createFromTimestamp($this->time_logon);
        return $time->format('m/d/Y H:i') . 'z';
    }
}
