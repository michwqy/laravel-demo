<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class InfoController extends Controller
{
    public function userview(Request $request)
    {
       
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
    
            $status=1;
            return view('users',compact('user','status'));
            }
        else{
            return redirect()->route('login');
            }
    }

    public function infoinsert(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];

            date_default_timezone_set('Asia/Shanghai');
            $bool=DB::table('info')->insert([
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'type'=> $request->type,
            'name'=> $request->name,
            'email'=> $request->email,
            'connection'=> $request->connection,
            'placetype'=>$request->placetype,
            'scale'=> $request->scale,
            'facility'=> $request->facility,
            'location'=> $request->location,
            'organization'=> $request->organization,
            'field'=> $request->field,
            'position'=>$request->position,
            'need'=> $request->need,
            ]);
            return redirect()->route('infoview');
            }
        else{
            return redirect()->route('login');
            }
    }

    public function infonew(Request $request)
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

    public function infodetail(Request $request)
    {   
        if(Auth::check()){

            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
           
            $infos= DB::select('select * from info where name = ?', [$request->key]);
            $info=$infos[0];
      
            $status=3;
            $flag=false;
           return view('users',compact('user','info','status','flag'));
          } 
     
        else{
            return redirect()->route('login');
            }  
    }

    public function infoview(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
            if($request->key){
            $infos=DB::table('info')->orderBy($request->key, 'asc')->paginate(10);
            $key=$request->key;
            }
            else{
            $infos=DB::table('info')->orderBy('id', 'desc')->paginate(10);
            $key='id';
            }
            $status=2;
        return view('users',compact('user','infos','status','key'));
            }
        else{
            return redirect()->route('login');
            }
       
    }

    public function infoedit(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];
           
            $infos= DB::select('select * from info where name = ?', [$request->key]);
            $info=$infos[0];
      
            $status=3;
            $flag=true;
           return view('users',compact('user','info','status','flag'));
            }
        else{
            return redirect()->route('login');
            }
       
    }

    public function infoupdate(Request $request)
    { 
        if(Auth::check()){
            $user=Auth::user();
            $users = DB::select('select * from users where email = ?', [$user->email]);
            $user=$users[0];

            date_default_timezone_set('Asia/Shanghai');
            $num = DB::table('info')
            ->where('name', $request->name)
            ->update(['type' =>$request->type,
                  'updated_at'=>date("Y-m-d H:i:s"),
                  'email' =>$request->email,
                  'connection'=>$request->connection,
                  'placetype'=>$request->placetype,
                  'scale'=>$request->scale,
                  'facility'=>$request->facility,
                  'location'=>$request->location,
                  'organization'=>$request->organization,
                  'field'=>$request->field,
                  'position'=>$request->position,
                  'need'=>$request->need
                 ]);

            $infos= DB::select('select * from info where name = ?', [$request->name]);
            $info=$infos[0];
           
            $status=3;
            $flag=false;
            return view('users',compact('user','info','status','flag'));
        }
        else{
            return redirect()->route('login');
            }
        
    }


    public function infodelete(Request $request)
    {
        if(Auth::check()){
            $user=Auth::user();
            if($user->type==1){
                
                $users = DB::select('select * from users where email = ?', [$user->email]);
                $user=$users[0];

                $num = DB::table('info')->where('name',$request->key)->delete();

                $infos=DB::table('info')->paginate(10);
                $status=2;
                return redirect()->route('users.show');
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
