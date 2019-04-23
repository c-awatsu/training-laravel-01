<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name'];

    public function items(){
        return $this->hasMany('App\Item');
    }

    public static function listOfOptions(){
        return Category::all()->pluck('name', 'id');
    }

    public function scopeSearchCategories(Builder $query, $searchWord){
        $splitedWord = preg_split("/[\s]+/", $searchWord);
        foreach ($splitedWord as $word){
            $query->where('name', 'LIKE', "%$word%");
        }
        return $query;
    }
}
