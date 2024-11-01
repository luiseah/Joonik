<?php

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder as Base;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 * @extends Base<TModel>
 */
class Builder extends Base
{
    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<Model>|\Illuminate\Database\Eloquent\Collection<int, Model>
     */
    public function pagination(int $limit = 15)
    {
        return \Request::has('per_page')
            ? $this->paginate(\Request::integer('per_page', $limit))
            : $this->get();
    }
}
