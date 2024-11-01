<?php

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder as Base;

class Builder extends Base
{
    /**
     *
     * @return mixed
     */
    public function pagination($limit = 15)
    {
        return \Request::has('per_page')
            ? $this->paginate(\Request::integer('per_page', $limit))
            : $this->get();
    }
}
