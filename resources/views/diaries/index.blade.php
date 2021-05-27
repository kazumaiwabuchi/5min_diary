<hr>
@if (count($diaries) > 0)
        @foreach($diaries as $diary)
        <div>
            <h6 class="text-right">投稿日時:{{ $diary ->created_at }}</h6>
            <h6 >「今日の出来事」</h6>
            <p >{!! nl2br(e($diary->today_event)) !!}</p>
            <h6 >「今日の感想」</h6>
            <p >{!! nl2br(e($diary->content)) !!}</p>
            <h6 >「明日やる事」</h6>
            <p >{!! nl2br(e($diary->tommorow_event)) !!}</p>
            <p>{!! link_to_route('diaries.show', "詳細", ['diary' => $diary->id],['class' => 'btn btn-info']) !!}</p>
            {{--"{{ }}"で囲うと、htmlspecialchars関数に通して出力される。"{!! !!}"で囲うとそのまま出力。e()はエスケープ関数で、htmlspecialcharsと同じような働きをする。xss 攻撃への対策。--}}
        </div>
        <hr>{{--<hr>だけ入れると、線を表示できる--}}
        @endforeach
                
        {{--ページネーションのリンク--}}
        {{ $diaries->links() }}
        
@endif
