<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Audit
 *
 * @property int $id
 * @property int $cid
 * @property string $ip
 * @property string $what
 * @property string $created_at
 * @property string $updated_at
 * @property-read mixed $time_date
 * @method static Builder|Audit newModelQuery()
 * @method static Builder|Audit newQuery()
 * @method static Builder|Audit query()
 * @method static Builder|Audit whereCid($value)
 * @method static Builder|Audit whereCreatedAt($value)
 * @method static Builder|Audit whereId($value)
 * @method static Builder|Audit whereIp($value)
 * @method static Builder|Audit whereUpdatedAt($value)
 * @method static Builder|Audit whereWhat($value)
 * @mixin \Eloquent
 */
class Audit extends Model {
    /**
     * @var array
     */
    protected $fillable = ['cid', 'ip', 'what', 'created_at', 'updated_at'];

    public function getTimeDateAttribute() {
        $date = $this->created_at;
        $new_date = $date->format('m/d/Y') . ' at ' . substr($date, 11, 5);

        return $new_date;
    }
}
