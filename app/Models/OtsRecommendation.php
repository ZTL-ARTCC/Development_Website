<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_id
 * @property int $recommender_id
 * @property int $position
 * @property int $ins_id
 * @property int $status
 * @property string $report
 * @property string $created_at
 * @property string $updated_at
 */
class OtsRecommendation extends Model {
    /**
     * @var array
     */
    protected $fillable = ['controller_id', 'recommender_id', 'position', 'ins_id', 'status', 'report', 'created_at',
                           'updated_at'];

}
