<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_id
 * @property int $trainer_id
 * @property int $position
 * @property int $type
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string $duration
 * @property string $comments
 * @property string $ins_comments
 * @property string $created_at
 * @property string $updated_at
 */
class TrainingTicket extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_id', 'trainer_id', 'position', 'type', 'date', 'start_time', 'end_time',
                           'duration', 'comments', 'ins_comments', 'created_at', 'updated_at'];

}
