//if(count($diaries) >0)を入れていたが、$diariesがカウントできないというエラーが出たので一旦削除
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
