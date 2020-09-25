<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ArtccFlight
 *
 * @property int $id
 * @property int $pilot_cid
 * @property string $pilot_name
 * @property string $callsign
 * @property string $aircraft_type
 * @property string $departure
 * @property string $arrival
 * @property string $route
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 * @property string $dep
 * @property string $arr
 * @method static Builder|ArtccFlight newModelQuery()
 * @method static Builder|ArtccFlight newQuery()
 * @method static Builder|ArtccFlight query()
 * @method static Builder|ArtccFlight whereArr($value)
 * @method static Builder|ArtccFlight whereCallsign($value)
 * @method static Builder|ArtccFlight whereCreatedAt($value)
 * @method static Builder|ArtccFlight whereDep($value)
 * @method static Builder|ArtccFlight whereId($value)
 * @method static Builder|ArtccFlight wherePilotCid($value)
 * @method static Builder|ArtccFlight wherePilotName($value)
 * @method static Builder|ArtccFlight whereRoute($value)
 * @method static Builder|ArtccFlight whereType($value)
 * @method static Builder|ArtccFlight whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ArtccFlight extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flights_within_artcc';

    /**
     * @var array
     */
    protected $fillable = ['pilot_cid', 'pilot_name', 'callsign', 'aircraft_type', 'departure', 'arrival', 'route', 'created_at',
                           'updated_at'];

}
