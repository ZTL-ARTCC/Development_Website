<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property string $c_name
 * @property string $message
 * @property int $deleted
 * @property string $format_time
 * @property string $created_at
 * @property string $updated_at
 */
class Chat extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chat_room';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'c_name', 'message', 'deleted', 'format_time', 'created_at', 'updated_at'];

}
