@extends('layouts.default')
@section('css')
<style>
        body{
           background-color:#F8F8F8;
        }
        .loginBox {
            background-color: white;
            border: 1px solid #F0F0F0;
            border-radius: 5px;
            font-size: 14px ;
            margin: 10% auto;
            width: 350px;     
        }
        
        .loginBoxCenter {
            border-bottom: 1px solid #F0F0F0;
            padding: 25px 35px 0px 35px;
        }
        
        .loginBoxCenter p {
            margin-bottom: 10px
        }
        
        .loginBoxButtons {
            flex-direction:column;
            display: flex;
            align-items:center;
            border-top: 0px solid #FFF;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
            line-height: 28px;
            overflow: hidden;
            padding: 10px 0px;
        }
        
         .loginInput {
            border: 1px solid #F0F0F0;
            border-radius: 2px;
            color: #444;
            font-size: 12px ;
            padding: 8px 14px;
            margin-bottom: 8px;
            width: 252px;
        }
        
         .loginInput:FOCUS {
            border: 1px solid #F0F0F0;
        }
        
         .loginBtn {
            width:280px;
            background-color:#F0F0F0;
            border: 1px solid #F0F0F0;
            border-radius: 5px;
            color:gray;
            cursor: pointer;
            float: right;
            font: bold 13px Arial;
            text-align:center;
            padding: 10px 0 ;
            margin: 10px 0;
            
        }

         .loginBtn:HOVER {
            background-color:#E8E8E8;
         }

         .checkbox{
            padding-bottom:10px;
            font-size: 11px;
         }

    .alert{
     position:absolute;
     background-color: #1496bb;
     color:white;
     font-weight: bold;
     width:200px;
     height: 45px;
     text-align: center;
     top:0px;
     left:43%;
     box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
   }

   .alerttext{
     margin-top:10px;
   }


</style>
@stop
@section('js')
<script>
    function hide(){
           var box=document.getElementById("alertbox");
           //box.style.display="none"; 
           box.style.transition='height 500ms';
           box.style.overflow='hidden';
           box.style.height='0';
           box.style.border='none';
           }
          setTimeout("hide()",2000);
</script>
@stop
@section('content')
@if (Session::has('message'))                                             
    <div id="alertbox" class="alert">                
      <p class="alerttext">{{Session::get('message')}}</p>                            
    </div>
@endif
<form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

            <div class="loginBox">
                <div class="loginBoxCenter">
                    <div>
                    <p><label for="email">邮箱：</label></p>
                    <p><input type="text" id="email" name="email" class="loginInput"  placeholder="请输入邮箱" value="{{ old('email') }}" required/></p>
                    <p><label for="password">密码：</label></p>
                    <p><input type="password" id="password" name="password" class="loginInput"  placeholder="请输入密码" value="{{ old('password') }}" required /></p>
                    <div class="checkbox">
                       <label class"check"><input type="checkbox" name="remember"> 记住我</label>
                    </div>
                    </div>
                    
                    @if (Session::has('danger'))   
                    <div  id= "alertbox" class="alert">                               
                    <p class="alerttext">                                          
                       {{Session::get('danger')}}                                   
                    </p>
                    </div>
                    @endif
                    
                </div>
                <div class="loginBoxButtons">
                    
                    <div>
                    <a>
                    <button class="loginBtn" >登录</button>
                    </a>
                    </div>
                    <div>
                        <a href="{{ route('welcome') }}">
                            <p class="loginBtn" >返回</p>
                        </a>
                    </div>
                 </div>
            </div>
</form>
      



@stop