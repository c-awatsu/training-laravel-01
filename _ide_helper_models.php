<?php

// @formatter:off

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App {
    /**
     * App\category
     *
     * @property int $id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Item[] $items
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\category whereUpdatedAt($value)
     */
    class Category extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Item
     *
     * @property int $id
     * @property string $name
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item query()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
     * @mixin \Eloquent
     * @property int $category_id
     * @property-read \App\category $category
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCategoryId($value)
     */
    class Item extends \Eloquent
    {
    }
}

