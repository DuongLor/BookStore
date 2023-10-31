<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
	//
	public function index()
	{
		$user = Auth::user();
		return view('client.profile', compact('user'));
	}
	public function update(ProfileRequest $request)
	{
		$params = $request->except('_token');
		$user = User::find(Auth::id());
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			$imgOld = $user->image;
			delete_file($imgOld);
			$params['image'] = upload_file('uploads', $request->file('image'));
		}
		User::where('id', Auth::id())->update($params);
		Session::flash('success', 'Cập nhật thành công');
		return redirect()->route('client.profile');
	}
}
