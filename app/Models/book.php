<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class book extends Model
{
    use HasFactory,SoftDeletes;
		protected $table = 'books';
		protected $fillable = [
			'prominent','title','description','author_id','banner_id','image','price','quantity'
		];
}
