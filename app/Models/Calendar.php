<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $time
 * @property string $body
 * @property int $type
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property int $visible
 */
class Calendar extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar';

    /**
     * @var array
     */
    protected $fillable = ['title', 'date', 'time', 'body', 'type', 'created_by', 'updated_by', 'created_at',
                           'updated_at', 'visible'];

}
