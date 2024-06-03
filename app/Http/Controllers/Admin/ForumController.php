<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateForumDTO;
use App\DTO\UpdateForumDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForumCreateUpdateRequest;
use App\Models\Forum;
use App\Services\ForumService;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function __construct(protected ForumService $service)
    {

    }
    public function index(Request $request)
    {
        $data = $this->service->paginate(
                        page: $request->get('page', 1),
                        totalPerPage: $request->get('per_page', 15),
                        filter: $request->filter
                        );
        return view('admin.forum.index')->with('data', $data);
    }

    public function show(string $id)
    {
        if(!$data = $this->service->findOne($id)){
            return back();
        }

        return view('admin.forum.show')->with('data', $data);
    }

    public function create()
    {
        return view('admin.forum.create');
    }

    public function store(ForumCreateUpdateRequest $request)
    {
        $this->service->new(CreateForumDTO::makeFromRequest($request));

        return redirect()->route('forum.index');
    }

    public function edit(string $id)
    {

        if(!$forum = $this->service->findOne($id)){
            return back();
        }

        return view('admin.forum.edit')->with('data', $forum);
    }

    public function update(ForumCreateUpdateRequest $request, string $id)
    {
        $forum = $this->service->update(UpdateForumDTO::makeFromRequest($request));
        if(!$forum){
            return back();
        }
        return redirect()->route('forum.index');

    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('forum.index');
    }
}
