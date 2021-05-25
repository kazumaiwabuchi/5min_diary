  
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

@endsection