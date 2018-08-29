<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginato;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller
{
    public function articleview(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
            $articles=DB::table('articles')->orderBy('id', 'desc')->paginate(10);
            $key='id';
            $status=2;
        return view('users',compact('user','articles','status','key'));
            }
        else{
            return redirect()->route('login');
            }
       
    }

    public function articlenew(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
            $status=4;
        return view('users',compact('user','status'));
            }
        else{
            return redirect()->route('login');
            }
    }

    public function articledetail(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
            $articles= DB::select('select * from articles where id = ?', [$request->key]);
            $article=$articles[0];
            $status=3;
        return view('users',compact('user','articles','status'));
            }
        else{
            return redirect()->route('login');
            }
       
    }

    
}
