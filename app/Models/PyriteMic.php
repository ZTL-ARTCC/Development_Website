<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

// TODO: This and bronze mid can most likely be combined into one table
/**
 * App\Models\PyriteMic
 *
 * @property int $id
 * @property int $controller_cid
 * @property int $year
 * @property string $year_hours
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property-read mixed $name
 * @method static Builder|PyriteMic newModelQuery()
 * @method static Builder|PyriteMic newQuery()
 * @method static Builder|PyriteMic query()
 * @method static Builder|PyriteMic whereControllerId($value)
 * @method static Builder|PyriteMic whereCreatedAt($value)
 * @method static Builder|PyriteMic whereId($value)
 * @method static Builder|PyriteMic whereUpdatedAt($value)
 * @method static Builder|PyriteMic whereYear($value)
 * @method static Builder|PyriteMic whereYearHours($value)
 * @mixin \Eloquent
 */
class PyriteMic extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pyrite_mic';

    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'year', 'year_hours', 'created_at', 'updated_at'];

    public function getNameAttribute() {
        $user = User::find($this->controller_id);

        return $user->full_name;
    }
}
