<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $first_position
 * @property string $last_position
 * @property string $created_at
 * @property string $updated_at
 */
class PositionPreset extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'first_position', 'last_position', 'created_at', 'updated_at'];

}
