<?php

namespace App\Http\Controllers;
use App\Repositories\Company\CompanyRepositoryInterface;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanieRequest;


class CompanyController extends Controller
{
    public function __construct(CompanyRepositoryInterface $repo)
    {
        $this->repo = $repo;
    // $this->middleware('islogin')->except(['register', 'registration', 'logInPost', 'login']);
    }
    
    public function index()
    {
        return view('Company.index',['companyes'=>$this->repo->all()]);
    }

    
    public function show($id)
    {
        return view('Company.show',['company'=> $this->repo->findById($id)]);
    }

    
    public function edit($id)
    {
        return view('Company.edit',['company'=> $this->repo->findById($id)]);
    }

    
    public function update(CreateCompanieRequest $request, $id)
    {
        return $this->repo->update($id, $request);
    }


    public function destroy($id)
    {
        return $this->repo->del($id);
    }


 
}
