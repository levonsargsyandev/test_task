<?php

namespace App\Http\Controllers;

use App\Repositories\Employe\EmployeRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEmployeRequest;
use Storage;

class EmployeController extends Controller
{

    public function __construct(EmployeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    // $this->middleware('islogin')->except(['register', 'registration', 'logInPost', 'login']);
    }

    public function create($id)
    {
        return view('Employe.create', $this->repo->create($id));
    }

    public function store(CreateEmployeRequest $request)
    {
        return redirect()->route('companies.show',  $this->repo->store($request));
    }

    public function edit($id)
    {
        return view('Employe.edit',$this->repo->edit($id));
    }

    public function update(CreateEmployeRequest $request, $id)
    {
      return redirect()->route('companies.show', $this->repo->update($id, $request));
    }

    public function destroy($id)
    {
       return redirect()->route('companies.show', $this->repo->destroy($id));
    }
}
