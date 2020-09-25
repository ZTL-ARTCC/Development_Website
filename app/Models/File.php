<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $description
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 */
class File extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'type', 'description', 'path', 'created_at', 'updated_at'];

}
