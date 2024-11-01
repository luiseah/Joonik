<?php

namespace App\Models\Builders;

use Illuminate\Http\Request;

class UserBuilder extends Builder
{
    /**
     * @param $input
     * @method search($input)
     *
     * @return $this
     */
    public function s($input)
    {
        $this->where(fn($q) => $q
            ->orWhereRaw('s(name) LIKE s(?)', [s($input)])
            ->orWhereRaw('s(email) LIKE s(?)', [s($input)]));

        return $this;
    }

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function orderBys(Request $request)
    {
        $orders = $request->input('orderBys', [
            'created_at' => 'desc',
        ]);

        foreach ($orders as $name => $value) {
            match ($name) {
                'name' => $this->orderBy(\DB::raw('lower(name)'), $value),
                'created_at' => $this->orderBy('created_at', $value),
                'updated_at' => $this->orderBy('updated_at', $value),
            };
        }

        return $this;
    }

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function applyFilters(Request $request)
    {
        if ($request->has('s')) {
            $this->s($request->str('s'));
        }

        $this->orderBys($request);

        return $this;
    }
}
