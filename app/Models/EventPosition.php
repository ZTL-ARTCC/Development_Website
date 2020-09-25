<?php

namespace App\Models;

use App\EventRegistration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EventPosition
 *
 * @property int $id
 * @property int $event_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property-read mixed $controller
 * @method static Builder|EventPosition newModelQuery()
 * @method static Builder|EventPosition newQuery()
 * @method static Builder|EventPosition query()
 * @method static Builder|EventPosition whereCreatedAt($value)
 * @method static Builder|EventPosition whereEventId($value)
 * @method static Builder|EventPosition whereId($value)
 * @method static Builder|EventPosition whereName($value)
 * @method static Builder|EventPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventPosition extends Model {
    /**
     * @var array
     */
    protected $fillable = ['event_id', 'name', 'created_at', 'updated_at'];

    public function getControllerAttribute() {
        $controllers =
            EventRegistration::where('position_id', $this->id)->where('status', 1)->orderBy('start_time', 'ASC')
                             ->get();

        return $controllers;
    }
}
