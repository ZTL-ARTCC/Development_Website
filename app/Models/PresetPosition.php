<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PresetPosition
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|PresetPosition newModelQuery()
 * @method static Builder|PresetPosition newQuery()
 * @method static Builder|PresetPosition query()
 * @method static Builder|PresetPosition whereCreatedAt($value)
 * @method static Builder|PresetPosition whereId($value)
 * @method static Builder|PresetPosition whereName($value)
 * @method static Builder|PresetPosition whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PresetPosition extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

}
