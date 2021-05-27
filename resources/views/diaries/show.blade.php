  
@extends('layouts.app')

@section('content')


        <div>
            <h6 class="text-right">投稿日時:{{ $diary ->created_at }}</h6>
            <h6>「今日の出来事」</h6>
            <p>{!! nl2br(e($diary->today_event)) !!}</p>
            <h6>「今日の感想」</h6>
            <p>{!! nl2br(e($diary->content)) !!}</p>
            <h6>「明日やる事」</h6>
            <p>{!! nl2br(e($diary->tommorow_event)) !!}</p>
            {{--"{{ }}"で囲うと、htmlspecialchars関数に通して出力される。"{!! !!}"で囲うとそのまま出力。e()はエスケープ関数で、htmlspecialcharsと同じような働きをする。xss 攻撃への対策。--}}
        </div>
    
    <div>
        @if ($diary->user_id != null && Auth::id() == $diary->user_id){{--この投稿のuser_idがnullじゃない且つ、閲覧者がこの投稿の所有者の場合は、削除ボタンを表示--}}
            {{-- 投稿削除ボタンのフォーム --}}
            {!! Form::open(['route' => ['diaries.destroy', $diary->id], 'method' => 'delete']) !!}
                {!! Form::submit('日記を削除する', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        @endif
    </div>

@endsection