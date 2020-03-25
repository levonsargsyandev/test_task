<?php

declare(strict_types=1);

namespace App\Repositories\Comment;

use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function store($request);
}
