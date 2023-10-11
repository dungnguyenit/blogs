<form action="{{ route('post.update', ['id' => $post->id]) }}" method="post">
    @csrf
    <label for="title">Tiêu đề:</label>
    <input type="text" id="title" name="title" value="{{ $post->title }}">

    <label for="content">Nội dung:</label>
    <textarea id="content" name="content">{{ $post->content }}</textarea>

    <button type="submit">Cập nhật</button>
</form>
