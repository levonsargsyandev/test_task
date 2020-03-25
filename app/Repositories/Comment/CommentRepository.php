<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Company;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;
class CommentRepository implements CommentRepositoryInterface
{

    public function store($request)
    {
        
        $comment = Comment::create([
            'body' => $request->body,
            'company_id' => $request->comment_company_id,
            'comment_company_id' => Session::get('company')->id
        ]);
        return $request->comment_company_id;
    }
}
