<?php

namespace App\Http\Controllers;


use App\Repositories\Comment\CommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;



class CommentsController extends Controller
{
    public function __construct(CommentRepositoryInterface $repo)
    {
        $this->repo = $repo;
    // $this->middleware('islogin')->except(['register', 'registration', 'logInPost', 'login']);
    }
    public function store(CommentRequest $request)
    {
        return redirect()->route('companies.show', $this->repo->store($request));
    }
}
