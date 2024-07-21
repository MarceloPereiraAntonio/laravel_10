<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Repositories\Contracts\PaginationInterface;

class ApiAdapter
{
    public static function toJson(
        PaginationInterface $data
    )
    {
        return DefaultResource::collection($data->items())
        ->additional([
            'meta' => [
                'total' => $data->total(),
                'is_first_page' => $data->isFirstPage(),
                'ist_last_page' => $data->isLastPage(),
                'current_pagge' => $data->currentPage(),
                'next_page'     => $data->getNumberNextPage(),
                'previous_page' => $data->getNumberPreviousPage(),
            ]
        ]);
    }

}
