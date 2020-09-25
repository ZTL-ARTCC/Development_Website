<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// TODO: This and pyrite mic can most likely be combined into one table
/**
 * @property int $id
 * @property int $cid
 * @property int $month
 * @property int $year
 * @property string $month_hours
 * @property string $created_at
 * @property string $updated_at
 */
class BronzeMic extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bronze_mic';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'month', 'year', 'month_hours', 'created_at', 'updated_at'];

}
