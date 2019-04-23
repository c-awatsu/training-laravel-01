<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Item
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Item newModelQuery()
 * @method static Builder|Item newQuery()
 * @method static Builder|Item query()
 * @method static Builder|Item whereCreatedAt($value)
 * @method static Builder|Item whereId($value)
 * @method static Builder|Item whereName($value)
 * @method static Builder|Item whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Item extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function scopeSearchItems(Builder $query, $searchWord){
        $splitedWord = preg_split("/[\s]+/", $searchWord);
        foreach ($splitedWord as $word){
            $query->where('name', 'LIKE', "%$word%");
        }
        return $query;
    }
}
