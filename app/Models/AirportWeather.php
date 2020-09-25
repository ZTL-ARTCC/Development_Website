<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $icao
 * @property string $metar
 * @property string $taf
 * @property string $visual_conditions
 * @property string $altimeter
 * @property string $wind
 * @property string $temp
 * @property string $dp
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
    protected $fillable = ['icao', 'metar', 'taf', 'visual_conditions', 'altimeter', 'wind', 'temp', 'dp', 'created_at',
                           'updated_at'];

}
