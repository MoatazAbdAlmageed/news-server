<?php

namespace App\Policies;

use App\Models\Site;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Site $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return true;
    }

    public function storeBulk(User $user): bool
    {
        return false;
    }

    public function update(User $user, Site $model): bool
    {
        return false;
    }

    public function updateBulk(User $user, Site $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Site $model): bool
    {
        return false;
    }

    public function delete(User $user, Site $model): bool
    {
        return false;
    }
}
