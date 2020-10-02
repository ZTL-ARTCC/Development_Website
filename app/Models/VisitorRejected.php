<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VisitorRejected
 *
 * @property int $id
 * @property int $rejected_cid
 * @property int $staff_cid
 * @property string $created_at
 * @property string $updated_at
 * @property int $cid
 * @method static Builder|VisitorRejected newModelQuery()
 * @method static Builder|VisitorRejected newQuery()
 * @method static Builder|VisitorRejected query()
 * @method static Builder|VisitorRejected whereCid($value)
 * @method static Builder|VisitorRejected whereCreatedAt($value)
 * @method static Builder|VisitorRejected whereId($value)
 * @method static Builder|VisitorRejected whereStaffCid($value)
 * @method static Builder|VisitorRejected whereUpdatedAt($value)
 * @mixin Eloquent
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
    protected $fillable = ['rejected_cid', 'staff_cid', 'created_at', 'updated_at'];

}
