<?php

namespace App\Policies\site;

use App\Models\User;
use App\Models\book;
use Illuminate\Auth\Access\HandlesAuthorization;

class bookPolicy
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
     * @param  \App\Models\book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, book $book)
    {

         if($user->id == $book->user_id)
        return true ;

        return $user->savedBooks->contains($book);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, book $book)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, book $book)
    {
        if($book->paid == 1 )
        return false;
        
        return $user->id == $book->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, book $book)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\book  $book
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, book $book)
    {
        //
    }
    public function deactive(User $user, book $book)
    {
        return $user->id == $book->user_id;
    }

    public function gift(User $user, book $book)
    {
        return $user->id == $book->user_id;
    }

}
