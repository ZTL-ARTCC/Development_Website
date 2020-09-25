<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $cid
 * @property int $pos
 * @property string $expiration
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class SoloCertification extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'solo_certs';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'pos', 'expiration', 'status', 'created_at', 'updated_at'];

    public function getPosTxtAttribute() {
        if ($this->pos == 0) {
            $pos = 'Tower';
        } else {
            if ($this->pos == 1) {
                $pos = 'Approach';
            } else {
                if ($this->pos == 2) {
                    $pos = 'Center';
                } else {
                    $pos = 'N/A';
                }
            }
        }

        return $pos;
    }
}
