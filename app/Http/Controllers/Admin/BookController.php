<?php

namespace App\Http\Controllers\Admin;

use App\Models\book;
use App\Models\genre;
use App\Models\author;
use App\Models\promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
	//

	public function index()
	{
		$books = book::all();
		return view('admin.book.index', compact('books'));
	}
	public function create()
	{
		$authors = author::all();
		$genres = genre::all();
		$promotions = promotion::all();
		return view('admin.book.create', compact('authors', 'genres', 'promotions'));
	}

	public function store(Request $request)
	{
		if ($request->isMethod('POST')) {
			$request->validate([
				'prominent' => 'required',
				'genre_id' => 'required',
				'author_id' => 'required',
				'promotion_id' => 'required',
				'title' => 'required',
				'description' => 'required',
				'price' => 'required',
				'quantity' => 'required',
				'image' => 'required|image',
			]);
			$book = new book();
			$book->prominent = $request->prominent;
			$book->genre_id = $request->genre_id;
			$book->author_id = $request->author_id;
			$book->promotion_id = $request->promotion_id;
			$book->title = $request->title;
			$book->description = $request->description;
			$book->price = $request->price;
			$book->quantity = $request->quantity;
			if ($request->hasFile('image') && $request->file('image')->isValid()) {
				$request->validate([
					'image' => 'required|image',
				]);
				$book->image = upload_file('uploads', $request->file('image'));
			};
			$book->save();
			return redirect()->route('admin.book')->with('success', 'book Added Successfully');
		}
		return view('admin.book.create');
	}

	public function edit($id)
	{
		$book = book::find($id);
		$authors = author::all();
		$genres = genre::all();
		$promotions = promotion::all();
		return view('admin.book.edit', compact('book', 'authors', 'genres', 'promotions'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'prominent' => 'required',
			'genre_id' => 'required',
			'author_id' => 'required',
			'promotion_id' => 'required',
			'title' => 'required',
			'description' => 'required',
			'price' => 'required',
			'quantity' => 'required',
			'image' => 'image',
		]);
		$book = book::findOrFail($id);
		$imgOld = $book->image;
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			$request->validate([
				'image' => 'required|image',
			]);
			delete_file($imgOld);
			$book->image = upload_file('uploads', $request->file('image'));
		}
		$book->prominent = $request->prominent;
		$book->genre_id = $request->genre_id;
		$book->author_id = $request->author_id;
		$book->promotion_id = $request->promotion_id;
		$book->title = $request->title;
		$book->description = $request->description;
		$book->price = $request->price;
		$book->quantity = $request->quantity;
		$book->save();
		return redirect()->route('admin.book')->with('success', 'book Updated Successfully');
	}

	public function destroy($id)
	{
		$book = book::find($id);
		delete_file($book->image);
		$book->delete();
		return redirect()->route('admin.book')->with('success', 'book Deleted Successfully');
	}
}
