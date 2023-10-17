<?php

namespace App\Http\Controllers\Admin;

use App\Models\book;
use App\Models\rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
	//
	public function index()
	{
		$ratings = rating::all()->where('role', 1);
		return view('admin.rating.index', compact('ratings'));
	}
	public function destroy($id)
	{
		$rating = rating::find($id);
		delete_file($rating->image);
		$rating->delete();
		return redirect()->route('admin.rating')->with('success', 'rating Deleted Successfully');
	}
}
