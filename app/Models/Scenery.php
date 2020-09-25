<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Scenery
 *
 * @property int $id
 * @property string $airport
 * @property string $developer
 * @property int $sim
 * @property string $price
 * @property string $currency
 * @property string $link
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|Scenery newModelQuery()
 * @method static Builder|Scenery newQuery()
 * @method static Builder|Scenery query()
 * @method static Builder|Scenery whereAirport($value)
 * @method static Builder|Scenery whereCreatedAt($value)
 * @method static Builder|Scenery whereCurrency($value)
 * @method static Builder|Scenery whereDeveloper($value)
 * @method static Builder|Scenery whereId($value)
 * @method static Builder|Scenery whereImage1($value)
 * @method static Builder|Scenery whereImage2($value)
 * @method static Builder|Scenery whereImage3($value)
 * @method static Builder|Scenery whereLink($value)
 * @method static Builder|Scenery wherePrice($value)
 * @method static Builder|Scenery whereSim($value)
 * @method static Builder|Scenery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Scenery extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scenery';

    /**
     * @var array
     */
    protected $fillable = ['airport', 'developer', 'sim', 'price', 'currency', 'link', 'image1', 'image2', 'image3',
                           'created_at', 'updated_at'];

}
