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

    .alert{
     position:absolute;
     background-color: #1496bb;
     color:white;
     font-weight: bold;
     text-align: center;
     top:0px;
     left:43%;
     box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.28);
   }

   .alerttext{
     margin:5px 5px 0 5px;
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
          <div id="alertbox" class="alert">
        
          @foreach($errors->all() as $error)
          <p class="alerttext">{{ $error }}</p>
          @endforeach
    
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