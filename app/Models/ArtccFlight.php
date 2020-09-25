<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
