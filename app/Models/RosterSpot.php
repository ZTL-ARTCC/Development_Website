<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RosterSpot
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $initials
 * @property string $email
 * @property int $rating
 * @property boolean $can_train
 * @property boolean $can_events
 * @property boolean $visitor
 * @property string $visitor_from
 * @property boolean $api_exempt
 * @property int $status
 * @property boolean $loa
 * @property boolean $del
 * @property boolean $gnd
 * @property boolean $twr
 * @property boolean $app
 * @property boolean $ctr
 * @property boolean $train_pwr
 * @property boolean $monitor_pwr
 * @property int $opt
 * @property string $remember_token
 * @property string $json_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $time_added_to_facility
 * @property int $training_power
 * @property int $mentor_power
 * @property int $max
 * @property string $path
 * @property string $fname
 * @property string $lname
 * @property int $rating_id
 * @property int $canTrain
 * @property int $canEvents
 * @method static Builder|RosterSpot newModelQuery()
 * @method static Builder|RosterSpot newQuery()
 * @method static Builder|RosterSpot query()
 * @method static Builder|RosterSpot whereApiExempt($value)
 * @method static Builder|RosterSpot whereApp($value)
 * @method static Builder|RosterSpot whereCanEvents($value)
 * @method static Builder|RosterSpot whereCanTrain($value)
 * @method static Builder|RosterSpot whereCreatedAt($value)
 * @method static Builder|RosterSpot whereCtr($value)
 * @method static Builder|RosterSpot whereDel($value)
 * @method static Builder|RosterSpot whereEmail($value)
 * @method static Builder|RosterSpot whereFname($value)
 * @method static Builder|RosterSpot whereGnd($value)
 * @method static Builder|RosterSpot whereId($value)
 * @method static Builder|RosterSpot whereInitials($value)
 * @method static Builder|RosterSpot whereJsonToken($value)
 * @method static Builder|RosterSpot whereLname($value)
 * @method static Builder|RosterSpot whereLoa($value)
 * @method static Builder|RosterSpot whereMax($value)
 * @method static Builder|RosterSpot whereMentorPower($value)
 * @method static Builder|RosterSpot whereMonitorPwr($value)
 * @method static Builder|RosterSpot whereOpt($value)
 * @method static Builder|RosterSpot wherePath($value)
 * @method static Builder|RosterSpot whereRatingId($value)
 * @method static Builder|RosterSpot whereRememberToken($value)
 * @method static Builder|RosterSpot whereStatus($value)
 * @method static Builder|RosterSpot whereTimeAddedToFacility($value)
 * @method static Builder|RosterSpot whereTrainPwr($value)
 * @method static Builder|RosterSpot whereTrainingPower($value)
 * @method static Builder|RosterSpot whereTwr($value)
 * @method static Builder|RosterSpot whereUpdatedAt($value)
 * @method static Builder|RosterSpot whereVisitor($value)
 * @method static Builder|RosterSpot whereVisitorFrom($value)
 * @mixin Eloquent
 */
class RosterSpot extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roster';

    /**
     * @var array
     */
    protected $fillable = ['id', 'fname', 'lname', 'initials', 'email', 'rating_id', 'canTrain', 'canEvents', 'visitor',
                           'visitor_from', 'api_exempt', 'status', 'loa', 'del', 'gnd', 'twr', 'app', 'ctr',
                           'train_pwr', 'monitor_pwr', 'opt', 'remember_token', 'json_token', 'created_at',
                           'updated_at', 'time_added_to_facility', 'training_power', 'mentor_power', 'max', 'path'];

}
