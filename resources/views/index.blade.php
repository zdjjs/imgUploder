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
        <table>
            <tr>
                <th>画像</th>
                <th>コメント</th>
                <th>投稿日</th>
                <th>更新日</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
            @foreach ($images as $image)
                <tr>
                    <td><img src="{{ $image->filename }}" height="40%"></td>
                    <td>{{ $image->comment ?? '(コメント無し)' }}</td>
                    <td>{{ $image->created_at }}</td>
                    <td>{{ $image->updated_at }}</td>
                    <td><a href="{{ route('edit', $image) }}">編集</a></td>
                    <td>
                		<form method="post" action="{{ route('destroy', $image) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
