<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $section_id
 * @property string $pdf_path
 * @property string $created_at
 * @property string $updated_at
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
