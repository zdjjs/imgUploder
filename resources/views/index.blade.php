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
		<form method="post" action="{{ route('store') }}">
            {{ csrf_field() }}
            {{ method_field('post') }}
            <button type="submit">アップロード</button>
        </form>
    </body>
</html>
