    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @extends('layouts.app')
    @section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="create-posts">
                        <form method="POST" action="{{ route('create_posts') }}" enctype="multipart/form-data">
                            @csrf
                            <div class=" box">

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
                    @foreach($posts as $items)
                    <div class="show-posts">
                        <a href="{{route('personal',['id'=>$items->id])}}">{{$items->name}}</a>
                        <span>{{$items->created_at}}</span><br>
                        <p>{{$items->content}}</p>
                        <img src="{{$items->media_url}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="{{ asset('js/inputFile.js') }}"></script> -->
    @endsection