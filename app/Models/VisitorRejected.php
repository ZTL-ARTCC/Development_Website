<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property int $staff_cid
 * @property string $created_at
 * @property string $updated_at
 */
class VisitorRejected extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visit_agreement_reject';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'staff_cid', 'created_at', 'updated_at'];

}
