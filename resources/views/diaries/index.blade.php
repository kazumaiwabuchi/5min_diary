@extends('layouts.app')

@section('content')

    <h1>日記一覧</h1>

    @if (count($diaries) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>今日の出来事</th>
                    <th>今日の感想</th>
                    <th>明日やる事</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diaries as $diary)
                <tr>
                    <td>{{ $diary->today_event }}</td>
                    <td>{{ $diary->content }}</td>
                    <td>{{ $diary->tommorow_event }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection