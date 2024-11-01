<?php

namespace App\Models\Builders;

use Illuminate\Http\Request;
/**
 * @extends Builder<\App\Models\Location>
 */
class LocationBuilder extends Builder
{

    /**
     * Sorts the results according to the given parameter
     *
     * @return $this
     */
    public function orderBys(Request $request)
    {
        $orders = $request->input('orderBys', [
            'created_at' => 'desc',
        ]);

        /** @var array<string, string> $orders */
        foreach ($orders as $name => $value) {
            match ($name) {
                'name' => $this->orderBy(\DB::raw('lower(name)'), $value),
                'created_at' => $this->orderBy('created_at', $value),
                'updated_at' => $this->orderBy('updated_at', $value),
                default => null,
            };
        }

        return $this;
    }

    /**
     * Apply filters.
     *
     * @param Request $request
     *
     * @return $this
     */
    public function applyFilters(Request $request)
    {
        $this->orderBys($request);

        return $this;
    }
}
