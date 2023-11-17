@extends('admin.templates.app')
@section('title', 'invoice')
@section('content')
    <a href="{{ route('admin.invoice') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Back</a>
    <div class="">
        <form action="{{ route('admin.invoice.update', $invoice->id) }}" method="POST" class="form form-vertical">
            @csrf
            @method('PUT')
            <div>
                <label for="regular-form-1" class="form-label">Status</label>
                <select name="status" id="" class="tom-select w-full">
                    <option value="0" {{ $invoice->status == 0 ? 'selected' : '' }}>Pending</option>
										<option value="1" {{ $invoice->status == 1 ? 'selected' : '' }}>Success</option>
										<option value="2" {{ $invoice->status == 2 ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Edit</button>
        </form>
    </div>
@endsection
