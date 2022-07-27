<?php

namespace App\Controllers;

class Reset extends BaseController
{ 
    public function index()
    { 
        return view('Auth/reset');
    }
	public function attemptReset()
	{ 
		$users = model(UserModel::class);
 

		$rules = [ 
			'email'		=> 'required|valid_email',
			'password'	 => 'required|strong_password',
			'pass_confirm' => 'required|matches[password]',
		];

		if (! $this->validate($rules))
		{
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		$user = $users->where('email', $this->request->getPost('email'))->first();

		if (is_null($user))
		{
			return redirect()->back()->with('error', lang('Auth.forgotNoUser'));
		} 
		// Success! Save the new password, and cleanup the reset hash.
		$user->password 		= $this->request->getPost('password');
		$user->reset_hash 		= null;
		$user->reset_at 		= date('Y-m-d H:i:s');
		$user->reset_expires    = null;
        $user->force_pass_reset = false;
		$users->save($user);  
		return redirect()->route('logout')->with('message', lang('Auth.resetSuccess'));
	}
}