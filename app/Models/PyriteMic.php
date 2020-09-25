<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_id
 * @property int $year
 * @property string $year_hours
 * @property string $created_at
 * @property string $updated_at
 */
class PyriteMic extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pyrite_mic';

    /**
     * @var array
     */
    protected $fillable = ['controller_id', 'year', 'year_hours', 'created_at', 'updated_at'];

}
