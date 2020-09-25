<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $front_page
 * @property string $icao
 * @property string $iata
 */
class Airport extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'front_page', 'icao', 'iata'];

    public function getMetarAttribute() {
        $airport = Metar::where('icao', $this->ltr_4)->first();

        if (isset($airport)) {
            return $airport->metar;
        } else {
            return 'N/A';
        }
    }

    public function getTafAttribute() {
        $airport = Metar::where('icao', $this->ltr_4)->first();

        if (isset($airport)) {
            return $airport->taf;
        } else {
            return 'N/A';
        }
    }

    public function getVisualConditionsAttribute() {
        $airport = Metar::where('icao', $this->ltr_4)->first();

        if (isset($airport)) {
            return $airport->visual_conditions;
        } else {
            return 'N/A';
        }
    }

    public function getWindAttribute() {
        $airport = Metar::where('icao', $this->ltr_4)->first();

        if (isset($airport)) {
            return $airport->wind;
        } else {
            return 'N/A';
        }
    }

    public function getAltimeterAttribute() {
        $airport = Metar::where('icao', $this->ltr_4)->first();

        if (isset($airport)) {
            return $airport->altimeter;
        } else {
            return 'N/A';
        }
    }

    public function getTemperatureDewpointAttribute() {
        $airport = Metar::where('icao', $this->ltr_4)->first();

        if (isset($airport)) {
            return $airport->temp . '/' . $airport->dp;
        } else {
            return 'N/A';
        }
    }

    public function getInboundTrafficAttribute() {
        $client = new Client();
        $res = $client->get('http://api.vateud.net/online/arrivals/' . $this->ltr_4 . '.json');
        $pilots = json_decode($res->getBody()->getContents(), true);

        if ($pilots) {
            return collect($pilots);
        } else {
            return null;
        }
    }

    public function getOutboundTrafficAttribute() {
        $client = new Client();
        $res = $client->get('http://api.vateud.net/online/departures/' . $this->ltr_4 . '.json');
        $pilots = json_decode($res->getBody()->getContents(), true);

        if ($pilots) {
            return collect($pilots);
        } else {
            return null;
        }
    }
}
