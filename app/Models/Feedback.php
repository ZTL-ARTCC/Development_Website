<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property int $controller_cid
 * @property string $position
 * @property int $service_level
 * @property string $callsign
 * @property string $pilot_name
 * @property string $pilot_email
 * @property int $pilot_cid
 * @property string $comments
 * @property string $staff_comments
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property-read mixed $controller_name
 * @property-read mixed $service_level_text
 * @method static Builder|Feedback newModelQuery()
 * @method static Builder|Feedback newQuery()
 * @method static Builder|Feedback query()
 * @method static Builder|Feedback whereCallsign($value)
 * @method static Builder|Feedback whereComments($value)
 * @method static Builder|Feedback whereControllerId($value)
 * @method static Builder|Feedback whereCreatedAt($value)
 * @method static Builder|Feedback whereId($value)
 * @method static Builder|Feedback wherePilotCid($value)
 * @method static Builder|Feedback wherePilotEmail($value)
 * @method static Builder|Feedback wherePilotName($value)
 * @method static Builder|Feedback wherePosition($value)
 * @method static Builder|Feedback whereServiceLevel($value)
 * @method static Builder|Feedback whereStaffComments($value)
 * @method static Builder|Feedback whereStatus($value)
 * @method static Builder|Feedback whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Feedback extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'position', 'service_level', 'callsign', 'pilot_name', 'pilot_email',
                           'pilot_cid', 'comments', 'staff_comments', 'status', 'created_at', 'updated_at'];

    public function getServiceLevelTextAttribute() {
        switch ($this->service_level) {
        case 0:
            return 'Excellent';
        case 1:
            return 'Good';
        case 2:
            return 'Fair';
        case 3:
            return 'Poor';
        case 4:
            return 'Unsatisfactory';
        case 5:
            return 'N/A';
        default:
            return 'Value not found';
        }
    }

    public function getControllerNameAttribute() {
        $controller = User::find($this->controller_id);
        if (isset($controller)) {
            $name = $controller->full_name;
        } else {
            $name = '[This controller is no longer a member]';
        }
        return $name;
    }
}
