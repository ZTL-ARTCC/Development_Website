<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Announcement
 *
 * @property int $id
 * @property string $body
 * @property int $creator_cid
 * @property string $created_at
 * @property string $updated_at
 * @property int $staff_member
 * @property-read mixed $staff_name
 * @property-read mixed $update_time
 * @method static Builder|Announcement newModelQuery()
 * @method static Builder|Announcement newQuery()
 * @method static Builder|Announcement query()
 * @method static Builder|Announcement whereBody($value)
 * @method static Builder|Announcement whereCreatedAt($value)
 * @method static Builder|Announcement whereId($value)
 * @method static Builder|Announcement whereStaffMember($value)
 * @method static Builder|Announcement whereUpdatedAt($value)
 * @mixin Eloquent
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
        return User::find($this->staff_member)->full_name;
    }

    public function getUpdateTimeAttribute() {
        $date = $this->updated_at;
        return $date->format('D M d, Y') . ' at ' . substr($date, 11) . 'z';
    }
}
