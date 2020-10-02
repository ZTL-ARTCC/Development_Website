<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PositionPreset
 *
 * @property int $id
 * @property string $name
 * @property string $first_position
 * @property string $last_position
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|PositionPreset newModelQuery()
 * @method static Builder|PositionPreset newQuery()
 * @method static Builder|PositionPreset query()
 * @method static Builder|PositionPreset whereCreatedAt($value)
 * @method static Builder|PositionPreset whereFirstPosition($value)
 * @method static Builder|PositionPreset whereId($value)
 * @method static Builder|PositionPreset whereLastPosition($value)
 * @method static Builder|PositionPreset whereName($value)
 * @method static Builder|PositionPreset whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PositionPreset extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'first_position', 'last_position', 'created_at', 'updated_at'];

}
