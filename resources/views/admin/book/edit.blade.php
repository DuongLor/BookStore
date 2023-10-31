@extends('admin.templates.app')
@section('title', 'Book')
@section('css_header_custom')
    <style>
        #preview img {
            max-width: 200px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            margin-top: 10px;
        }

        .fade-in {
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
@endsection
@section('content')
    <a href="{{ route('admin.book') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Back</a>
    <div class="">
        <form action="{{ route('admin.book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label"> Prominent </label>
                <input id="regular-form-1" type="text" class="form-control" name="prominent" placeholder="Prominent"
                    value="{{ $book->prominent }}">
            </div>
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label">Title</label>
                <input id="regular-form-1" type="text" class="form-control" name="title" placeholder="Title"
                    value="{{ $book->title }}">
            </div>
            <div class="form-group mb-2">
                <div> <label>Author</label>
                    <div class="mt-2"> <select class="tom-select w-full" name="author_id">
                            @foreach ($authors as $item)
                                @if ($item->id == $book->author_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select> </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div> <label>Genre</label>
                    <div class="mt-2"> <select class="tom-select w-full" name="genre_id">
                            @foreach ($genres as $item)
                                @if ($item->id == $book->genre_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select> </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div> <label>Promotion</label>
                    <div class="mt-2"> <select class="tom-select w-full" name="promotion_id">
                            @foreach ($promotions as $item)
                                @if ($item->id == $book->promotion_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->discount }}</option>
                                @else
                                    <option value="">Không giảm giá</option>
                                @endif
                            @endforeach
                        </select> </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label">Description</label>
                <input id="regular-form-1" type="text" class="form-control" name="description" placeholder="Description"
                    value="{{ $book->description }}">
            </div>
            <div class="form-group mt-2">
                <label for="regular-form-1" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price"
                    aria-describedby="input-group-price" value="{{ $book->price }}">
            </div>
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label">Quantity</label>
                <input id="regular-form-1" type="text" class="form-control" name="quantity" placeholder="Quantity"
                    value="{{ $book->quantity }}">
            </div>
            <div class="form-group mb-2">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div id="preview" class="my-2">
            </div>
            <div class="hienthi my-2" id="hienthi">
                <img src="{{ asset($book->image) }}" width="200px" alt="">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Update</button>
        </form>
    </div>
@endsection
@section('js_footer_custom')
    <script>
        // Lấy input element
        let imgInput = document.getElementById('image');
        let hienthi = document.getElementById('hienthi');
        // Lắng nghe sự kiện thay đổi
        imgInput.addEventListener('change', function() {
            // Lấy file đã chọn
            hienthi.remove();
            let file = imgInput.files[0];
            // Tạo đối tượng DOM cho img
            let img = document.createElement('img');
            // Hiển thị ảnh preview
            img.src = URL.createObjectURL(file);
            img.style.width = '200px';
            // Thêm vào div preview
            document.getElementById('preview').appendChild(img);
        });
    </script>
@endsection
