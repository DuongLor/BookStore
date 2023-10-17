@extends('admin.templates.app')
@section('title', 'Promotion')
@section('content')
    <a href="{{ route('admin.promotion') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Back</a>
    <div class="">
        <form action="{{ route('admin.promotion.store') }}" method="POST" class="form form-vertical">
            @csrf
            @include('templates.input', [
                'label' => 'Giảm giá',
                'type' => 'number',
                'name' => 'discount',
                'value' => old('discount'),
            ])
            @include('templates.input', [
                'label' => 'Ngày bắt đầu',
                'type' => 'datetime-local',
                'name' => 'start_date',
                'value' => old('start_date'),
            ])
            @include('templates.input', [
                'label' => 'Ngày kết thúc',
                'type' => 'datetime-local',
                'name' => 'end_date',
                'value' => old('end_date'),
            ])
            <button type="submit" class="btn btn-primary mt-5">Add</button>
        </form>
    </div>
@endsection
