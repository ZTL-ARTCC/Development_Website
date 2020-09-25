<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $body
 * @property int $creator_cid
 * @property string $created_at
 * @property string $updated_at
 */
class Announcement extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'announcement';

    /**
     * @var array
     */
    protected $fillable = ['body', 'creator_cid', 'created_at', 'updated_at'];

    public function getStaffNameAttribute() {
        $name = User::find($this->staff_member)->full_name;
        return $name;
    }

    public function getUpdateTimeAttribute() {
        $date = $this->updated_at;
        $update = $date->format('D M d, Y') . ' at ' . substr($date, 11) . 'z';
        return $update;
    }
}
