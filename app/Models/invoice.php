<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
		protected $table = 'invoices';
		protected $fillable = [
			'user_id','name','phone','address','total_amount'
		];
}
