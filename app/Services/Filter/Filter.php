<?php

namespace App\Services\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    public function __construct(protected Builder $builder, protected Request $request)
    {
    }

    public function apply(): Builder
    {
        $this->prepareFiltering();

        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        $this->passedFiltering();

        return $this->builder;
    }

    protected function filters(): mixed
    {
        return $this->request->isMethod('get') ? $this->request->input() : null;
    }

    protected function prepareFiltering(): void
    {
    }

    protected function passedFiltering(): void
    {
    }
}
