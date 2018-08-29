
@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/users.css') }}">
@stop


@section('js')
<script src="{{ URL::asset('js/users.js') }}"></script>
@stop

@section('content')


<div class='left'>
    <div class="title">
        <p class="titlebody">妄小孩</p>
        <p class="titlepart">想看看这个世界</p>
    </div>
    <div >
        <form action="{{ route('userview') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">个人</button>
            @if($status==1)
            <p class="itemtextactive">膨胀的小人物</p>
            @else
            <p class="itemtext">膨胀的小人物</p>
            @endif
        </form>  
    </div>
    <div  >
        <form action="{{ route('articleview') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">查看</button>
            @if($status==2)
            <p class="itemtextactive">装逼小分队</p>
            @else
            <p class="itemtext">装逼小分队</p>
            @endif
        </form>  
    </div>
    <div >
        <form action="{{ route('articlenew') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">新建</button>
            @if($status==4)
            <p class="itemtextactive">差评日报编辑</p>
            @else
            <p class="itemtext">差评日报编辑</p>
            @endif
        </form>   
    </div>
    <div >
        <form action="{{ route('logout') }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">注销</button>
            <p class="itemtext">要走了吗</p>
        </form>    
    </div>
    <div class="annotation">
        <p class="annotationcontent">If you miss the train I'm om</p>
        <p class="annotationcontent">You will know that I am gone</p>
        <p class="annotationcontent">Not a shirt on my back</p>
        <p class="annotationcontent">Not a penny to my name</p>
        <p class="annotationcontent">I can't go back home this-a way</p>
    </div>
</div>

<div class='right'>
    <div class="content">
    @if (Session::has('message'))                                             
    <div id="alertbox" class="alert">                
      <p class="alerttext">{{Session::get('message')}}</p>                            
    </div>
    @endif
    @if($status==0)
      <div class="imagebox">
      <img class="image" src="{{ URL::asset('images/bg.png') }}" />
      </div>
      <div class="textbox">
          <a href="{{ route('articleview')}}" class="textbody">芝麻开门</a>
          <p class="textpart">诶，门卡住了</p>
      </div>
    @elseif ($status == 1)
    <div id="userview">
        <div class="righttitlebox">
        <p class="righttitle">个人信息</p>
        </div>
        <div class="rightcontentbox">
        <div class="usercontent" ><p>昵称：{{ $user->name}}</p></div>
        <div class="usercontent" ><p>邮箱：{{ $user->email}}</p></div>
        </div>
    </div>
    @elseif ($status==2)
    <div id="articleview">
        <div class="righttitlebox">
        </div>
        <div class="rightcontentbox">
        <table >
            <tr>
              <th> <a href="{{ url('articleview?key=title')}}" class="thtext">Title</a>
              </th>
              <th><a href="{{ url('articleview?key=author')}}" class="thtext">Author</a>
              </th>
              <th><a href="{{ url('articleview?key=id')}}" class="thtext">Time</a>
              </th>
              <th class="thdetail">detail</th>
            </tr>
            @foreach ($articles as $index =>$article)
            <tr>
              <td>{{$article->title}}</td>
              <td>{{$article->author}}</td>
              <td>{{$article->updated_at}}</td>
              <td><a class="tdtext" href="{{ url('articledetail?key='.$article->id) }}">详情</a></td>
            </tr>
            @endforeach
        </table>

        {{$articles->appends(['key' => $key])->links('vendor.pagination.default2')}}
        </div>  
    </div>
    @elseif ($status==3)
    <div id="articleedit">
        <div class="righttitlebox">
        </div>
       <div class="rightcontentbox">
         
        
       </div>
      
    </div>
    @else
    <div id="articlenew">
        <div class="righttitlebox">
        <p class="righttitle">新建信息</p>
        </div>
        <div class="rightcontentbox">
       
        </div>
    </div>
    @endif
    </div>
</div> 





@stop



