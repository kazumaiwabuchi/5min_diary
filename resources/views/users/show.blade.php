@extends("layouts.app")

@section("content")
<h1>MyPage</h1>
     {!! link_to_route('diaries.create', '日記を書く', [], ['class' => 'btn btn-primary']) !!} {{--投稿フォームリンク--}}

@endsection