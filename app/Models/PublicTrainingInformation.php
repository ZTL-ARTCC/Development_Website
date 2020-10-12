<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PublicTrainingInformation
 *
 * @property int $id
 * @property string $name
 * @property int $order
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|PublicTrainingInformation newModelQuery()
 * @method static Builder|PublicTrainingInformation newQuery()
 * @method static Builder|PublicTrainingInformation query()
 * @method static Builder|PublicTrainingInformation whereCreatedAt($value)
 * @method static Builder|PublicTrainingInformation whereId($value)
 * @method static Builder|PublicTrainingInformation whereName($value)
 * @method static Builder|PublicTrainingInformation whereOrder($value)
 * @method static Builder|PublicTrainingInformation whereUpdatedAt($value)
 * @mixin Eloquent
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

    public function getPdf() {
        return PublicTrainingInformationPdf::whereSectionId($this->id)->get();
    }
}
