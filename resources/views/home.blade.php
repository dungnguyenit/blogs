<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<!-- bootstrap -->
<link rel="stylesheet" href="{{ asset('path_to_node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
<script src="{{ asset('js/bootstrap.js') }}"></script>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="create-posts">
                    <form method="POST" action="{{ route('create_posts') }}">
                        @csrf
                        <div class="box">
                            <textarea name="title" id="" cols="30" rows="10" placeholder="Nhập bài viet"></textarea>
                            <div class="box-content">
                                <div class="custom-file-upload">
                                    <!-- <div class="box-image"></div> -->
                                    <div class="box-image" id="boxImage" style="display: none;">
                                        <div class="position-relative">
                                            <img id="preview" src="" alt="Preview Image">
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
                <?php $a = [1, 2, 3] ?>
                @foreach($a as $b)
                <div class="show-posts" key={{$b}}>
                    <h5> Nguyễn Đình Dũng </h5>
                    <span>13/04/2000</span><br>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam voluptates quam in odit numquam illo? Consectetur, perferendis! Atque esse iusto suscipit tenetur mollitia explicabo officia placeat veritatis. Minus, vel dignissimos?</p>
                    <img src="" alt="hello">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/inputFile.js') }}"></script>
@endsection
