<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $controller_id
 * @property int $option
 * @property string $ip_address
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
    protected $fillable = ['controller_id', 'option', 'ip_address', 'means', 'created_at', 'updated_at'];

}
