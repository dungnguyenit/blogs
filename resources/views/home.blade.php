@extends('layouts.app')
@section('content')

<section class="about_section layout_padding">
    <div class="create-posts">
        <form method="POST" action="{{ route('create_posts') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-header ml-0">
                <textarea name="title" id="" cols="30" rows="10" placeholder="Nhập bài viết"></textarea>
            </div>
            <div class="box-content mt-2">
                <div class="box-submit">
                    <input type="file" id="fileInput" name="uploadFiles[]" multiple style="display: none;" onchange="handleFiles()">
                    <label for="fileInput" class="btn border m-0">Tải lên tệp tin</label>
                    <button type="submit" class="btn btn-posts">Submit</button>
                </div>
            </div>
        </form>
        <div class="mt-2 text-dark">
            <span>File đã chọn: <span id="selectedFileCount">0</span></span>
        </div>
        <div id="fileList" class="text-dark"></div>
    </div>
    <div class="container-fluid pl-0">
        @foreach($posts as $items)
        <div class="box mb-2">
            <div class="mr-2">
                @php
                $media_url = "img_default/No-image-available.jpg";
                if (isset($items[0]->media_url)) {
                $media_url = $items[0]->media_url;
                }
                @endphp
                <img class="dynamic-image" src="{{ $media_url  }}" alt="" style="width: 200px; height: 100%;" />
            </div>
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
                        <div class="row">
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
</section>
@endsection
