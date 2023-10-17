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
        <div class="row">
            <div class="col-md-12">
                @if($errors->has('msg_delete_post'))
                <div class="alert alert-warning border" id="notification-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>
                        Thông báo:
                    </strong>
                    {{ $errors->first('msg_delete_post') }}
                </div>
                @elseif(session('msg_update_post'))
                <div class="alert alert-warning border" id="notification-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>
                        Thông báo:
                    </strong>
                    {{ session('msg_update_post') }}
                </div>
                @elseif(session('msg_create_post'))
                <div class="alert alert-success border" id="notification-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>
                        Thông báo:
                    </strong>
                    {{ session('msg_create_post') }}
                </div>
                @elseif(session('msg_delete_success'))
                <div class="alert alert-success border" id="notification-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>
                        Thông báo:
                    </strong>
                    {{ session('msg_delete_success') }}
                </div>
                @elseif(session('msg_delete_error'))
                <div class="alert alert-danger border" id="notification-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>
                        Thông báo:
                    </strong>
                    {{ session('msg_delete_error') }}
                </div>
                @endif
            </div>
        </div>
        @foreach($posts as $items)
        <div class="box mb-4">
            @php
            $totalWords = str_word_count($items[0]->content);
            $media_url = "img_default/No-image-available.jpg";
            if (isset($items[0]->media_url)) {
            $media_url = $items[0]->media_url;
            }
            @endphp

            @if($totalWords <= 200 && isset($items[0]->media_url))
                <div class="mr-2">
                    <img class="dynamic-image" src="{{ $media_url }}" alt="" style="width: 200px; height: 100%;" />
                </div>
                @endif

                <div class="detail-box show-post m-0 p-1">
                    <a href="{{ route('personal', ['id' => $items[0]->user_id]) }}" class="mt-1 style_name">{{ $items[0]->name }}</a>
                    <p class="style_time">{{ $items[0]->created_at }}</p>
                    <p class="style_time">
                        {{ $items[0]->content }}
                    </p>

                    @php
                    $totalImgs = count($items);
                    if ($items[0]->media_url) {
                    echo '<a href="javascript:void(0)" class="text-primary show-more-image" data-post-id="'.$items[0]->id.'">Xem thêm ' .($totalImgs - 0) .' hình ảnh</a>';
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
</section>
@endsection
