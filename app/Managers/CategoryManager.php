<?php

namespace App\Managers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryManager
{
    /**
     * Get all categories for the search query
     * @param array $params
     * @return []
     */
    public function getCategories(array $params = [])
    {
        $categories = Category::query();

        if (array_key_exists('is_parent', $params)) {
            if ($params['is_parent']) {
                $categories->whereNull('parent_id');
            } else {
                $categories->whereNotNull('parent_id');
            }
        }

        return $categories->get();
    }
}