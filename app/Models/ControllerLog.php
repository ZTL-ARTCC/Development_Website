<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\ControllerLog
 *
 * @property int $id
 * @property int $cid
 * @property string $name
 * @property string $position
 * @property string $duration
 * @property string $date
 * @property string $time_logon
 * @property string $streamupdate
 * @property string $created_at
 * @property string $updated_at
 * @method static QueryBuilder|ControllerLog newModelQuery()
 * @method static QueryBuilder|ControllerLog newQuery()
 * @method static QueryBuilder|ControllerLog query()
 * @method static QueryBuilder|ControllerLog whereCid($value)
 * @method static QueryBuilder|ControllerLog whereCreatedAt($value)
 * @method static QueryBuilder|ControllerLog whereDate($value)
 * @method static QueryBuilder|ControllerLog whereDuration($value)
 * @method static QueryBuilder|ControllerLog whereId($value)
 * @method static QueryBuilder|ControllerLog whereName($value)
 * @method static QueryBuilder|ControllerLog wherePosition($value)
 * @method static QueryBuilder|ControllerLog whereStreamupdate($value)
 * @method static QueryBuilder|ControllerLog whereTimeLogon($value)
 * @method static QueryBuilder|ControllerLog whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ControllerLog extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'controller_log';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'name', 'position', 'duration', 'date', 'time_logon', 'streamupdate', 'created_at',
                           'updated_at'];

    public static function top5Controllers($year_month) {
        return static::where(DB::Raw("date_format(STR_TO_DATE(`date`, '%m/%d/%Y'), '%Y-%c')"), 'like', $year_month)
                     ->join('roster', 'controller_log.cid', '=', 'roster.id')
                     ->groupBy('roster.id')
                     ->selectRaw('roster.*, SUM(duration) as `duration`')
                     ->orderBy('duration', 'desc')
                     ->limit(5)
                     ->get();
    }

    public static function top3Controllers($year_month) {
        return static::where(DB::Raw("date_format(STR_TO_DATE(`date`, '%m/%d/%Y'), '%Y-%c')"), 'like', $year_month)
                     ->join('roster', 'controller_log.cid', '=', 'roster.id')
                     ->groupBy('roster.id')
                     ->selectRaw('roster.*, SUM(duration) as `duration`')
                     ->orderBy('duration', 'desc')
                     ->limit(3)
                     ->get();
    }

    public static function getAllControllerStats() {
        return static::aggregateStatsByTime(static::query());
    }

    public static function aggregateStatsByTime(QueryBuilder $query) {
        $results = $query->select(DB::raw("
			SUM(IF(date_format(STR_TO_DATE(`date`, '%m/%d/%Y'), '%m/%Y') = date_format(now(), '%m/%Y'), duration, 0)) as `month`,
			SUM(IF(year(STR_TO_DATE(`date`, '%m/%d/%Y')) = year(now()), duration, 0)) as `year`,
			SUM(duration) as `total`
		"))->first();

        // Convert seconds to hours
        return [
            'month' => $results->month / 3600,
            'year' => $results->year / 3600,
            'total' => $results->total / 3600,
        ];
    }

    public static function getControllerStats($id) {
        return static::aggregateStatsByTime(static::whereCid($id));
    }

    public static function aggregateAllControllersByPosAndMonth($year = null, $month = null) {
        $query = static::query()
                       ->rightJoin('roster', function($join) use ($year, $month) {
                           $join->on('roster.id', '=', 'controller_log.cid');

                           if ($month != null) {
                               $join->where(DB::Raw("date_format(STR_TO_DATE(`date`, '%m/%d/%Y'), '%c')"), 'like',
                                            $month);
                           }

                           if ($year != null) {
                               $join->where(DB::Raw("date_format(STR_TO_DATE(`date`, '%m/%d/%Y'), '%y')"), 'like',
                                            $year);
                           }
                       })
                       ->selectRaw("
				roster.id `cid`,
				SUM(IF(position LIKE '%_DEL' OR position LIKE '%_GND' OR position LIKE '%_TWR', duration, 0)) / 3600 `local_hrs`,
				SUM(IF(position LIKE '%_APP' OR position LIKE '%_DEP', duration, 0)) / 3600 `approach_hrs`,
				SUM(IF(position LIKE '%_CTR', duration, 0)) / 3600 `enroute_hrs`,
				SUM(IF(position LIKE '%_CTR' OR position LIKE '%_APP' OR position LIKE '%_DEP' OR position LIKE '%_TWR', duration, 0)) / 3600 `bronze_hrs`,
				SUM(duration) / 3600 `total_hrs`
			")
                       ->groupBy('roster.id');

        return $query->get()->reduce(function($m, $r) {
            $m[$r->cid] = $r;
            return $m;
        }, []);
    }

    public static function aggregateAllControllersByPosAndYear($year = null) {
        $query = static::query()
                       ->rightJoin('roster', function($join) use ($year) {
                           $join->on('roster.id', '=', 'controller_log.cid');

                           if ($year != null) {
                               $join->where(DB::Raw("date_format(STR_TO_DATE(`date`, '%m/%d/%Y'), '%y')"), 'like',
                                            $year);
                           }
                       })
                       ->selectRaw("
				roster.id `cid`,
				SUM(IF(position LIKE '%_DEL' OR position LIKE '%_GND' OR position LIKE '%_TWR', duration, 0)) / 3600 `local_hrs`,
				SUM(IF(position LIKE '%_APP' OR position LIKE '%_DEP', duration, 0)) / 3600 `approach_hrs`,
				SUM(IF(position LIKE '%_CTR', duration, 0)) / 3600 `enroute_hrs`,
				SUM(IF(position LIKE '%_CTR' OR position LIKE '%_APP' OR position LIKE '%_DEP' OR position LIKE '%_TWR', duration, 0)) / 3600 `bronze_hrs`,
				SUM(duration) / 3600 `total_hrs`
			")
                       ->groupBy('roster.id');

        return $query->get()->reduce(function($m, $r) {
            $m[$r->cid] = $r;
            return $m;
        }, []);
    }

    public function user() {
        return $this->hasOne('User', 'id', 'cid');
    }

    public function getDurationTimeAttribute() {
        $seconds_count = $this->duration;
        $delimiter = ':';
        $seconds = $seconds_count % 60;
        $minutes = floor($seconds_count / 60) % 60;
        $hours = floor($seconds_count / 3600);

        $seconds = str_pad($seconds, 2, "0", STR_PAD_LEFT);
        $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
        $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);

        return "$hours$delimiter$minutes$delimiter$seconds";
    }

    public function getLocalHrsAttribute() {
        return floatval($this->attributes['local_hrs']) ? number_format($this->attributes['local_hrs'], 2) : '--';
    }

    public function getApproachHrsAttribute() {
        return floatval($this->attributes['approach_hrs']) ? number_format($this->attributes['approach_hrs'], 2) :
            '--';
    }

    public function getEnrouteHrsAttribute() {
        return floatval($this->attributes['enroute_hrs']) ? number_format($this->attributes['enroute_hrs'], 2) :
            '--';
    }

    public function getTotalHrsAttribute() {
        return floatval($this->attributes['total_hrs']) ? number_format($this->attributes['total_hrs'], 2) : '--';
    }

    public function getBronzeHrsAttribute() {
        return floatval($this->attributes['bronze_hrs']) ? number_format($this->attributes['bronze_hrs'], 2) : '--';
    }
}
