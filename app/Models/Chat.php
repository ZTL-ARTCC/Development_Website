<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property string $controller_name
 * @property string $message
 * @property boolean $deleted
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
    protected $fillable = ['cid', 'controller_name', 'message', 'deleted', 'created_at', 'updated_at'];

}
