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
        <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label"> Prominent </label>
                <input id="regular-form-1" type="text" class="form-control" name="prominent" placeholder="Prominent">
            </div>
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label">Title</label>
                <input id="regular-form-1" type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="form-group mb-2">
                <div> <label>Author</label>
                    <div class="mt-2"> <select class="tom-select w-full" name="author_id">
                            @foreach ($authors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select> </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div> <label>Genre</label>
                    <div class="mt-2"> <select class="tom-select w-full" name="genre_id">
                            @foreach ($genres as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select> </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div> <label>Promotion</label>
                    <div class="mt-2"> <select class="tom-select w-full" name="promotion_id">
                            <option value=""></option>
                            @foreach ($promotions as $item)
                                <option value="{{ $item->id }}">{{ $item->discount }}</option>
                            @endforeach
                        </select> </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label">Description</label>
                <input id="regular-form-1" type="text" class="form-control" name="description" placeholder="Description">
            </div>
            <div class="form-group mt-2">
                <label for="regular-form-1" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price"
                    aria-describedby="input-group-price">
            </div>
            <div class="form-group mb-2">
                <label for="regular-form-1" class="form-label">Quantity</label>
                <input id="regular-form-1" type="text" class="form-control" name="quantity" placeholder="Quantity">
            </div>
            <div class="form-group mb-2">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div id="preview" class="">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Add</button>
        </form>
    </div>
@endsection
@section('js_footer_custom')
    <script>
        // Lấy input element
        let imgInput = document.getElementById('image');
        // Lắng nghe sự kiện thay đổi
        imgInput.addEventListener('change', function() {
            // Lấy file đã chọn
            let file = imgInput.files[0];
            // Tạo đối tượng DOM cho img
            let img = document.createElement('img');
            img.style.width = '200px';
            // Hiển thị ảnh preview
            img.src = URL.createObjectURL(file);
            // Thêm vào div preview
            document.getElementById('preview').appendChild(img);
        });
    </script>
@endsection
