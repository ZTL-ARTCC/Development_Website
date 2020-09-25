<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $event_id
 * @property int $controller_cid
 * @property int $position_id
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 * @property int $choice_number
 * @property int $reminder
 * @property string $created_at
 * @property string $updated_at
 */
class EventRegistration extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_registration';

    /**
     * @var array
     */
    protected $fillable = ['event_id', 'controller_cid', 'position_id', 'start_time', 'end_time', 'status',
                           'choice_number', 'reminder', 'created_at', 'updated_at'];

    public function getControllerNameAttribute() {
        $controller = User::find($this->controller_id);
        if (isset($controller)) {
            $name = User::find($this->controller_id)->full_name_rating;
            return $name;
        } else {
            return '[Controller no longer exists]';
        }
    }

    public function getPositionNameAttribute() {
        $name = EventPosition::find($this->position_id)->name;
        return $name;
    }
}
