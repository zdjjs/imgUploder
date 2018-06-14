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
    	<h2>コメントを編集</h2>
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
    	<form method="post" action="{{ route('update', $image) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <img src="{{ Storage::url($image->filename) }}"><br>
            コメント<input type="text" name="comment" value="{{ $image->comment ?? ''}}"><br>
            <button type="submit">編集</button>
        </form>
        <hr>
        <a href="{{ route('index') }}">一覧に戻る</a>
    </body>
</html>
