<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_cid
 * @property int $recommender_cid
 * @property int $position
 * @property int $ins_id
 * @property boolean $status
 * @property string $report
 * @property string $created_at
 * @property string $updated_at
 */
class OtsRecommendation extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'recommender_cid', 'position', 'ins_id', 'status', 'report', 'created_at',
                           'updated_at'];

}
