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

        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
