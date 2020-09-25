<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_id
 * @property string $controller_callsign
 * @property int $reporter_id
 * @property string $reporter_callsign
 * @property string $aircraft_callsign
 * @property string $time
 * @property string $date
 * @property string $description
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Incident extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'incident_reports';

    /**
     * @var array
     */
    protected $fillable = ['controller_id', 'controller_callsign', 'reporter_id', 'reporter_callsign',
                           'aircraft_callsign', 'time', 'date', 'description', 'status', 'created_at', 'updated_at'];

}
