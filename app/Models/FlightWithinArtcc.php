<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
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
 * @method static Builder|FlightWithinArtcc newModelQuery()
 * @method static Builder|FlightWithinArtcc newQuery()
 * @method static Builder|FlightWithinArtcc query()
 * @method static Builder|FlightWithinArtcc whereArr($value)
 * @method static Builder|FlightWithinArtcc whereCallsign($value)
 * @method static Builder|FlightWithinArtcc whereCreatedAt($value)
 * @method static Builder|FlightWithinArtcc whereDep($value)
 * @method static Builder|FlightWithinArtcc whereId($value)
 * @method static Builder|FlightWithinArtcc wherePilotCid($value)
 * @method static Builder|FlightWithinArtcc wherePilotName($value)
 * @method static Builder|FlightWithinArtcc whereRoute($value)
 * @method static Builder|FlightWithinArtcc whereType($value)
 * @method static Builder|FlightWithinArtcc whereUpdatedAt($value)
 * @mixin Eloquent
 */
class FlightWithinArtcc extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flights_within_artcc';

    /**
     * @var array
     */
    protected $fillable = ['pilot_cid', 'pilot_name', 'callsign', 'aircraft_type', 'departure', 'arrival', 'route',
                           'created_at',
                           'updated_at'];

}
