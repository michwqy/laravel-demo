<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Mail;
use Log;
use App\emailsend\smtpmail;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginato;
use Illuminate\Pagination\LengthAwarePaginator;

class UsersController extends Controller
{
  
    public function store(Request $request)
    {   
        $this->send($request->name,$request->email);
        
        $this->validate($request, [
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6'
        ]);
  
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
 
        /*
        $time=date("ymd");
        $text=$user->email.' '.$time;
        $token=encrypt($text);

        $mailto=$user->email;  //收件人
        $subject="欢迎注册，请激活您的账号"; //邮件主题
        $body="亲爱的"  .$user->name. "：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
        <a href='http://localhost:8000/active?token="  .$token . "' target='_blank'>'http://localhost：8000/active.php?token="  .$token . "'</a>
        <br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/>";  //邮件内容
        $this->sendmailto($mailto,$subject,$body);
        */

        session()->flash('message','请先去邮箱激活账号');
        return redirect()->route('login');
        

       
    }

    public function show(Request $request)
    {
        
        if(Auth::check()){
        
        $user=Auth::user();
        $users = DB::select('select * from users where email = ?', [$user->email]);
        $user=$users[0];

        $articles=DB::table('articles')->orderBy('id', 'desc')->paginate(10);
        $key='id';
        $status= 0;
        return view('users',compact('user','articles','status','key'));
        }
        else{
            return redirect()->route('login');
        }
      
    }

    public function register(User $user)
    {
        return view('register');
    }

    function sendmailto($mailto, $mailsub, $mailbd){
        $smtpserver     = "smtp.163.com"; //SMTP服务器
        $smtpserverport = 25; //SMTP服务器端口
        $smtpusermail   = "michwqy@163.com"; //SMTP服务器的用户邮箱
        $smtpemailto    = $mailto;
        $smtpuser       = "michwqy@163.com"; //SMTP服务器的用户帐号
        $smtppass       = "abc123"; //SMTP服务器的用户密码
        $mailsubject    = $mailsub; //邮件主题
        $mailsubject    = "=?UTF-8?B?" . base64_encode($mailsubject) . "?="; //防止乱码
        $mailbody       = $mailbd; //邮件内容
        //$mailbody = "=?UTF-8?B?".base64_encode($mailbody)."?="; //防止乱码
        $mailtype       = "HTML"; //邮件格式（HTML/TXT）,TXT为文本邮件. 139邮箱的短信提醒要设置为HTML才正常
        ##########################################
        $f=new smtpmail;
        $f->mysmtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $f->debug    = false; //是否显示发送的调试信息
        $f->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
    }

    function send($name,$email)  
    {   
        $time=date("ymd");
        $text=$email.'|'.$time;
        $token=encrypt($text);
        $url=url("/active")."?token=".$token;
        $flag = Mail::send('emails.activeemail',['name'=>$name,'url'=>$url],function($message) use($email){  
            $to = $email;  
            $message ->to($to)->subject('请激活账号');  
        });  
        
    } 

    public function active(Request $request){
        $token=$request->token;
        $text=decrypt($token);
        $texts=explode('|', $text);
        //$texts=explode(' ', $token);
        $email=$texts[0];
        $time=$texts[1];
        $nowtime=date("ymd");
        if((intval($nowtime)-intval($time))<1){
            $affected = DB::update('update users set status = 1 where email = ?', [$email]);
            if($affected==1){
                session()->flash('message','激活成功');
                return redirect()->route('login');
            }
            else{
                return redirect()->route('login');
            }
        }
        
    }
    
}

?>