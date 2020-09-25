<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DiscordUser
 *
 * @property int $id
 * @property int $cid
 * @property string $name
 * @property int $rating_id
 * @property integer $discord_id
 * @property string $discord_username
 * @property string $online_time_month
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|DiscordUser newModelQuery()
 * @method static Builder|DiscordUser newQuery()
 * @method static Builder|DiscordUser query()
 * @method static Builder|DiscordUser whereCid($value)
 * @method static Builder|DiscordUser whereCreatedAt($value)
 * @method static Builder|DiscordUser whereDiscordId($value)
 * @method static Builder|DiscordUser whereDiscordUsername($value)
 * @method static Builder|DiscordUser whereId($value)
 * @method static Builder|DiscordUser whereName($value)
 * @method static Builder|DiscordUser whereOnlineTimeMonth($value)
 * @method static Builder|DiscordUser whereRatingId($value)
 * @method static Builder|DiscordUser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DiscordUser extends Model {
    /**
     * @var array
     */
    protected $fillable = ['cid', 'name', 'rating_id', 'discord_id', 'discord_username', 'online_time_month',
                           'created_at', 'updated_at'];

}
