<?php

namespace App\Http\Controllers;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = $this->categoryManager->getCategories();
        return view('categories', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdd()
    {
        $parentCategories = $this->categoryManager->getCategories(['is_parent' => true]);
        return view('categories_add', [
            'parentCategories' => $parentCategories,
        ]);
    }
}
