<?php

namespace App\Http\Controllers\Admin;

use App\Models\promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
	//
	public function index()
	{
		$promotions = promotion::latest()->paginate(10);
		return view('admin.promotion.index', compact('promotions'));
	}
	public function create()
	{
		return view('admin.promotion.create');
	}

	public function store(Request $request)
	{
		if ($request->isMethod('POST')) {
			$request->validate([
				'discount' => 'required',
				'start_date' => 'required',
				'end_date' => 'required',
			]);
			$promotion = new promotion();
			$promotion->discount = $request->discount;
			$promotion->start_date = $request->start_date;
			$promotion->end_date = $request->end_date;
			$promotion->save();
			return redirect()->route('admin.promotion')->with('success', 'promotion Added Successfully');
		}
		return view('admin.promotion.create');
	}

	public function edit($id)
	{
		$promotion = promotion::find($id);
		return view('admin.promotion.edit', compact('promotion'));
	}

	public function update(Request $request, $id)
	{
		$promotion = promotion::find($id);

		$request->validate([
			'discount' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
		]);
		$promotion = promotion::find($id);
		$promotion->discount = $request->discount;
		$promotion->start_date = $request->start_date;
		$promotion->end_date = $request->end_date;
		$promotion->save();
		return redirect()->route('admin.promotion')->with('success', 'promotion Updated Successfully');
	}

	public function destroy($id)
	{
		$promotion = promotion::find($id);
		$promotion->delete();
		return redirect()->route('admin.promotion')->with('success', 'promotion Deleted Successfully');
	}
}
