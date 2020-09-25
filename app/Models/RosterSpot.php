<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
