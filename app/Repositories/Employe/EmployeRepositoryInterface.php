<?php

declare(strict_types=1);

namespace App\Repositories\Employe;

use Illuminate\Http\Request;

interface EmployeRepositoryInterface
{
    public function create($id);
    public function store($request);
    public function edit($id);
    public function update($id, $request);
    public function destroy($id);
}
