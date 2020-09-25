<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ArtccFlightUpdate
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|ArtccFlightUpdate newModelQuery()
 * @method static Builder|ArtccFlightUpdate newQuery()
 * @method static Builder|ArtccFlightUpdate query()
 * @method static Builder|ArtccFlightUpdate whereCreatedAt($value)
 * @method static Builder|ArtccFlightUpdate whereId($value)
 * @method static Builder|ArtccFlightUpdate whereUpdatedAt($value)
 * @mixin \Eloquent
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
