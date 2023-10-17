<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	//
	public function index()
	{
		$users = User::all()->where('role', 1);
		return view('admin.user.index', compact('users'));
	}
	public function destroy($id)
	{
		$user = User::find($id);
		delete_file($user->image);
		$user->delete();
		return redirect()->route('admin.user')->with('success', 'user Deleted Successfully');
	}
}
