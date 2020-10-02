<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chat
 *
 * @property int $id
 * @property int $cid
 * @property string $controller_name
 * @property string $message
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property string $c_name
 * @property string $format_time
 * @method static Builder|Chat newModelQuery()
 * @method static Builder|Chat newQuery()
 * @method static Builder|Chat query()
 * @method static Builder|Chat whereCName($value)
 * @method static Builder|Chat whereCid($value)
 * @method static Builder|Chat whereCreatedAt($value)
 * @method static Builder|Chat whereDeleted($value)
 * @method static Builder|Chat whereFormatTime($value)
 * @method static Builder|Chat whereId($value)
 * @method static Builder|Chat whereMessage($value)
 * @method static Builder|Chat whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Chat extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chat_room';

    /**
     * @var array
     */
    protected $fillable = ['cid', 'controller_name', 'message', 'deleted', 'created_at', 'updated_at'];

}
