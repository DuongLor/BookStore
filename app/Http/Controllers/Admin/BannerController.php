<?php

namespace App\Http\Controllers\Admin;

use App\Models\banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
	//
	public function index()
	{
		$banners = banner::all();
		return view('admin.banner.index', compact('banners'));
	}
	public function create()
	{
		return view('admin.banner.create');
	}

	public function store(Request $request)
	{
		if ($request->isMethod('POST')) {
			$banner = new banner();
			if ($request->hasFile('image') && $request->file('image')->isValid()) {
				$request->validate([
					'image' => 'required|image',
				]);
				$banner->image = upload_file('uploads', $request->file('image'));
			};
			$banner->save();
			return redirect()->route('admin.banner')->with('success', 'banner Added Successfully');
		}
		return view('admin.banner.create');
	}

	public function edit($id)
	{
		$banner = banner::find($id);
		return view('admin.banner.edit', compact('banner'));
	}

	public function update(Request $request, $id)
	{

		$banner = banner::findOrFail($id);
		$imgOld = $banner->image;
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			$request->validate([
				'image' => 'required|image',
			]);
			delete_file($imgOld);
			$banner->image = upload_file('uploads', $request->file('image'));
		};
		$banner->save();
		return redirect()->route('admin.banner')->with('success', 'banner Updated Successfully');
	}

	public function destroy($id)
	{
		$banner = banner::find($id);
		delete_file($banner->image);
		$banner->delete();
		return redirect()->route('admin.banner')->with('success', 'banner Deleted Successfully');
	}
}
