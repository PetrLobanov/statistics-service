<?php

namespace App\Services\Filter;

class SearchUsers extends Filter
{
    public function name(): void
    {
        $this->builder->where('name', 'like', '%' . $this->request->name . '%');
    }
    public function ageMin(): void
    {
        $this->builder->where('age', '>=', $this->request->ageMin);
    }

    public function ageMax(): void
    {
        $this->builder->where('age', '<=', $this->request->ageMax);
    }
}
