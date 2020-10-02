<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PublicTrainingInformationPdf
 *
 * @property int $id
 * @property int $section_id
 * @property string $pdf_path
 * @property string $created_at
 * @property string $updated_at
 * @method static Builder|PublicTrainingInformationPdf newModelQuery()
 * @method static Builder|PublicTrainingInformationPdf newQuery()
 * @method static Builder|PublicTrainingInformationPdf query()
 * @method static Builder|PublicTrainingInformationPdf whereCreatedAt($value)
 * @method static Builder|PublicTrainingInformationPdf whereId($value)
 * @method static Builder|PublicTrainingInformationPdf wherePdfPath($value)
 * @method static Builder|PublicTrainingInformationPdf whereSectionId($value)
 * @method static Builder|PublicTrainingInformationPdf whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PublicTrainingInformationPdf extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'public_train_info_pdf';

    /**
     * @var array
     */
    protected $fillable = ['section_id', 'pdf_path', 'created_at', 'updated_at'];

}
