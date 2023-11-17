<?php

namespace App\Http\Controllers\Admin;

use App\Models\genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    //
		public function index()
		{
			$genres = genre::latest()->paginate(10);
			return view('admin.genre.index', compact('genres'));
		}
		public function create()
		{
			return view('admin.genre.create');
		}
	
		public function store(Request $request)
		{
			if ($request->isMethod('POST')) {
				$request->validate([
					'name' => 'required',
				]);
				$genre = new genre();
				$genre->name = $request->name;
				$genre->save();
				return redirect()->route('admin.genre')->with('success', 'genre Added Successfully');
			}
			return view('admin.genre.create');
		}
	
		public function edit($id)
		{
			$genre = genre::find($id);
			return view('admin.genre.edit', compact('genre'));
		}
	
		public function update(Request $request, $id)
		{
			$genre = genre::find($id);
	
			$request->validate([
				'name' => 'required',
			]);
			$genre = genre::find($id);
			$genre->name = $request->name;
			$genre->save();
			return redirect()->route('admin.genre')->with('success', 'genre Updated Successfully');
		}
	
		public function destroy($id)
		{
			$genre = genre::find($id);
			$genre->delete();
			return redirect()->route('admin.genre')->with('success', 'genre Deleted Successfully');
		}
}
