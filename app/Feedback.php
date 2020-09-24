<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
    protected $table = 'feedback';
    protected $fillable = ['id', 'controller_id', 'position', 'service_level', 'callsign', 'pilot_name',
                           'pilot_email', 'pilot_cid', 'comments', 'created_at', 'updated_at', 'status'];

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
