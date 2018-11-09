<?php

namespace App\Managers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManager
{
    /**
     * Get all users for the search query
     * @param array $params
     * @return []
     */
    public function getUsers(array $params = [])
    {
        $users = User::query();
        return $users->get();
    }
}