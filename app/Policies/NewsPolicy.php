<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, News $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return false;
    }

    public function storeBulk(User $user): bool
    {
        return false;
    }

    public function update(User $user, News $model): bool
    {
        return false;
    }

    public function updateBulk(User $user, News $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, News $model): bool
    {
        return false;
    }

    public function delete(User $user, News $model): bool
    {
        return false;
    }
}
