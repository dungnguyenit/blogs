<!-- <link rel="stylesheet" href="{{asset('css/styles.css')}}"> -->
<link rel="stylesheet" href="{{asset('css/personalStyle.css')}}">
<link rel="stylesheet" href="{{asset('css/reponsive.css')}}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.scss') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<!-- fonts awesome style -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
<!-- fonts style -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap" rel="stylesheet" />

<!-- bootstrap -->

@extends('layouts.app')
@section('content')
    <!-- <section class="service_section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/service1.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby Milk
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/service2.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby Clothes
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/service3.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/service4.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h4>
                                Baby Walk
                            </h4>
                            <p>
                                available, but the majority have suffered alteration in some form, by injected
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- <section class="about_section layout_padding">
    <div class="container-fluid">
        @foreach($posts as $items)
        <div class="box">
            <div class="img-box">
                <img src="images/about-img.jpg" alt="" />
            </div>
            <div class="detail-box show-post">
                <h2>{{$items->name}}</h2>
                <p>{{$items->created_at}}</p>
                <p>
                    {{$items->content}}
                </p>

                <a href="">
                    <span>
                        Read More
                    </span>
                    <hr />
                </a>
                <i class="fa-solid fa-bars">
                    <ul>
                        <li>
                            <a href="{{route('edit',['id'=>$items->post_id])}}">Sửa</a>
                        </li>
                        <li>
                            <form action="{{route('delete',['id'=>$items->post_id])}}" method="post">
                                @csrf
                                <button type="submit">Xoá</button>
                            </form>
                        </li>
                    </ul>
                </i>
            </div>
        </div>
        @endforeach
    </div>
</section> -->
<section class="about_section layout_padding">
    <div class="container-fluid">
        @foreach($posts as $items)
        <div class="box">
            @if (!empty($items->image_url))
            <div class="img-box">
                <img src="{{$items->image_url}}" alt="" />
            </div>
            @endif
            <div class="detail-box show-post @if (empty($items->image_url)) full-width @endif">
                <h2>{{$items->name}}</h2>
                <p>{{$items->created_at}}</p>
                <p>
                    {{$items->content}}
                </p>
                <div style="display: flex;align-items: flex-end;gap: 10px;">
                    <a href="{{route('edit',['id'=>$items->post_id])}}">Sửa</a>
                    <form action="{{route('delete',['id'=>$items->post_id])}}" method="post" style="margin: 0px;padding: 0px;">
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

<section class="why_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Why Choose Us
            </h2>
            <p>
                words which don't look even slightly believable. If you are going to use a passage m
            </p>
        </div>
        <div class="why_container">
            <div class="box">
                <div class="img-box">
                    <img src="images/why1.png" alt="" />
                </div>
                <div class="detail-box">
                    <h5>
                        We have Medical Care For Baby
                    </h5>
                    <a href="">
                        <span>
                            Read More
                        </span>
                        <hr />
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/why2.png" alt="" />
                </div>
                <div class="detail-box">
                    <h5>
                        We have Good Babysitter
                    </h5>
                    <a href="">
                        <span>
                            Read More
                        </span>
                        <hr />
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/why3.png" alt="" />
                </div>
                <div class="detail-box">
                    <h5>
                        We have Security for Baby
                    </h5>
                    <a href="">
                        <span>
                            Read More
                        </span>
                        <hr />
                    </a>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="images/why4.png" alt="" />
                </div>
                <div class="detail-box">
                    <h5>
                        Successful
                    </h5>
                    <a href="">
                        <span>
                            Read More
                        </span>
                        <hr />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Testimonial
            </h2>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="box">
                        <div class="img-box">
                            <img src="https://www.kkday.com/vi/blog/wp-content/uploads/chup-anh-dep-bang-dien-thoai-25.jpg" alt="" />
                        </div>
                        <div class="client_detail">
                            <div class="client_name">
                                <div class="client_info">
                                    <h4>
                                        Roocky Rom
                                    </h4>
                                    <span>
                                        Parante
                                    </span>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/client.jpg" alt="" />
                        </div>
                        <div class="client_detail">
                            <div class="client_name">
                                <div class="client_info">
                                    <h4>
                                        Roocky Rom
                                    </h4>
                                    <span>
                                        Parante
                                    </span>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/client.jpg" alt="" />
                        </div>
                        <div class="client_detail">
                            <div class="client_name">
                                <div class="client_info">
                                    <h4>
                                        Roocky Rom
                                    </h4>
                                    <span>
                                        Parante
                                    </span>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        </div>
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
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/bootstrap4.js') }}"></script>
@endsection
