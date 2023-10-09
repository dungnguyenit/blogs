<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="create-posts">
                    <form method="POST" action="">
                        @csrf
                        <div class="box">
                            <textarea name="title" id="" cols="30" rows="10" placeholder="Nhập bài viet"></textarea>
                            <div class="box-content">
                                <div class="custom-file-upload">
                                    <div class="box-image"></div>
                                    <div class="box-submit">
                                        <label for="file-upload">Tải lên tệp tin</label>
                                        <input type="file" id="file-upload" onchange="previewImage(this)" />

                                        <button type="submit" class="btn-posts">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="show-posts">
                    jụksdfiksdf
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/inputFile.js') }}"></script>
@endsection
