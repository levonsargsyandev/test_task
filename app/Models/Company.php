<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
	protected $table = 'companies';
    protected $fillable = ['name', 'email', 'website', 'adress', 'logo', 'password'];

	protected $hidden = [
        'password', 'remember_token',
    ];

	public function getAuthPassword()
    {
        return $this->password;
    }

    public function employes()
	{
		return $this->hasMany('App\Models\Employe', 'company_id', 'id');
	}


	public function comments()
	{
		return $this->hasMany('App\Models\Comment', 'company_id', 'id');
	}

	public function userComment()
	{
		return $this->hasMany('App\Models\Comment', 'comment_company_id', 'id');
	}

	public static function boot() {
        parent::boot();
        self::deleting(function ($company) {
	        foreach ($company->employes as $employe) {
	        	$employe->delete();
	    	}
	    	foreach ($company->comments as $comment) {
	        	$comment->delete();
	    	}
	    	foreach ($company->userComment as $comment) {
	        	$comment->delete();
	    	}
        });
    }
}
