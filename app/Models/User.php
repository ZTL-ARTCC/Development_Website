<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laratrust\Traits\LaratrustUserTrait;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string|null $initials
 * @property string $email
 * @property int $rating_id
 * @property int $canTrain
 * @property int $canEvents
 * @property int $visitor
 * @property string|null $visitor_from
 * @property int $api_exempt
 * @property int $status
 * @property int $loa
 * @property int $del
 * @property int $gnd
 * @property int $twr
 * @property int $app
 * @property int $ctr
 * @property int $train_pwr
 * @property int $monitor_pwr
 * @property int|null $opt
 * @property string|null $remember_token
 * @property string|null $json_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $time_added_to_facility
 * @property int $training_power
 * @property int $mentor_power
 * @property int $max
 * @property string|null $path
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereApiExempt($value)
 * @method static Builder|User whereApp($value)
 * @method static Builder|User whereCanEvents($value)
 * @method static Builder|User whereCanTrain($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCtr($value)
 * @method static Builder|User whereDel($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereFname($value)
 * @method static Builder|User whereGnd($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereInitials($value)
 * @method static Builder|User whereJsonToken($value)
 * @method static Builder|User whereLname($value)
 * @method static Builder|User whereLoa($value)
 * @method static Builder|User whereMax($value)
 * @method static Builder|User whereMentorPower($value)
 * @method static Builder|User whereMonitorPwr($value)
 * @method static Builder|User whereOpt($value)
 * @method static Builder|User wherePath($value)
 * @method static Builder|User whereRatingId($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereTimeAddedToFacility($value)
 * @method static Builder|User whereTrainPwr($value)
 * @method static Builder|User whereTrainingPower($value)
 * @method static Builder|User whereTwr($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereVisitor($value)
 * @method static Builder|User whereVisitorFrom($value)
 * @mixin Eloquent
 */
class User extends Authenticatable {
    use Notifiable;
    use LaratrustUserTrait;

    public static $RatingShort = [
        0 => 'N/A',
        1 => 'OBS', 2 => 'S1',
        3 => 'S2', 4 => 'S3',
        5 => 'C1', 7 => 'C3',
        8 => 'I1', 10 => 'I3',
        11 => 'SUP', 12 => 'ADM',
    ];
    public static $RatingLong = [
        0 => 'Pilot',
        1 => 'Observer (OBS)', 2 => 'Student 1 (S1)',
        3 => 'Student 2 (S2)', 4 => 'Senior Student (S3)',
        5 => 'Controller (C1)', 7 => 'Senior Controller (C3)',
        8 => 'Instructor (I1)', 10 => 'Senior Instructor (I3)',
        11 => 'Supervisor (SUP)', 12 => 'Admin (ADM)',
    ];
    public static $StatusText = [
        0 => 'LOA',
        1 => 'Active'
    ];
    protected $table = 'roster';
    protected $fillable = ['id', 'fname', 'lname', 'email', 'rating_id', 'canTrain', 'visitor', 'status', 'loa',
                           'del', 'gnd', 'twr', 'app', 'ctr', 'train_pwr', 'monitor_pwr', 'opt', 'initials',
                           'added_to_facility', 'max', 'max_minor_del', 'max_minor_gnd', 'max_minor_twr',
                           'max_minor_app', 'path'];
    protected $secret = ['remember_token', 'password', 'json_token'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getBackwardsNameAttribute() {
        return $this->lname . ', ' . $this->fname;
    }

    public function getBackwardsNameRatingAttribute() {
        return $this->backwards_name . ' - ' . $this->rating_short;
    }

    public function getFullNameAttribute() {
        return $this->fname . ' ' . $this->lname;
    }

    public function getFullNameRatingAttribute() {
        return $this->full_name . ' - ' . $this->rating_short;
    }

    public function getRatingShortAttribute() {
        foreach (User::$RatingShort as $id => $Short) {
            if ($this->rating_id == $id) {
                return $Short;
            }
        }

        return "";
    }

    public function getRatingLongAttribute() {
        foreach (User::$RatingLong as $id => $Short) {
            if ($this->rating_id == $id) {
                return $Short;
            }
        }

        return "";
    }

    public function getStatusTextAttribute() {
        foreach (User::$StatusText as $id => $Status) {
            if ($this->status == $id) {
                return $Status;
            }
        }

        return "";
    }

    public function getStaffPositionAttribute() {
        if ($this->hasRole('atm')) {
            return 1;
        } else {
            if ($this->hasRole('datm')) {
                return 2;
            } else {
                if ($this->hasRole('ta')) {
                    return 3;
                } else {
                    if ($this->hasRole('ata')) {
                        return 4;
                    } else {
                        if ($this->hasRole('wm')) {
                            return 5;
                        } else {
                            if ($this->hasRole('awm')) {
                                return 6;
                            } else {
                                if ($this->hasRole('fe')) {
                                    return 7;
                                } else {
                                    if ($this->hasRole('afe')) {
                                        return 8;
                                    } else {
                                        if ($this->hasRole('ec')) {
                                            return 9;
                                        } else {
                                            if ($this->hasRole('aec')) {
                                                return 10;
                                            } else {
                                                return 0;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function getTrainPositionAttribute() {
        if ($this->hasRole('mtr')) {
            return 1;
        } else {
            if ($this->hasrole('ins')) {
                return 2;
            } else {
                return 0;
            }
        }
    }

    public function getLastTrainingAttribute() {
        $tickets_sort = TrainingTicket::where('controller_id', $this->id)->get()->sortByDesc(function($t) {
            return strtotime($t->date . ' ' . $t->start_time);
        })->pluck('id');
        if ($tickets_sort->count() != 0) {
            $tickets_order = implode(',', array_fill(0, count($tickets_sort), '?'));
            $last_training = TrainingTicket::whereIn('id', $tickets_sort)
                                           ->orderByRaw("field(id,{$tickets_order})", $tickets_sort)->first();
        } else {
            $last_training = null;
        }

        if ($last_training != null) {
            return $last_training->date;
        } else {
            return null;
        }
    }

    public function getLastTrainingGivenAttribute() {
        $tickets_sort = TrainingTicket::where('trainer_id', $this->id)->get()->sortByDesc(function($t) {
            return strtotime($t->date . ' ' . $t->start_time);
        })->pluck('id');
        if ($tickets_sort->count() != 0) {
            $tickets_order = implode(',', array_fill(0, count($tickets_sort), '?'));
            $last_training_given = TrainingTicket::whereIn('id', $tickets_sort)
                                                 ->orderByRaw("field(id,{$tickets_order})", $tickets_sort)->first();
        } else {
            $last_training_given = null;
        }

        if ($last_training_given != null) {
            return $last_training_given->date;
        } else {
            return null;
        }
    }

    public function getLastLogonAttribute() {
        $last = ControllerLog::where('cid', $this->id)->orderBy('created_at', 'DSC')->first();
        if ($last != null) {
            $date = Carbon::parse($last->created_at)->format('m/d/Y');
        } else {
            $date = 'Never';
        }

        return $date;
    }

    public function getTextDateJoinAttribute() {
        $date = Carbon::parse($this->added_to_facility)->format('m/d/Y');

        return $date;
    }

    public function getTextDateCreateAttribute() {
        $date = Carbon::parse($this->created_at)->format('m/d/Y');

        return $date;
    }

    public function getSoloAttribute() {
        $cert = SoloCert::where('cid', $this->id)->where('status', 0)->first();
        if ($cert) {
            $date = Carbon::parse($cert->expiration)->format('m/d/Y');
        } else {
            $date = 'N/A';
        }

        return $date;
    }
}
