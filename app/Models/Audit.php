<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property string $ip
 * @property string $what
 * @property string $created_at
 * @property string $updated_at
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
