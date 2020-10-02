<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

// TODO: This and pyrite mic can most likely be combined into one table

/**
 * App\Models\BronzeMic
 *
 * @property int $id
 * @property int $cid
 * @property int $month
 * @property int $year
 * @property string $month_hours
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property-read mixed $name
 * @method static Builder|BronzeMic newModelQuery()
 * @method static Builder|BronzeMic newQuery()
 * @method static Builder|BronzeMic query()
 * @method static Builder|BronzeMic whereControllerId($value)
 * @method static Builder|BronzeMic whereCreatedAt($value)
 * @method static Builder|BronzeMic whereId($value)
 * @method static Builder|BronzeMic whereMonth($value)
 * @method static Builder|BronzeMic whereMonthHours($value)
 * @method static Builder|BronzeMic whereUpdatedAt($value)
 * @method static Builder|BronzeMic whereYear($value)
 * @mixin Eloquent
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

    public function getNameAttribute() {
        $user = User::find($this->controller_id);

        return $user->full_name;
    }
}
