@extends('layouts.app')

@section('content')

    <h1>日記を書く</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($diary, ['route' => 'diaries.store']) !!}
                <div class="form-group">
                    {!! Form::label('today_event', '今日の出来事:') !!}
                    {!! Form::text('today_event', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '今日の感想:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tommorow_event', '明日やる事:') !!}
                    {!! Form::text('tommorow_event', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit("投稿する", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection