<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role != 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Task $task)
    {
        if($user->role == 2)
            return true;
        elseif($user->role == 1 && $task->creator_id==$user->id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Task $task)
    {
        if($user->role == 2)
            return true;
        elseif($user->role == 1 && $task->creator_id==$user->id)
            return true;
        else
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Task $task)
    {
        //
    }
}
