<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
    	<h1>画像アップローダー</h1>
    	<h2>画像をアップロードする</h2>
    	@if (count($errors) > 0)
    		<p>エラーが発生しました</p>
    		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        	</ul>
    	@endif
    	@if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
		<form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post') }}
            画像ファイル<input type="file" name="file"><br>
            コメント<input type="text" name="comment"><br>
            <button type="submit">アップロード</button>
        </form>
        <h2>アップロード画像一覧</h2>

            @foreach ($images as $image)
              <div>
                <div style="margin: 10px;border: 1px solid;width:50%;">
                  <img src="{{ Storage::url($image->filename) }}"><br>
                  コメント：{{ $image->comment }}<br>
                  作成日：{{ $image->created_at }}<br>
                  更新日：{{ $image->updated_at }}<br>
                  <a href="{{ route('edit', $image) }}">編集</a>
                  <form method="post" action="{{ route('destroy', $image) }}">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit">削除</button>
                  </form>
                </div>
              </div>
            @endforeach
    </body>
</html>
