<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

// TODO: This and bronze mid can most likely be combined into one table
/**
 * @property int $id
 * @property int $controller_cid
 * @property int $year
 * @property string $year_hours
 * @property string $created_at
 * @property string $updated_at
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
