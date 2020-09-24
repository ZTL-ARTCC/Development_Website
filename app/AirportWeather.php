<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AirportWeather extends Model {
    protected $table = 'airport_weather';
    protected $fillable = [
        "icao",
        "metar",
        "taf",
        "visual_conditions",
        "altimeter",
        "wind",
        "temp",
        "dp",
        "created_at",
        "updated_at"
    ];
}