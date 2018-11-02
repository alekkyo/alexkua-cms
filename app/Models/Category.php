<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $guarded = [];
    public $timestamps = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order_by_order_asc', function (Builder $builder) {
            $builder->orderBy('order', 'asc');
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Checks if category is child or not
     * @return bool
     */
    public function isChild()
    {
        return !empty($this->parent_id);
    }
}
