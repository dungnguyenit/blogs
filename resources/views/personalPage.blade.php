<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap" rel="stylesheet" />

<!-- bootstrap -->

@extends('layouts.app')
@section('content')
<section class="about_section layout_padding">
    <div class="container-fluid pl-0">
        @foreach($posts as $items)
        <div class="box mb-2">
            @if(isset($items[0]->media_url))
            <div class="mr-2">
                @php
                $media_url = "img_default/No-image-available.jpg";
                if (isset($items[0]->media_url)) {
                $media_url = $items[0]->media_url;
                }
                @endphp
                <img class="dynamic-image" src="{{ $media_url  }}" alt="" style="width: 200px; height: 100%;" />
            </div>
            @endif
            <div class="detail-box show-post m-0 p-1">
                <a href="{{route('personal',['id'=>$items[0]->user_id])}}" class="mt-1">Đăng bởi: {{$items[0]->name}}</a>
                <p class="text-white">{{$items[0]->created_at}}</p>
                <p class="text-white">
                    {{$items[0]->content}}
                </p>
                <div style="display: flex;align-items: flex-end;gap: 10px;">

                    <a href="{{route('edit',['id'=>$items[0]->id])}}" class="">Sửa</a>

                    <form action="{{route('delete',['id'=>$items[0]->id])}}" method="post" style="margin: 0px;padding: 0px;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Xoá</button>
                    </form>
                </div>
                <a href="">
                    <span>
                        Read more
                    </span>
                </a>
                @php
                $totalImgs = count($items);
                if ($totalImgs > 1) {
                echo '<a href="javascript:void(0)" class="text-primary show-more-image" data-post-id="'.$items[0]->id.'">Xem thêm ' .($totalImgs - 1) .' hình ảnh</a>';
                }
                @endphp
            </div>
        </div>
        @endforeach
    </div>
</section>


<section class="info_section layout_padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="info_contact">
                    <h5>
                        Address
                    </h5>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Location
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call +01 1234567890
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                demo@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
                <div class="info_social">
                    <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                    <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info_link_box">
                    <h5>
                        Navigation
                    </h5>
                    <div class="info_links">
                        <a class="active" href="index.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                        <a class="" href="about.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> About</a>
                        <a class="" href="why.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> Why Us </a>
                        <a class="" href="team.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> Our Team</a>
                        <a class="" href="testimonial.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> Testimonial</a>
                        <a class="" href="contact.html"> <i class="fa fa-angle-right" aria-hidden="true"></i> Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>
                    Newsletter
                </h5>
                <form action="">
                    <input type="text" placeholder="Enter Your email" />
                    <button type="submit">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer_section container-fluid">
    <p>
        &copy; <span id="displayYear"></span> All Rights Reserved.
    </p>
</footer>
<div id="show-list-images" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Danh sách hình ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="list-images">
                    <div class="row ">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Send message</button>--}}
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.js') }}"></script>
{{--<script src="js/jquery-3.4.1.min.js"></script>--}}

{{--<script src="{{ asset('js/custom.js') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap4.js') }}"></script>--}}
@endsection
