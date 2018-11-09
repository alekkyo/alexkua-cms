<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;
use App\Managers\UserManager;
use App\Models\User;
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
     * Add a new user
     * @param NewUserRequest $request
     * @return \Response
     * @throws \Exception
     */
    public function store(NewUserRequest $request)
    {
        if (User::where('username', $request->username)->exists()) {
            throw new \Exception('Username already exists!');
        }
        if (User::where('email', $request->email)->exists()) {
            throw new \Exception('Email already exists!');
        }
        $user = new User;
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if (!$user->save()) {
            throw new \Exception ('Could not save new user');
        }
        return response($user);
    }

    /**
     * Delete user
     * @param User $user
     * @return bool
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if (!$user->delete()) {
            return response('Could not delete user', 400);
        }
    }
}
