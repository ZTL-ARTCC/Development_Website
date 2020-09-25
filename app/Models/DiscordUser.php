<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property string $name
 * @property int $rating_id
 * @property integer $discord_id
 * @property string $discord_username
 * @property string $online_time_month
 * @property string $created_at
 * @property string $updated_at
 */
class DiscordUser extends Model {
    /**
     * @var array
     */
    protected $fillable = ['cid', 'name', 'rating_id', 'discord_id', 'discord_username', 'online_time_month',
                           'created_at', 'updated_at'];

}
