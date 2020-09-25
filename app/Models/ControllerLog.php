<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property string $name
 * @property string $position
 * @property string $duration
 * @property string $date
 * @property string $time_logon
 * @property string $streamupdate
 * @property string $created_at
 * @property string $updated_at
 */
class ControllerLog extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'controller_log';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'name', 'position', 'duration', 'date', 'time_logon', 'streamupdate', 'created_at',
                           'updated_at'];

}
