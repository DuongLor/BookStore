<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class book extends Model
{
	use HasFactory, SoftDeletes;
	protected $table = 'books';
	protected $fillable = [
		'prominent', 'title', 'description', 'author_id', 'genre_id', 'promotion_id', 'image', 'price', 'quantity'
	];
	public function author()
	{
		return $this->belongsTo(Author::class);
	}
	public function genre()
	{
		return $this->belongsTo(Genre::class);
	}
	public function rating()
	{
		return $this->belongsTo(rating::class);
	}
	public function promotion()
	{
		return $this->belongsTo(Promotion::class);
	}
}
