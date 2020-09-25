<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $requester_cid
 * @property string $name
 * @property string $email
 * @property int $rating
 * @property string $home
 * @property string $reason
 * @property boolean $status
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class VisitorRequest extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visit_requests';

    /**
     * @var array
     */
    protected $fillable = ['requester_cid', 'name', 'email', 'rating', 'home', 'reason', 'status', 'updated_by', 'created_at',
                           'updated_at'];

}
