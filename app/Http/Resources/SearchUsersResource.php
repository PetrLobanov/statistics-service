<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class SearchUsersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'count' => $this->count(),
            'averageAge' => floor($this->avg('age')),
            'popularNamesAndCount' => $this->select('name', DB::raw('COUNT(*) as count'))
                ->groupBy('name')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get(),
        ];
    }
}

