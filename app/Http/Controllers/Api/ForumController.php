<?php

namespace App\Http\Controllers\Api;

use App\DTO\Supports\CreateForumDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForumCreateUpdateRequest;
use App\Http\Resources\ForumResource;
use App\Services\ForumService;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __construct(
        protected ForumService $service
    )
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ForumCreateUpdateRequest $request)
    {
        $response = $this->service->new(
            CreateForumDTO::makeFromRequest($request)
        );

        return new ForumResource($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
