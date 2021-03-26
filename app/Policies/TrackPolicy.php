<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Track;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function view(User $user, Track $track)
    {
        return $this->hasAccess($user, $track);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function update(User $user, Track $track)
    {
        return $this->hasAccess($user, $track);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function delete(User $user, Track $track)
    {
        return $this->hasAccess($user, $track);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function restore(User $user, Track $track)
    {
        return $this->hasAccess($user, $track);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function forceDelete(User $user, Track $track)
    {
        return $this->hasAccess($user, $track);
    }

    private function hasAccess(User $user, Track $track)
    {
        return $track->project->user == $user;
    }
}