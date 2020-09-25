<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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
