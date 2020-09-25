<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AirportWeather
 *
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
 * @property string|null $visual_conditions
 * @property string|null $dp
 * @method static Builder|AirportWeather newModelQuery()
 * @method static Builder|AirportWeather newQuery()
 * @method static Builder|AirportWeather query()
 * @method static Builder|AirportWeather whereAltimeter($value)
 * @method static Builder|AirportWeather whereCreatedAt($value)
 * @method static Builder|AirportWeather whereDp($value)
 * @method static Builder|AirportWeather whereIcao($value)
 * @method static Builder|AirportWeather whereId($value)
 * @method static Builder|AirportWeather whereMetar($value)
 * @method static Builder|AirportWeather whereTaf($value)
 * @method static Builder|AirportWeather whereTemp($value)
 * @method static Builder|AirportWeather whereUpdatedAt($value)
 * @method static Builder|AirportWeather whereVisualConditions($value)
 * @method static Builder|AirportWeather whereWind($value)
 * @mixin \Eloquent
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
