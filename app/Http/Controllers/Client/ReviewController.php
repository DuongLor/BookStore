<?php

namespace App\Http\Controllers\Client;

use App\Models\rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class ReviewController extends Controller
{
	public function store(Request $request)
	{
			//create review
			//validate
			// create review validate
			$validator = Validator::make($request->all(), [
				'rating' => 'required',
				'comment' => 'required|max:255',
			]);
			if ($validator->fails()) {
				return redirect()->back()->with('error', 'Không được để trống đánh giá');
			}
			$params = $request->except('_token');
			$params['user_id'] = auth()->id();
			rating::create($params);
			return redirect()->back()->with('success', 'Đánh giá thành công');
	}
}
