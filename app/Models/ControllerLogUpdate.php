<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 */
class ControllerLogUpdate extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'controller_log_update';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

}
