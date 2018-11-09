<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Managers\CategoryManager;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** @var CategoryManager $categoryManager */
    protected $categoryManager;

    public function __construct(CategoryManager $categoryManager)
    {
        $this->categoryManager = $categoryManager;
    }

    /**
     * Add a new category
     * @param NewCategoryRequest $request
     * @return \Response
     * @throws \Exception
     */
    public function store(NewCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->order = (Category::whereNull('parent_id')->max('order') ?? 0) + 1;
        if (!empty($request->parentCategory)) {
            $category->parent_id = $request->parentCategory;
        }
        if (!$category->save()) {
            throw new \Exception ('Could not save new category');
        }
        return response($category);
    }

    /**
     * Delete category
     * @param Category $category
     * @return bool
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if (!$category->delete()) {
            return response('Could not delete category', 400);
        }
    }

    /**
     * Move order up
     * @param Category $category
     */
    public function moveOrderUp(Category $category)
    {
        $this->categoryManager->updateOrder($category, false);
    }

    /**
     * Move order down
     * @param Category $category
     */
    public function moveOrderDown(Category $category)
    {
        $this->categoryManager->updateOrder($category, true);
    }
}
