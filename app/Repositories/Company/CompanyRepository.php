<?php

declare(strict_types=1);

namespace App\Repositories\Company;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Company;
use App\Models\Comment;
use App\Models\Employe;
use App\Models\Position;
use Session;

class CompanyRepository implements CompanyRepositoryInterface
{

	public function update($id, $request)
    {
        $logoName = '';
        if ($request->file('logo'))
        {
            $logoName = $request->input('name').'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('storage'), $logoName);
        }

        $comp = Company::find($request->input('id'))
        ->update([
        	'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $logoName,
            'website' => $request->input('website')]);

        return redirect()->route('companies.index')->with('info','Company Updated Successfully');
    }
    public function del($id)
    {
    	$company = Company::find($id);
     	$company->delete();
        Session::flush();
     	return redirect()->route('login');
    }

    public function all()
    {
        return Company::paginate(10);
    }

    public function findById($id)
    {
        return Company::with('employes.position')->find($id);
    }
}