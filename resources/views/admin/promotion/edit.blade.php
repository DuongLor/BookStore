@extends('admin.templates.app')
@section('title', 'Promotion')
@section('content')
    <a href="{{ route('admin.promotion') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Back</a>
    <div class="">
        <form action="{{ route('admin.promotion.update', $promotion->id) }}" method="POST" class="form form-vertical">
            @csrf
            @method('PUT')
            @include('templates.input', [
                'label' => 'Giảm giá',
                'type' => 'number',
                'name' => 'discount',
                'value' => $promotion->discount,
            ])
            @include('templates.input', [
                'label' => 'Ngày bắt đầu',
                'type' => 'datetime-local',
                'name' => 'start_date',
                'value' => $promotion->start_date,
            ])
            @include('templates.input', [
                'label' => 'Ngày kết thúc',
                'type' => 'datetime-local',
                'name' => 'end_date',
                'value' => $promotion->end_date,
            ])
            <button type="submit" class="btn btn-primary mt-5">Edit</button>
        </form>
    </div>
@endsection
