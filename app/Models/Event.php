<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
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
