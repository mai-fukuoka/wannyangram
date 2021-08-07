@extends('layouts.app')
@section('content')

<div class="panel-body">
<div class="d-flex flex-column align-items-center mt-3">
  <div class="col-xl-7 col-lg-8 col-md-10 col-sm-11 post-card">
    <div class="card">
      <div class="card-header">
        投稿画面
      </div>
      <div class="card-body">
          <div class="form-group">
            <form action="/posts" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="file">
                 <button type="submit">投稿する</button>
            </form>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#post_image').bind('change', function() {
    var size_in_megabytes = this.files[0].size/1024/1024;
    if (size_in_megabytes > 1) {
      alert('ファイルサイズの最大は1MBまでです。違う画像を選んでください。');
    }
  });
</script>

@endsection