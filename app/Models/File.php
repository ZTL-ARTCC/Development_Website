<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $description
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $desc
 * @property-read mixed $word_type
 * @method static Builder|File newModelQuery()
 * @method static Builder|File newQuery()
 * @method static Builder|File query()
 * @method static Builder|File whereCreatedAt($value)
 * @method static Builder|File whereDesc($value)
 * @method static Builder|File whereId($value)
 * @method static Builder|File whereName($value)
 * @method static Builder|File wherePath($value)
 * @method static Builder|File whereType($value)
 * @method static Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model {
    /**
     * @var array
     */
    protected $fillable = ['name', 'type', 'description', 'path', 'created_at', 'updated_at'];

    public function getWordTypeAttribute() {
        foreach (\App\File::$WordType as $id => $wordType) {
            if ($this->type == $id) {
                return $wordType;
            }
        }

        return "";
    }
}
