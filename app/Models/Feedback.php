<?php

namespace App\Models;

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

}
