@extends('layouts.app')

@section('content')

    <h1>5min-Diary</h1>
    <p>1日5分、日記を書いてみませんか？<p>
    
     {!! link_to_route('diaries.create', '日記を書く', [], ['class' => 'btn btn-primary']) !!} {{--投稿フォームリンク--}}
    
    {{--日記一覧--}}
    @include("diaries.index")
@endsection