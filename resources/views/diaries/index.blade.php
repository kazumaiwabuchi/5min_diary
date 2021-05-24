@extends('layouts.app')

@section('content')

 {{-- メッセージ作成ページへのリンク --}}
    <h1>日記一覧</h1>
     {!! link_to_route('diaries.create', '日記を書く', [], ['class' => 'btn btn-primary']) !!}


    @if (count($diaries) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>今日の出来事</th>
                    <th>今日の感想</th>
                    <th>明日やる事</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diaries as $diary)
                <tr>
                    <td>{!! link_to_route('diaries.show', $diary->id, ['diary' => $diary->id]) !!}</td>
                    <td>{{ $diary->today_event }}</td>
                    <td>{{ $diary->content }}</td>
                    <td>{{ $diary->tommorow_event }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection