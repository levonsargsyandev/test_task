<?php

declare(strict_types=1);

namespace App\Repositories\Employe;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Employe;
use App\Models\Company;
use App\Models\Position;

class EmployeRepository implements EmployeRepositoryInterface
{
    public function create($id)
    {
        $position = Position::all();
        return ['company_id'=>$id, 'positions'=>$position];
    }
    public function store($request)
    {
        $data = $request->except(['_token']);
        $employee = Employe::create($data);
        return $employee->company->id;
    }

    public function edit($id)
    {
        $employe = Employe::find($id);
        $position = Position::all();
        return ['employe'=> $employe, 'positions'=>$position];
    }

    public function update($id, $request)
    {
        $employe = Employe::find($id);
        $employe->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'salary' => $request->input('salary'),
            'position_id' => $request->input('position'),
        ]);
        return $employe->company_id;
    }

    public function destroy($id)
    {
        $employe = Employe::find($id);
       $employe->delete();
       return $employe->company->id;
    }
}
