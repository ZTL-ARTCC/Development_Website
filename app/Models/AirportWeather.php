<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $icao
 * @property string $metar
 * @property string $taf
 * @property int $conditions
 * @property string $altimeter
 * @property string $wind
 * @property string $temp
 * @property string $dew_point
 * @property string $created_at
 * @property string $updated_at
 */
class AirportWeather extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airport_weather';

    /**
     * @var array
     */
    protected $fillable = ['icao', 'metar', 'taf', 'conditions', 'altimeter', 'wind', 'temp', 'dew_point', 'created_at',
                           'updated_at'];

}
