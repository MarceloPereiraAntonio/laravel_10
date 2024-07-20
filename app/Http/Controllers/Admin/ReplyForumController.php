<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ForumService;
use Illuminate\Http\Request;

class ReplyForumController extends Controller
{
    public function __construct(protected ForumService $service)
    {

    }
    public function index(string $id)
    {
        if(!$data = $this->service->findOne($id)){
            return back();
        }
        return view('admin.forum.replies.replies')->with('data', $data);
    }
}
