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
		$books = book::all();
		$books_promiment = book::where('prominent', 0)->get();
		return view('client.home', compact('banners', 'genres', 'books', 'books_promiment'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function search(Request $request)
	{
		$search = $request->search;
		$books = book::where('title', 'like', '%' . $search . '%')->get();
		$banners = banner::all();
		$genres = genre::all();
		$books = book::all();
		$books_promiment = book::where('prominent', 0)->get();
		return view('client.home', compact('banners', 'genres', 'books', 'books_promiment'));
	}
	public function genre($id)
	{
		$books = book::where('genre_id', $id)->get();
		$banners = banner::all();
		$genres = genre::all();
		$books = book::all();
		$books_promiment = book::where('prominent', 0)->get();
		return view('client.home', compact('banners', 'genres', 'books', 'books_promiment'));
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
