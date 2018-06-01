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
    </body>
</html>
