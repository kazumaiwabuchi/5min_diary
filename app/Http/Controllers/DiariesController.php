<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Diary;

class DiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaries = Diary::all();//投稿を全て取得
        
        return view('welcome', [ //投稿をindex.blade.phpで一覧表示
            'diaries' => $diaries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diary = new Diary;

        // メッセージ作成ビューを表示
        return view('diaries.create', [
            'diary' => $diary,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // バリデーション
        $request->validate([
            'today_event' => 'required|max:255',
            'content' => 'required|max:500',
            'tommorow_event' => 'required|max:255',
        ]);
        
        //日記を作成
        $diary = new Diary;
        $diary->today_event = $request->today_event;    
        $diary->content = $request->content;
        $diary->tommorow_event = $request->tommorow_event;
        $diary->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // idの値でメッセージを検索して取得
        $diary = Diary::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('diaries.show', [
            'diary' => $diary,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
