@extends('layouts.app')

@section('content')

    <h1>日記を書く</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($diary, ['route' => 'diaries.store']) !!}
                <div class="form-group">
                    {!! Form::label('today_event', '今日の出来事:') !!}
                    {!! Form::textarea('today_event', null, ['class' => 'form-control','placeholder' => '255文字以内',"rows"=>"3","maxlength"=>"255"]) !!}{{--'placeholder'で、テキストエリア内に薄い文字を入れられる--}}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '今日の感想:') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control','placeholder' => '500文字以内',"maxlength"=>"500"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tommorow_event', '明日やる事:') !!}
                    {!! Form::textarea('tommorow_event', null, ['class' => 'form-control','placeholder' => '255文字以内',"rows"=>"3","maxlength"=>"255"]) !!}
                </div>
                {!! Form::submit("投稿する", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection