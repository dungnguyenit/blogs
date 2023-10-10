<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<script src="{{ asset('js/bootstrap.js') }}"></script>\
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="create-posts">
                    @foreach($posts as $items)
                    <div class="show-posts">
                        <h5>{{$items->name}}</h5>
                        <span>{{$items->created_at}}</span><br>
                        <p>{{$items->content}}</p>
                        <img src="{{$items->media_url}}" alt="">
                        <i class="fa-solid fa-bars">
                            <ul>
                                <li><a href="">Sửa</a></li>
                                <li>
                                    <form action="{{route('delete',['id'=>$items->post_id])}}" method="post">
                                        @csrf
                                        <button type="submit">Xoá</button>
                                    </form>
                                </li>
                            </ul>
                        </i>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection