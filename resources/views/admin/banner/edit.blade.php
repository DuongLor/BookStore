@extends('admin.templates.app')
@section('title', 'Banner')
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
    <a href="{{ route('admin.banner') }}" class="btn btn-primary shadow-md mr-2 mb-3 " style="width: 200px">Back</a>
    <div class="">
        <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label>Ảnh</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div id="preview" class="my-2">
            </div>
            <div class="hienthi my-2" id="hienthi">
                <img src="{{ asset($banner->image) }}" width="200px" alt="">
            </div>
            <button type="submit" class="btn btn-primary mt-5">Add</button>
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
