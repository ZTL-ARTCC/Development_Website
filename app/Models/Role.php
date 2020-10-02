<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Permission[] $permissions
 * @property RoleUser[] $roleUsers
 * @method static Builder|Role newModelQuery()
 * @method static Builder|Role newQuery()
 * @method static Builder|Role query()
 * @method static Builder|Role whereCreatedAt($value)
 * @method static Builder|Role whereDescription($value)
 * @method static Builder|Role whereDisplayName($value)
 * @method static Builder|Role whereId($value)
 * @method static Builder|Role whereName($value)
 * @method static Builder|Role whereUpdatedAt($value)
 * @mixin Eloquent
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
        return $this->belongsToMany('App\Models\Permission');
    }

    /**
     * @return HasMany
     */
    public function roleUsers() {
        return $this->hasMany('App\Models\RoleUser');
    }
}
