<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OderRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules()
	{
		return [
			'name' => 'required',
			'phone' => 'required',
			'address' => 'required',

		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Tên không được để trống',
			'phone.required' => 'Số điện thoại không được để trống',
			'address.required' => 'Địa chỉ không được để trống',
		];
	}
}
