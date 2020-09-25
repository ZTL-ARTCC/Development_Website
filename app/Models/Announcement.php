<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $body
 * @property int $staff_member
 * @property string $created_at
 * @property string $updated_at
 */
class Announcement extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'announcement';

    /**
     * @var array
     */
    protected $fillable = ['body', 'staff_member', 'created_at', 'updated_at'];

}
