<?php

namespace App\Models;

use App\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Permission[] $permissions
 * @property RoleUser[] $roleUsers
 */
class Role extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description', 'created_at', 'updated_at'];

    /**
     * @return BelongsToMany
     */
    public function permissions() {
        return $this->belongsToMany('App\models\Permission');
    }

    /**
     * @return HasMany
     */
    public function roleUsers() {
        return $this->hasMany('App\models\RoleUser');
    }
}
