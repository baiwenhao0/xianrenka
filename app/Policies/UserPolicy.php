<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }
    //是否登录
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
    //授权是否有删除权限功能
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
    //判断是否是自己关注自己
    public function follow(User $currentUser, User $user)
    {
        return $currentUser->id !== $user->id;
    }

}
