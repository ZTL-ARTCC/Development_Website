<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EventRegistration
 *
 * @property int $id
 * @property int $event_id
 * @property int $controller_cid
 * @property int $position_id
 * @property string $start_time
 * @property string $end_time
 * @property int $status
 * @property int $choice_number
 * @property int $reminder
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property-read mixed $controller_name
 * @property-read mixed $position_name
 * @method static Builder|EventRegistration newModelQuery()
 * @method static Builder|EventRegistration newQuery()
 * @method static Builder|EventRegistration query()
 * @method static Builder|EventRegistration whereChoiceNumber($value)
 * @method static Builder|EventRegistration whereControllerId($value)
 * @method static Builder|EventRegistration whereCreatedAt($value)
 * @method static Builder|EventRegistration whereEndTime($value)
 * @method static Builder|EventRegistration whereEventId($value)
 * @method static Builder|EventRegistration whereId($value)
 * @method static Builder|EventRegistration wherePositionId($value)
 * @method static Builder|EventRegistration whereReminder($value)
 * @method static Builder|EventRegistration whereStartTime($value)
 * @method static Builder|EventRegistration whereStatus($value)
 * @method static Builder|EventRegistration whereUpdatedAt($value)
 * @mixin Eloquent
 */
class EventRegistration extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_registration';

    /**
     * @var array
     */
    protected $fillable = ['event_id', 'controller_cid', 'position_id', 'start_time', 'end_time', 'status',
                           'choice_number', 'reminder', 'created_at', 'updated_at'];

    public function getControllerNameAttribute() {
        $controller = User::find($this->controller_id);
        if (isset($controller)) {
            $name = User::find($this->controller_id)->full_name_rating;
            return $name;
        } else {
            return '[Controller no longer exists]';
        }
    }

    public function getPositionNameAttribute() {
        $name = EventPosition::find($this->position_id)->name;
        return $name;
    }
}
