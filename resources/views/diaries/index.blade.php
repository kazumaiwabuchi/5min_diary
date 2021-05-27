@if (count($diaries) > 0)
        @foreach($diaries as $diary)
        <div>
            <h5>{{ $diary ->created_at }}</h5>
            <h5>「今日の出来事」</h5>
            <p>{!! nl2br(e($diary->today_event)) !!}</p>
            <h5>「今日の感想」</h5>
            <p>{!! nl2br(e($diary->content)) !!}</p>
            <h5>「明日やる事」</h5>
            <p>{!! nl2br(e($diary->tommorow_event)) !!}</p>
            <p>{!! link_to_route('diaries.show', $diary->id, ['diary' => $diary->id]) !!}</p>
            {{--"{{ }}"で囲うと、htmlspecialchars関数に通して出力される。"{!! !!}"で囲うとそのまま出力。e()はエスケープ関数で、htmlspecialcharsと同じような働きをする。xss 攻撃への対策。--}}
        </div>
        <hr>{{--<hr>だけ入れると、線を表示できる--}}
        @endforeach
                
        {{--ページネーションのリンク--}}
        {{ $diaries->links() }}
        
@endif
