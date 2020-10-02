<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OnlineAtc
 *
 * @property int $id
 * @property int $controller_cid
 * @property string $name
 * @property string $position
 * @property string $freq
 * @property string $time_logon
 * @property string $created_at
 * @property string $updated_at
 * @property int $cid
 * @property-read mixed $logon_time
 * @property-read mixed $time_online
 * @method static Builder|OnlineAtc newModelQuery()
 * @method static Builder|OnlineAtc newQuery()
 * @method static Builder|OnlineAtc query()
 * @method static Builder|OnlineAtc whereCid($value)
 * @method static Builder|OnlineAtc whereCreatedAt($value)
 * @method static Builder|OnlineAtc whereFreq($value)
 * @method static Builder|OnlineAtc whereId($value)
 * @method static Builder|OnlineAtc whereName($value)
 * @method static Builder|OnlineAtc wherePosition($value)
 * @method static Builder|OnlineAtc whereTimeLogon($value)
 * @method static Builder|OnlineAtc whereUpdatedAt($value)
 * @mixin Eloquent
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
