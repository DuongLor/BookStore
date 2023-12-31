<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
	use HasFactory;
	protected $table = 'ratings';
	protected $fillable = [
		'rating', 'book_id', 'user_id', 'comment'
	];
	public function book()
	{
		return $this->belongsTo(Book::class);
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
