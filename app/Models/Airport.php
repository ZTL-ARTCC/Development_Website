<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property boolean $front_pg
 * @property string $icao
 * @property string $iata
 */
class Airport extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'front_pg', 'icao', 'iata'];

}
