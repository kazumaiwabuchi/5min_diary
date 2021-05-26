<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;//Userモデルの名前空間、これを指定しないとエラー出るので注意

class UsersController extends Controller
{
    public function show($id)
    {
        
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
         // ユーザの日記一覧を作成日時の降順で取得
        $diaries = $user->diaries()->orderBy('created_at', 'desc')->paginate(10);//->get() を追記することで、データを配列として取得できるのでblade側でforeachを回せる。（これが無いとforeachを回せず正常動作しない）
        

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            "diaries"=>$diaries,
        ]);
    }
}
