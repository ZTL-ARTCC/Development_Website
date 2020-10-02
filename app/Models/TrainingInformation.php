<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TrainingInformation
 *
 * @property int $id
 * @property int $number
 * @property int $section
 * @property string $info
 * @property string $created_at
 * @property string $updated_at
 * @property-read mixed $default_new_number
 * @property-read mixed $new_numbers
 * @method static Builder|TrainingInformation newModelQuery()
 * @method static Builder|TrainingInformation newQuery()
 * @method static Builder|TrainingInformation query()
 * @method static Builder|TrainingInformation whereCreatedAt($value)
 * @method static Builder|TrainingInformation whereId($value)
 * @method static Builder|TrainingInformation whereInfo($value)
 * @method static Builder|TrainingInformation whereNumber($value)
 * @method static Builder|TrainingInformation whereSection($value)
 * @method static Builder|TrainingInformation whereUpdatedAt($value)
 * @mixin Eloquent
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
        $group_number = TrainingInformation::where('section', $this->section)->get()->count() + 1;
        $numbers = range(1, $group_number);

        return $numbers;
    }

    public function getDefaultNewNumberAttribute() {
        $number = TrainingInformation::where('section', $this->section)->get()->count();

        return $number;
    }
}
