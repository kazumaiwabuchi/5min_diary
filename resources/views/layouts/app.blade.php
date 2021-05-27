<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>5min-Diary</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
         <link rel="stylesheet" href="{{ asset('css/style.css') }}">{{--スタイルシートを適用できる--}}
    </head>

    <body style="padding-top: 5rem">{{--ナビゲーションバーと被らないよう、上に余白を設ける--}}

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')
            
            

            @yield('content')
        </div>
        
        

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>