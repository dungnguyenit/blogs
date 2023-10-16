{{--<link rel="stylesheet" href="{{asset('css/styles.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('css/personalStyle.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('css/reponsive.css')}}">--}}
{{--<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">--}}
{{--<link rel="stylesheet" href="{{ asset('css/style.scss') }}">--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}



<!-- bootstrap core css -->
{{--<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />--}}
<!-- fonts awesome style -->
{{--<link href="css/font-awesome.min.css" rel="stylesheet" />--}}
<!-- fonts style -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap" rel="stylesheet" />

<!-- bootstrap -->

@extends('layouts.app')
@section('content')
<section class="about_section layout_padding">
    <div class="container-fluid">
        @foreach($posts as $items)
        <div class="box">
            @if (count($items->medias) > 0)
            <div class="img-box">
                @foreach($items->medias as $m)
                <img src="{{$m->media_url}}" alt="" width="150px" height="150px" />

                @endforeach
            </div>
            @endif
            <div class="detail-box show-post m-0 mb-2">
                <h2>{{$userInfo->name}}</h2>
                <p>{{$items->created_at}}</p>
                <p>
                    {{$items->content}}
                </p>
                <div style="display: flex;align-items: flex-end;gap: 10px;">
                    <a href="{{route('edit',['id'=>$items->id])}}">Sửa</a>
                    <form action="{{route('delete',['id'=>$items->id])}}" method="post" style="margin: 0px;padding: 0px;">
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

<script src="{{ asset('js/bootstrap.js') }}"></script>
{{--<script src="js/jquery-3.4.1.min.js"></script>--}}

{{--<script src="{{ asset('js/custom.js') }}"></script>--}}
{{--<script src="{{ asset('js/bootstrap4.js') }}"></script>--}}
@endsection
