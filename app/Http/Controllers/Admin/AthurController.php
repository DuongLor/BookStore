<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\author;
use Illuminate\Http\Request;

class AthurController extends Controller
{
	//
	public function index()
	{
		$authors = author::latest()->paginate(10);
		return view('admin.author.index', compact('authors'));
	}
	public function create()
	{
		return view('admin.author.create');
	}

	public function store(Request $request)
	{
		if ($request->isMethod('POST')) {
			$request->validate([
				'name' => 'required',
			]);
			$author = new author();
			$author->name = $request->name;
			$author->save();
			return redirect()->route('admin.author')->with('success', 'Author Added Successfully');
		}
		return view('admin.author.create');
	}

	public function edit($id)
	{
		$author = author::find($id);
		return view('admin.author.edit', compact('author'));
	}

	public function update(Request $request, $id)
	{
		$author = author::find($id);

		$request->validate([
			'name' => 'required',
		]);
		$author = author::find($id);
		$author->name = $request->name;
		$author->save();
		return redirect()->route('admin.author')->with('success', 'Author Updated Successfully');
	}

	public function destroy($id){
		$author = author::find($id);
		$author->delete();
		return redirect()->route('admin.author')->with('success', 'Author Deleted Successfully');
	}
}
