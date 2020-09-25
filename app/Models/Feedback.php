<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
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
 */
class Feedback extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'position', 'service_level', 'callsign', 'pilot_name', 'pilot_email',
                           'pilot_cid', 'comments', 'staff_comments', 'status', 'created_at', 'updated_at'];

    public function getServiceLevelTextAttribute() {
        $level = $this->service_level;
        if ($level == 0) {
            return 'Excellent';
        } else {
            if ($level == 1) {
                return 'Good';
            } else {
                if ($level == 2) {
                    return 'Fair';
                } else {
                    if ($level == 3) {
                        return 'Poor';
                    } else {
                        if ($level == 4) {
                            return 'Unsatisfactory';
                        } else {
                            if ($level == 5) {
                                return 'N/A';
                            } else {
                                return 'Value not Found';
                            }
                        }
                    }
                }
            }
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
