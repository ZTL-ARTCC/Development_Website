<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $name
 * @property string $host
 * @property string $description
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string $banner_path
 * @property boolean $status
 * @property boolean $reg
 * @property string $created_at
 * @property string $updated_at
 * @property-read mixed $date_edit
 * @method static Builder|Event newModelQuery()
 * @method static Builder|Event newQuery()
 * @method static Builder|Event query()
 * @method static Builder|Event whereBannerPath($value)
 * @method static Builder|Event whereCreatedAt($value)
 * @method static Builder|Event whereDate($value)
 * @method static Builder|Event whereDescription($value)
 * @method static Builder|Event whereEndTime($value)
 * @method static Builder|Event whereHost($value)
 * @method static Builder|Event whereId($value)
 * @method static Builder|Event whereName($value)
 * @method static Builder|Event whereReg($value)
 * @method static Builder|Event whereStartTime($value)
 * @method static Builder|Event whereStatus($value)
 * @method static Builder|Event whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Event extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'host', 'description', 'date', 'start_time', 'end_time', 'banner_path', 'status',
                           'reg', 'created_at', 'updated_at'];

    public function getDateEditAttribute() {
        $date = new Carbon($this->date);
        $date = $date->format('Y-m-d');
        return $date;
    }
}
