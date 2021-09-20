<?php

namespace App\Policies;

use App\Models\CollectedData;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollectedDataPolicy
{
    use HandlesAuthorization;

    const MODEL = "collected-data";

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {   
        return in_array("view-any-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CollectedData  $collectedData
     * @return mixed
     */
    public function view(User $user, CollectedData $collectedData)
    {
        return in_array("view-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array("create-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CollectedData  $collectedData
     * @return mixed
     */
    public function update(User $user, CollectedData $collectedData)
    {
        return in_array("update-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CollectedData  $collectedData
     * @return mixed
     */
    public function delete(User $user, CollectedData $collectedData)
    {
        return in_array("delete-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CollectedData  $collectedData
     * @return mixed
     */
    public function restore(User $user, CollectedData $collectedData)
    {
        return in_array("restore-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CollectedData  $collectedData
     * @return mixed
     */
    public function forceDelete(User $user, CollectedData $collectedData)
    {
        return in_array("force-delete-" . self::MODEL, json_decode($user->role->permissions));
    }
}
