<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Calendar
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $time
 * @property string $body
 * @property int $type
 * @property int $created_by_cid
 * @property int $updated_by_cid
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $visible
 * @property int $created_by
 * @property int|null $updated_by
 * @method static Builder|Calendar newModelQuery()
 * @method static Builder|Calendar newQuery()
 * @method static Builder|Calendar query()
 * @method static Builder|Calendar whereBody($value)
 * @method static Builder|Calendar whereCreatedAt($value)
 * @method static Builder|Calendar whereCreatedBy($value)
 * @method static Builder|Calendar whereDate($value)
 * @method static Builder|Calendar whereId($value)
 * @method static Builder|Calendar whereTime($value)
 * @method static Builder|Calendar whereTitle($value)
 * @method static Builder|Calendar whereType($value)
 * @method static Builder|Calendar whereUpdatedAt($value)
 * @method static Builder|Calendar whereUpdatedBy($value)
 * @method static Builder|Calendar whereVisible($value)
 * @mixin Eloquent
 */
class Calendar extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar';

    /**
     * @var array
     */
    protected $fillable = ['title', 'date', 'time', 'body', 'type', 'created_by_cid', 'updated_by_cid', 'created_at',
                           'updated_at', 'visible'];

}
