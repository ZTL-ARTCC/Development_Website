<?php

namespace App\Models;

use App\Visitor;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $requester_cid
 * @property string $name
 * @property string $email
 * @property int $rating
 * @property string $home
 * @property string $reason
 * @property boolean $status
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class VisitorRequest extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visit_requests';

    /**
     * @var array
     */
    protected $fillable = ['requester_cid', 'name', 'email', 'rating', 'home', 'reason', 'status', 'updated_by', 'created_at',
                           'updated_at'];

    public static $RatingShort = [
        0 => 'N/A',
        1 => 'OBS', 2 => 'S1',
        3 => 'S2', 4 => 'S3',
        5 => 'C1', 7 => 'C3',
        8 => 'I1', 10 => 'I3',
        11 => 'SUP', 12 => 'ADM',
    ];

    public function getRatingShortAttribute() {
        foreach (Visitor::$RatingShort as $id => $Short) {
            if ($this->rating == $id) {
                return $Short;
            }
        }

        return "";
    }
}
