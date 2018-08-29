@extends('layouts.default')
@section('css')
<style>
   body{
      background-color:#F8F8F8;
   }
   .title{
      width:500px;
      margin:30vh auto 10vh auto;
      font-size:50px;
      text-align:center;
      color:#787878
   }
   .button{
     width:250px;
     margin:0 auto;
     display:flex;
     justify-content:space-around;
   }
   a{
     font-size:18px;
     color:#888888;
     cursor: pointer;
     text-decoration: none;
     vertical-align: middle;
   }
   a:hover{
     color:#C8C8C8;
   }

</style>
@stop
@section('content')
<div class="title">
    <p>Welcome</p>
</div>
<div class="button">
     <a href="{{ route('register') }}" >注册</a>
     <a href="{{ route('login') }}" >登录</a>
</div>
@stop