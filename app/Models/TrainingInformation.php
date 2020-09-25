<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $number
 * @property int $section
 * @property string $info
 * @property string $created_at
 * @property string $updated_at
 */
class TrainingInformation extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'training_info';

    /**
     * @var array
     */
    protected $fillable = ['number', 'section', 'info', 'created_at', 'updated_at'];

}
