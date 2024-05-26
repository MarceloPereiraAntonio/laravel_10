<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Forum $forum)
    {
        $data = $forum->all();
        return view('admin.forum.index')->with('data', $data);
    }

    public function show(string|int $id, Forum $forum)
    {
        if(!$data = $forum->find($id)){
            return back();
        }

        return view('admin.forum.show')->with('data', $data);
    }

    public function create()
    {
        return view('admin.forum.create');
    }

    public function store(Request $request, Forum $forum)
    {
        $data = $request->all();
        $data['status'] = 'a';
        $forum = $forum->create($data);

        return redirect()->route('forum.index');
    }
}
