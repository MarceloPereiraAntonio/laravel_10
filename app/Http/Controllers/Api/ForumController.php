<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Supports\CreateForumDTO;
use App\DTO\Supports\UpdateForumDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForumCreateUpdateRequest;
use App\Http\Resources\ForumResource;
use App\Services\ForumService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ForumController extends Controller
{
    public function __construct(
        protected ForumService $service
    )
    {}

    public function index(Request $request)
    {
        //$response = Forum::paginate();
        $response = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter
        );
        return ApiAdapter::toJson($response);
    }


    public function store(ForumCreateUpdateRequest $request)
    {
        $response = $this->service->new(
            CreateForumDTO::makeFromRequest($request)
        );

        return (new ForumResource($response))
                        ->response()
                        ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(string $id)
    {
        if(!$response = $this->service->findOne($id)){
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ForumResource($response);
    }

    public function update(ForumCreateUpdateRequest $request, string $id)
    {
        $response = $this->service->update(
            UpdateForumDTO::makeFromRequest($request)
        );
        if(!$response){
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ForumResource($response);
    }

    public function destroy(string $id)
    {
        if(!$this->service->findOne($id)){
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
