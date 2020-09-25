<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $event_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class EventPosition extends Model {
    /**
     * @var array
     */
    protected $fillable = ['event_id', 'name', 'created_at', 'updated_at'];

}
