<?php

namespace App\Http\Controllers\Client;

use App\Models\book;
use App\Models\invoice;
use Illuminate\Http\Request;
use App\Http\Requests\OderRequest;
use App\Http\Controllers\Controller;
use App\Models\invoice_detail;
use Illuminate\Support\Facades\Auth;

class OderController extends Controller
{
	//
	public function index()
	{
		return view('client.order.index');
	}
	public function create(OderRequest $request)
	{

		$params = $request->except('_token');
		if (Auth::check()) {
			$params['user_id'] = Auth::id();
		}

		$invoice = invoice::create($params);
		if (!session()->has('cart')) {
			return redirect()->route('client.home')->with('error', 'Bớt bớt');
		}
		foreach (session('cart') as $book_id => $item) {
			$book = book::find($book_id);
			// check quantity

			invoice_detail::create([
				'invoice_id' => $invoice->id,
				'book_id' => $book_id,
				'quantity' => $item['quantity'],
				'discount' => $item['discount'],
				'price' => $item['price'] - intval($item['discount']),
				'total' => ($item['price'] - intval($item['discount'])) * $item['quantity'],
			]);
			$book->quantity -= $item['quantity'];
			$book->save();
		}
		session()->forget('cart');
		return redirect()->route('client.home')->with('success', 'Đặt hàng thành công');
	}
	public function list()
	{
		$orders = Invoice::where('user_id', Auth::id())->get();
		return view('client.order.list', compact('orders'));
	}
	public function detail($id)
	{
		$order = Invoice::find($id);
		$order_details = invoice_detail::where('invoice_id', $id)->get();
		return view('client.order.detail', compact('order', 'order_details'));
	}
}
