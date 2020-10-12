<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Airport
 *
 * @property int $id
 * @property string $name
 * @property boolean $front_page
 * @property string $icao
 * @property string $iata
 * @property int $front_pg
 * @property-read mixed $altimeter
 * @property-read mixed $inbound_traffic
 * @property-read mixed $metar
 * @property-read mixed $outbound_traffic
 * @property-read mixed $taf
 * @property-read mixed $temperature_dewpoint
 * @property-read mixed $visual_conditions
 * @property-read mixed $wind
 * @method static Builder|Airport newModelQuery()
 * @method static Builder|Airport newQuery()
 * @method static Builder|Airport query()
 * @method static Builder|Airport whereFrontPg($value)
 * @method static Builder|Airport whereIata($value)
 * @method static Builder|Airport whereIcao($value)
 * @method static Builder|Airport whereId($value)
 * @method static Builder|Airport whereName($value)
 * @mixin Eloquent
 */
class Airport extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'front_page', 'icao', 'iata'];

    private $url = "http://api.vateud.net/online";
    private $client;

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        $this->client = new Client();
    }

    public function getMetarAttribute() {
        $airport = AirportWeather::whereIcao($this->icao)->first();

        if (isset($airport)) {
            return $airport->metar;
        }
        
        return 'N/A';
    }

    public function getTafAttribute() {
        $airport = AirportWeather::whereIcao($this->icao)->first();

        if (isset($airport)) {
            return $airport->taf;
        }

        return 'N/A';
    }

    public function getVisualConditionsAttribute() {
        $airport = AirportWeather::whereIcao($this->icao)->first();

        if (isset($airport)) {
            return $airport->visual_conditions;
        }

        return 'N/A';
    }

    public function getWindAttribute() {
        $airport = AirportWeather::whereIcao($this->icao)->first();

        if (isset($airport)) {
            return $airport->wind;
        }

        return 'N/A';
    }

    public function getAltimeterAttribute() {
        $airport = AirportWeather::whereIcao($this->icao)->first();

        if (isset($airport)) {
            return $airport->altimeter;
        }

        return 'N/A';
    }

    public function getTemperatureDewpointAttribute() {
        $airport = AirportWeather::whereIcao($this->icao)->first();

        if (isset($airport)) {
            return $airport->temp . '/' . $airport->dp;
        }

        return 'N/A';
    }

    public function getInboundTrafficAttribute() {
        $res = $this->client->get("$this->url/arrivals/" . $this->icao . '.json');
        $pilots = json_decode($res->getBody()->getContents(), true);

        if ($pilots) {
            return collect($pilots);
        }

        return null;
    }

    public function getOutboundTrafficAttribute() {
        $res = $this->client->get("$this->url/departures/" . $this->icao . '.json');
        $pilots = json_decode($res->getBody()->getContents(), true);

        if ($pilots) {
            return collect($pilots);
        }

        return null;
    }
}
