<?php

namespace App\Http\Controllers\Admin;

use App\Models\invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
	//
	public function index()
	{
		$invoices = invoice::latest()->paginate(10);
		return view('admin.invoice.index', compact('invoices'));
	}

	public function edit($id)
	{
		$invoice = invoice::find($id);
		return view('admin.invoice.edit', compact('invoice'));
	}

	public function update(Request $request, $id)
	{
		$invoice = invoice::find($id);

		$request->validate([
			'status' => 'required',
		]);
		$invoice = invoice::find($id);
		$invoice->status = $request->status;
		$invoice->save();
		return redirect()->route('admin.invoice')->with('success', 'invoice Updated Successfully');
	}
}
