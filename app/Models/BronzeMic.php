<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_id
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
    protected $fillable = ['controller_id', 'month', 'year', 'month_hours', 'created_at', 'updated_at'];

}
