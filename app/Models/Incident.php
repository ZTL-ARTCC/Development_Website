<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Incident
 *
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
 * @property int|null $controller_id
 * @property int|null $reporter_id
 * @property-read mixed $controller_name
 * @property-read mixed $reporter_name
 * @method static Builder|Incident newModelQuery()
 * @method static Builder|Incident newQuery()
 * @method static Builder|Incident query()
 * @method static Builder|Incident whereAircraftCallsign($value)
 * @method static Builder|Incident whereControllerCallsign($value)
 * @method static Builder|Incident whereControllerId($value)
 * @method static Builder|Incident whereCreatedAt($value)
 * @method static Builder|Incident whereDate($value)
 * @method static Builder|Incident whereDescription($value)
 * @method static Builder|Incident whereId($value)
 * @method static Builder|Incident whereReporterCallsign($value)
 * @method static Builder|Incident whereReporterId($value)
 * @method static Builder|Incident whereStatus($value)
 * @method static Builder|Incident whereTime($value)
 * @method static Builder|Incident whereUpdatedAt($value)
 * @mixin \Eloquent
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
