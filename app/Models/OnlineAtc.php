<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_cid
 * @property string $name
 * @property string $position
 * @property string $freq
 * @property string $time_logon
 * @property string $created_at
 * @property string $updated_at
 */
class OnlineAtc extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'online_atc';

    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'name', 'position', 'freq', 'time_logon', 'created_at', 'updated_at'];

}
