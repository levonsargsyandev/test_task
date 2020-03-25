<?php

declare(strict_types=1);

namespace App\Repositories\Company;

use Illuminate\Http\Request;

interface CompanyRepositoryInterface
{
    public function all();
    public function findById($id);
    public function update($id, $request);
    public function del($id);
}
