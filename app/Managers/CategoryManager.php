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
        $categories = Category::whereNull('parent_id')->with('children');

        if (array_key_exists('is_parent', $params)) {
            if ($params['is_parent']) {
                $categories->whereNull('parent_id');
            } else {
                $categories->whereNotNull('parent_id');
            }
        }

        return $categories->get();
    }

    /**
     * Move order down
     * @param Category $category
     * @param bool $moveDown
     */
    public function updateOrder(Category $category, $moveDown)
    {
        if ($category->isChild()) {
            $replacement = Category::where('parent_id', $category->parent_id)
                ->where('order', ($moveDown ? ($category->order + 1) : ($category->order - 1)))
                ->first();
            if (!empty($replacement)) {
                $categoryLastOrder = $category->order;
                $category->update([
                    'order' => $replacement->order
                ]);
                $replacement->update([
                    'order' => $categoryLastOrder
                ]);
            }
        } else {
            $replacement = Category::whereNull('parent_id')
                ->where('order', ($moveDown ? ($category->order + 1) : ($category->order - 1)))
                ->first();
            if (!empty($replacement)) {
                $categoryLastOrder = $category->order;
                $category->update([
                    'order' => $replacement->order
                ]);
                $replacement->update([
                    'order' => $categoryLastOrder
                ]);
            }
        }
    }

    /**
     * Update to parent or child
     * @param Category $category
     * @param bool $toParent
     */
    public function updateLevel(Category $category, $toParent)
    {

    }
}