<?php

namespace Tests\Managers;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

trait UserManager
{
    /**
     * Create a new user.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model|Authenticatable|HasApiTokens
     */
    public function createUser(array $attributes = [])
    {
        return User::factory()
            ->createOne($attributes);
    }

    /**
     * Create a new user.
     *
     * @param array $array
     * @param int $count
     * @return mixed
     */
    public function createManyUsers(array $array = [], int $count = 10)
    {
        $has = fn($index) => array_is_list($array) && !empty($array)
            ? $array[$index]
            : $array ?? [];

        return Collection::make(array_fill(0, $count, null))
            ->map(fn($value, $index) => $this->createUser($has($index)));
    }
}
