<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SoloCertification
 *
 * @property int $id
 * @property int $cid
 * @property int $pos
 * @property string $expiration
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property-read mixed $pos_txt
 * @method static Builder|SoloCertification newModelQuery()
 * @method static Builder|SoloCertification newQuery()
 * @method static Builder|SoloCertification query()
 * @method static Builder|SoloCertification whereCid($value)
 * @method static Builder|SoloCertification whereCreatedAt($value)
 * @method static Builder|SoloCertification whereExpiration($value)
 * @method static Builder|SoloCertification whereId($value)
 * @method static Builder|SoloCertification wherePos($value)
 * @method static Builder|SoloCertification whereStatus($value)
 * @method static Builder|SoloCertification whereUpdatedAt($value)
 * @mixin Eloquent
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
        switch ($this->pos) {
        case 0:
            return 'Tower';
        case 1:
            return 'Approach';
        case 2:
            return 'Center';
        default:
            return 'N/A';
        }
    }
}
