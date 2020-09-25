<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_cid
 * @property string $controller_callsign
 * @property int $reporter_cid
 * @property string $reporter_callsign
 * @property string $aircraft_callsign
 * @property string $time
 * @property string $date
 * @property string $description
 * @property boolean $status
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
    protected $fillable = ['controller_cid', 'controller_callsign', 'reporter_cid', 'reporter_callsign',
                           'aircraft_callsign', 'time', 'date', 'description', 'status', 'created_at', 'updated_at'];

    public function getControllerNameAttribute() {
        $user = User::find($this->controller_id);
        if (isset($user)) {
            return $user->full_name;
        } else {
            return '[Hidden: Archived or Controller Removed]';
        }
    }

    public function getReporterNameAttribute() {
        $user = User::find($this->reporter_id);
        if (isset($user)) {
            return $user->full_name;
        } else {
            return '[Hidden: Archived or Controller Removed]';
        }
    }
}
