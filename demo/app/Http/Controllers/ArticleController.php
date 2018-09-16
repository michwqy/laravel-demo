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
            if($request->key){
                $articles=DB::table('articles')->orderBy($request->key, 'desc')->paginate(10);
                $key=$request->key;
                }
            else{
                $articles=DB::table('articles')->orderBy('id', 'desc')->paginate(10);
            $key='id';
                }
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
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
        return view('users',compact('user','article','status'));
            }
        else{
            return redirect()->route('login');
            }
       
    }

    public function articleinsert(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];

            date_default_timezone_set('Asia/Shanghai');
            $bool=DB::table('articles')->insert([
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'author'=>$request->author,
            'title'=>$request->title,
            'content'=>$request->content,
            ]);
            return redirect()->route('articleview');
            }
        else{
            return redirect()->route('login');
            }
    }

    public function articleedit(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
            $articles= DB::select('select * from articles where id = ?', [$request->key]);
            $article=$articles[0];
            if($user->type==1 || ($article->author==$user->name)){
                $status=5;
                return view('users',compact('user','article','status'));
            }
            else{
                session()->flash('message','抱歉，您没有权限');
                return redirect()->route('articleview');
            }
            }
        else{
            return redirect()->route('login');
            }
    }

    public function articleupdate(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];

            date_default_timezone_set('Asia/Shanghai');
            $bool=DB::table('articles')->where('id',$request->key)
            ->update([
            'updated_at'=>date("Y-m-d H:i:s"),
            'author'=>$request->author,
            'title'=>$request->title,
            'content'=>$request->content,
            ]);
            $key=$request->key;
            return redirect('articledetail?key='.$key);
            }
        else{
            return redirect()->route('login');
            }
    }

    public function articledelete(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            if($user->type==1 || ($request->author==$user->name)){
                $users = DB::select('select * from users where email = ?', [$user->email]);
                $user=$users[0];
                $num = DB::table('articles')->where('id',$request->key)->delete();
                return redirect()->route('articleview');
            }
            else{
                session()->flash('message','抱歉，您没有权限');
                return redirect()->route('users.show');
            }
            
        }
        else{
            return redirect()->route('login');
            }
    }

    
}
