<?php

namespace Adminetic\Contact\Policies;

use App\Models\User;
use Adminetic\Contact\Models\Admin\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->userCanDo('Contact', 'browse');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return mixed
     */
    public function view(User $user, Contact $contact)
    {
        return $user->userCanDo('Contact', 'read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->userCanDo('Contact', 'add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return mixed
     */
    public function update(User $user, Contact $contact)
    {
        return $user->userCanDo('Contact', 'edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return mixed
     */
    public function delete(User $user, Contact $contact)
    {
        return $user->userCanDo('Contact', 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return mixed
     */
    public function restore(User $user, Contact $contact)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Adminetic\Contact\Models\Admin\Contact  $contact
     * @return mixed
     */
    public function forceDelete(User $user, Contact $contact)
    {
        return true;
    }
}
