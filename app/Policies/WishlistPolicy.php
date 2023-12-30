<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Auth\Access\Response;

class WishlistPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view wishlists');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Wishlist $wishlist): bool
    {
        return $user->can('view wishlists details');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create wishlists');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Wishlist $wishlist): bool
    {
        return $user->can('edit wishlists');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Wishlist $wishlist): bool
    {
        return $user->can('delete wishlists');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Wishlist $wishlist): bool
    {
        return $user->can('restore wishlists');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Wishlist $wishlist): bool
    {
        return $user->can('force delete wishlists');
    }
}
