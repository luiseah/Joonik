<?php

namespace Tests\Managers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

trait LocationManager
{
    /**
     * Create a new Locations.
     *
     * @param array<string, mixed> $attributes
     * @return Location
     */
    public function createLocation(array $attributes = []): Location
    {
        return Location::factory()
            ->createOne($attributes);
    }

    /**
     * Create many Locations.
     *
     * @param int $count
     * @param mixed $array
     * @return Collection<int, Location>
     */
    public function createManyLocations(int $count = 10, mixed $array = []): Collection
    {
        $has = fn($index) => is_array($array) && array_is_list($array) && !empty($array)
            ? $array[$index]
            : $array ?? [];

        return Collection::make(array_fill(0, $count, null))
            ->map(fn($value, $index) => $this->createLocation($has($index)));
    }
}