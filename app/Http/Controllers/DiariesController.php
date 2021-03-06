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
        $diaries = Diary::orderBy('created_at', 'desc')->paginate(6);//全投稿を降順で取得
        
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
        
        if (\Auth::check()) {
            // もし認証済みユーザなら、そのユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
            $request->user()->diaries()->create([
                "today_event" =>$request->today_event,
                'content' => $request->content,
                "tommorow_event"=>$request ->tommorow_event,
            ]);
    
            
        }
        else{
            Diary::create([
                "today_event" =>$request->today_event,
                'content' => $request->content,
                "tommorow_event"=>$request ->tommorow_event,
                ]);
        }
        //トップページにリダイレクト
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

        // 日記詳細ビューでそれを表示
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
        //idの値で投稿を検索して取得
        $diary = Diary::findOrFail($id);
        
        //閲覧者がその投稿の所有者である場合は、投稿を削除
        if(\Auth::id() === $diary->user_id){
            $diary ->delete();
        };
        //前のページへリダイレクト、しようとしたら404notfoundが出るので、一旦トップに戻すよう設定
        //return back();
        
        //トップページにリダイレクト
        return redirect('/');
    }
}
