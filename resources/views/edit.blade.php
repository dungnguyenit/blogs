<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($posts as $items)
                <div class="create-posts">
                    <form method="POST" action="{{ route('update',['id'=>$items->post_id]) }}" >
                        @csrf
                        <div class=" box">
                        <textarea name="title" id="" cols="30" rows="10">{{$items->content}}</textarea>
                        <div class="box-content">
                            <div class="custom-file-upload">
                                <div class="box-image" id="boxImage" style="display: none;">
                                    <div class="position-relative">
                                        <img id="preview" src="{{$items->media_url}}" alt="Preview Image">
                                        <button type="button" class="btn btn-danger btn-sm delete-button" onclick="deleteImage()">
                                            X
                                        </button>
                                    </div>
                                </div>
                                <div class="box-submit">
                                    <label for="file-upload">Tải lên tệp tin</label>
                                    <input type="file" id="file-upload" name="file" onchange="previewImage(this)" />
                                    <button type="submit" class="btn-posts">Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<script>
    // function previewImage(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function () {
//             var image = new Image();
//             image.src = reader.result;
//             $(".box-image").append(image);
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }

function previewImage(input) {
    var boxImage = document.getElementById("boxImage");
    var preview = document.getElementById("preview");

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            boxImage.style.display = "block"; // Hiển thị boxImage khi có ảnh
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function deleteImage() {
    var boxImage = document.getElementById("boxImage");
    var preview = document.getElementById("preview");
    var fileUpload = document.getElementById("file-upload");

    preview.src = "";
    fileUpload.value = ""; // Xóa giá trị file đã chọn
    boxImage.style.display = "none"; // Ẩn boxImage khi xóa ảnh
}

// ------------------
var menu = document.querySelector(".menu"); // Using a class instead, see note below.
menu.classList.toggle("hidden-phone");

</script>

<!-- <script src="{{ asset('js/inputFile.js') }}"></script> -->
@endsection
