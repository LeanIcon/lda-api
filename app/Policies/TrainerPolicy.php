<?php

namespace App\Policies;

use App\Models\User;
use App\Models\trainer;
use Illuminate\Auth\Access\Response;

class TrainerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         // Allow admins to view all trainers
         return $user->is_admin;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, trainer $trainer): bool
    {
         // Allow admins to view a specific trainer
         return $user->is_admin;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Allow admins to update all trainers
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, trainer $trainer): bool
    {
        // Allow admins to create trainers
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, trainer $trainer): bool
    {
        // Allow admins to delete all trainers
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, trainer $trainer): bool
    {
        // Allow admins to delete all trainers
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, trainer $trainer): bool
    {
        // Allow admins to delete all trainers
        return $user->is_admin;
    }
}
