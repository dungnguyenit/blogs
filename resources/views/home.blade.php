<link rel="stylesheet" href="{{asset('css/personalStyle.css')}}">
<link rel="stylesheet" href="{{asset('css/reponsive.css')}}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.scss') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />



@extends('layouts.app')
@section('content')

<section class="about_section layout_padding">
    <div class="create-posts">
        <form method="POST" action="{{ route('create_posts') }}" enctype="multipart/form-data">
            @csrf
            <div class=" box-header">
                <textarea name="title" id="" cols="30" rows="10" placeholder="Nhập bài viết"></textarea>
                <div class="box-content">
                    <div class="box-submit">
                        <!-- <label for="file-upload">Tải lên tệp tin</label> -->
                        <input type="file" id="file-upload" name="file[]" multiple />
                        <button type="submit" class="btn-posts">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        @foreach($posts as $items)

        <div class="box">
            @if(isset($items[0]->media_url))
            <div class="img-box">
                @foreach($items as $p)
                <img class="dynamic-image" src="{{$p->media_url}}" alt="" />
                @endforeach
            </div>
            @endif

            <div class="detail-box show-post ">
                <a href="{{route('personal',['id'=>$items[0]->user_id])}}">{{$items[0]->name}}</a>
                <p>{{$items[0]->created_at}}</p>
                <p>
                    {{$items[0]->content}}
                </p>
                <div style="display: flex;align-items: flex-end;gap: 10px;">

                    <a href="{{route('edit',['id'=>$items[0]->id])}}">Sửa</a>

                    <form action="{{route('delete',['id'=>$items[0]->id])}}" method="post" style="margin: 0px;padding: 0px;">
                        @csrf
                        <button type="submit">Xoá</button>
                    </form>
                </div>
                <a href="">
                    <span>
                        Read More
                    </span>
                    <hr />
                </a>

            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap4.js') }}"></script>
