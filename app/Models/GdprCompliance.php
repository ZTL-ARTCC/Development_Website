<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_cid
 * @property int $option
 * @property string $ip
 * @property string $means
 * @property string $created_at
 * @property string $updated_at
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
