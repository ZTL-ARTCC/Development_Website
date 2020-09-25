<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 */
class ArtccFlightUpdate extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flights_within_artcc_updates';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

}
