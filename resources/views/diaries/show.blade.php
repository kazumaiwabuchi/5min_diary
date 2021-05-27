  
@extends('layouts.app')

@section('content')


    <table class="table table-bordered">
        <tr>
            <th>今日の出来事</th>
            <td>{{ $diary->today_event }}</td>
        </tr>
        <tr>
            <th>今日の感想</th>
            <td>{{ $diary->content }}</td>
        </tr>
        <tr>
            <th>明日やる事</th>
            <td>{{ $diary->tommorow_event }}</td>
        </tr>
        <tr>
            <th>投稿日時</th>
            <td>{{ $diary->created_at }}</td>
        </tr>
    </table>
    
    <div>
        @if ($diary->user_id != null && Auth::id() == $diary->user_id){{--この投稿のuser_idがnullじゃない且つ、閲覧者がこの投稿の所有者の場合は、削除ボタンを表示--}}
            {{-- 投稿削除ボタンのフォーム --}}
            {!! Form::open(['route' => ['diaries.destroy', $diary->id], 'method' => 'delete']) !!}
                {!! Form::submit('日記を削除する', ['class' => 'btn btn-danger btn-sm']) !!}
            {!! Form::close() !!}
        @endif
    </div>

@endsection