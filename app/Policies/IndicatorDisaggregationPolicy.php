<?php

namespace App\Policies;

use App\Models\IndicatorDisaggregation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndicatorDisaggregationPolicy
{
    use HandlesAuthorization;

    const MODEL = "indicator-disaggregations";

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
     * @param  \App\Models\IndicatorDisaggregation  $indicatorDisaggregation
     * @return mixed
     */
    public function view(User $user, IndicatorDisaggregation $indicatorDisaggregation)
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
     * @param  \App\Models\IndicatorDisaggregation  $indicatorDisaggregation
     * @return mixed
     */
    public function update(User $user, IndicatorDisaggregation $indicatorDisaggregation)
    {
        return in_array("update-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IndicatorDisaggregation  $indicatorDisaggregation
     * @return mixed
     */
    public function delete(User $user, IndicatorDisaggregation $indicatorDisaggregation)
    {
        return in_array("delete-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IndicatorDisaggregation  $indicatorDisaggregation
     * @return mixed
     */
    public function restore(User $user, IndicatorDisaggregation $indicatorDisaggregation)
    {
        return in_array("restore-" . self::MODEL, json_decode($user->role->permissions));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\IndicatorDisaggregation  $indicatorDisaggregation
     * @return mixed
     */
    public function forceDelete(User $user, IndicatorDisaggregation $indicatorDisaggregation)
    {
        return in_array("force-delete-" . self::MODEL, json_decode($user->role->permissions));
    }
}
