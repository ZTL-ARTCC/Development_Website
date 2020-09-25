<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $order
 * @property string $created_at
 * @property string $updated_at
 */
class PublicTrainingInformation extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'public_train_info_sections';

    /**
     * @var array
     */
    protected $fillable = ['name', 'order', 'created_at', 'updated_at'];

}
