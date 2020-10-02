<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GdprCompliance
 *
 * @property int $id
 * @property int $controller_cid
 * @property int $option
 * @property string $ip
 * @property string $means
 * @property string $created_at
 * @property string $updated_at
 * @property int $controller_id
 * @property string $ip_address
 * @method static Builder|GdprCompliance newModelQuery()
 * @method static Builder|GdprCompliance newQuery()
 * @method static Builder|GdprCompliance query()
 * @method static Builder|GdprCompliance whereControllerId($value)
 * @method static Builder|GdprCompliance whereCreatedAt($value)
 * @method static Builder|GdprCompliance whereId($value)
 * @method static Builder|GdprCompliance whereIpAddress($value)
 * @method static Builder|GdprCompliance whereMeans($value)
 * @method static Builder|GdprCompliance whereOption($value)
 * @method static Builder|GdprCompliance whereUpdatedAt($value)
 * @mixin Eloquent
 */
class GdprCompliance extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gdpr_compliance';

    /**
     * @var array
     */
    protected $fillable = ['controller_cid', 'option', 'ip', 'means', 'created_at', 'updated_at'];

}
