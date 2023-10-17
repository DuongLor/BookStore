<?php

namespace App\Http\Controllers\Client;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\rating;

class ClientBookController extends Controller
{
	//
	public function detail(Request $request, $id)
	{
		$book = book::where('id', $id)->first();
		$ratings_by_book = rating::where('book_id', $id)->get();
		// promotion_id in books
		$promotion = DB::table('books')->join('promotions', 'promotions.id', '=', 'books.promotion_id')->select('promotions.*')->where('books.id', $id)->first();
		// Lấy danh mục ID của sản phẩm
		$genreId = $book->genre_id;

		// Lấy ra các sản phẩm cùng danh mục
		$relatedProducts = book::join('genres', 'genres.id', '=', 'books.genre_id')->select('books.*', 'genres.name as genre_name')->where('genre_id', $genreId)
			->where('books.id', '!=', $book->id)
			->take(4)
			->get();
		$ratings = rating::join('users', 'ratings.user_id', '=', 'users.id')->join('books', 'ratings.book_id', '=', 'books.id')->select('users.image as user_image', 'users.name as user_name', 'ratings.created_at', 'ratings.rating', 'ratings.comment')->where('book_id', $book->id)->get();
		// Trả về view kèm các sản phẩm liên quan
		return view('client.detail', compact('book', 'ratings_by_book', 'promotion', 'relatedProducts','ratings'));
	}
}
