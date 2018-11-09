<?php

namespace App\Http\Controllers;

use App\Managers\UserManager;
use App\Managers\CategoryManager;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /** @var UserManager $userManager */
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = $this->userManager->getUsers();
        return view('users', [
            'users' => $users,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdd()
    {
        /** @var CategoryManager $categoryManager */
        $categoryManager = resolve(CategoryManager::class);
        return view('users_add',[
            'categories' => $categoryManager->getCategories(),
        ]);
    }
}
