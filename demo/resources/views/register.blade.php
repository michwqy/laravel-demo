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

</style>
@stop
@section('content')

      <form method="POST" action="{{ route('users.store') }}">
          {{ csrf_field() }}
      <div class="loginBox">
          <div class="loginBoxCenter">
          <div class="form-group">
            <p><label for="name">名字：</label></p>
            <p><input type="text" name="name" class="loginInput" value="{{ old('name') }}" required></p>
          </div>

          <div class="form-group">
            <p><label for="email">邮箱：</label></p>
            <p><input type="text" name="email" class="loginInput" value="{{ old('email') }}" required></p>
          </div>

          <div class="form-group">
            <p><label for="password">密码：</label></p>
            <p><input type="password" name="password" class="loginInput" value="{{ old('password') }}" required></p>
          </div>
          
          @if(count($errors) > 0)
          <div class="info">
          <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
          </ul>
          </div>
          @endif 

      </div>
          <div class="loginBoxButtons">

          <button type="submit" class="loginBtn">注册</button>
            <a href="{{ route('welcome') }}">
                <p class="loginBtn" >返回</p>
            </a>
          </div>
         
      </div>
      </form>


            
@stop