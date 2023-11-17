<?php

namespace App\Http\Controllers\Client;

use App\Models\book;
use App\Models\genre;
use App\Models\banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
		$banners = banner::all();
		$genres = genre::all();
		$books = book::latest()->paginate(12);
		$books_promiment = book::where('prominent', 0)->paginate(4);
		return view('client.home', compact('banners', 'genres', 'books', 'books_promiment'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function search(Request $request)
	{
		$search = $request->search;
		$search_books = book::where('title', 'like', '%' . $search . '%')->latest()->paginate(12);
		if ($search_books->count() == 0) {
			// trả về lỗi 404
			abort(404);
		}
		$banners = banner::all();
		$genres = genre::all();
		$books = book::all();
		$books_promiment = book::where('prominent', 0)->paginate(4);

		return view('client.search', compact('banners', 'genres', 'search_books', 'books_promiment'));
	}
	public function genre($id)
	{
		$genre_books = book::where('genre_id', $id)->latest()->paginate(12);
		$banners = banner::all();
		$genres = genre::all();
		$books = book::all();
		$books_promiment = book::where('prominent', 0)->paginate(4);
		return view('client.genre', compact('banners', 'genres', 'genre_books', 'books_promiment'));
	}
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
