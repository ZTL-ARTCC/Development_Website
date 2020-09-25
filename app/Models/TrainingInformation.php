<?php

namespace App\Models;

use App\TrainingInfo;
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

    public function getNewNumbersAttribute() {
        $group_number = TrainingInfo::where('section', $this->section)->get()->count() + 1;
        $numbers = range(1, $group_number);

        return $numbers;
    }

    public function getDefaultNewNumberAttribute() {
        $number = TrainingInfo::where('section', $this->section)->get()->count();

        return $number;
    }
}
