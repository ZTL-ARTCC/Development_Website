<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ControllerLogUpdate
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|ControllerLogUpdate newModelQuery()
 * @method static Builder|ControllerLogUpdate newQuery()
 * @method static Builder|ControllerLogUpdate query()
 * @method static Builder|ControllerLogUpdate whereCreatedAt($value)
 * @method static Builder|ControllerLogUpdate whereId($value)
 * @method static Builder|ControllerLogUpdate whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ControllerLogUpdate extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'controller_log_update';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

}
