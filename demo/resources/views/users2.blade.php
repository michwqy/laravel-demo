
@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/users.css') }}">
@stop


@section('js')
<script src="{{ URL::asset('js/users.js') }}"></script>
@stop

@section('content')

<div class='content'>
<div class='left'>
    <div class="title">
        <p class="titlebody">妄小孩</p>
        <p class="titlepart">想看看这个世界</p>
    </div>
    <div >
        <form action="{{ route('userview') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">个人</button>
            <p class="itemtext">膨胀的小人物</p>
        </form>  
    </div>
    <div  >
        <form action="{{ route('infoview') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">查看</button>
            <p class="itemtext">装逼小分队</p>
        </form>  
    </div>
    <div >
        <form action="{{ route('infonew') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">新建</button>
            <p class="itemtext">差评日报编辑</p>
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
</div>

<div class='right'>
    @if (Session::has('message'))                                             
    <div id="alertbox" class="alert">                
      <p class="alerttext">{{Session::get('message')}}</p>                            
    </div>
    @endif
   @if ($status == 1)
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
    <div id="infoview">
        <div class="righttitlebox">
        <p class="righttitle">查看信息</p>
        </div>
        <div class="rightcontentbox">
        {{--@foreach ($infos as $key =>$info)
        <div class="rightcontent">
           <form action="{{ route('infodetail')}}" method="POST">
            <input type="hidden" name="key" value="{{$key}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="detailbutton" >{{$info->name}}</button>
           </form>  
        </div>
        @endforeach--}}

        <table >
            <tr>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="type">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Type</button>
                  </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                    <input type="hidden" name="key" value="name">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="thbutton" >Name</button>
                  </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="placetype">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Placetype</button>
                  </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="scale">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Scale</button>
                  </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="location">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Location</button>
                  </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="organization">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Oraganization</button>
                  </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="field">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Field</button>
                </form> </th>
              <th><form action="{{ route('infoview')}}" method="POST">
                  <input type="hidden" name="key" value="position">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="thbutton" >Position</button>
                </form> </th>
              <th>detail</th>
            </tr>
            @foreach ($infos as $index =>$info)
            <tr>
              <td>{{$info->type}}</td>
              <td>{{$info->name}}</td>
              <td>{{$info->placetype}}</td>
              <td>{{$info->scale}}</td>
              <td>{{$info->location}}</td>
              <td>{{$info->organization}}</td>
              <td>{{$info->field}}</td>
              <td>{{$info->position}}</td>
              <td><a href="{{ url('infodetail?key='.$info->name) }}">详情</a></td>
            </tr>
            @endforeach
        </table>

        {{$infos->appends(['key' => $key])->links('vendor.pagination.default2')}}
        </div>  
    </div>
    @elseif ($status==3)
    <div id="infoedit">
        <div class="righttitlebox">
        <p class="righttitle">信息详情</p>
        </div>

       <div class="rightcontentbox">
         <span id="infotext">
         @if (!$flag)
         <p class='contentdetail'>采访对象：<input type='text' name='type' class='editinput' value='{{$info->type}}' disabled></p>
         <p class='contentdetail'>姓名：<input type='text' name='name' class='editinput'  value='{{$info->name}}' disabled></p>
         <p class='contentdetail'>邮箱：<input type='text' name='email' class='editinput' value='{{$info->email}}' disabled></p>
         <p class='contentdetail'>联系方式：<input type='text' name='connection' class='editinput' value='{{$info->connection}}' disabled></p>
         <p class='contentdetail'>场地类型：<input type='text' name='placetype' class='editinput' value='{{$info->placetype}}' disabled></p>
         <p class='contentdetail'>场地规模：<input type='text' name='scale' class='editinput' value='{{$info->scale}}' disabled></p>
         <p class='contentdetail'>可提供设备：<input type='text' name='facility' class='editinput' value='{{$info->facility}}' disabled></p>
         <p class='contentdetail'>场地地址：<input type='text' name='location' class='editinput' value='{{$info->location}}' disabled></p>
         <p class='contentdetail'>机构名称：<input type='text' name='organization' class='editinput' value='{{$info->organization}}' disabled></p>
         <p class='contentdetail'>行业/专业领域：<input type='text' name='field' class='editinput' value='{{$info->field}}' disabled></p>
         <p class='contentdetail'>职位：<input type='text' name='position' class='editinput' value='{{$info->position}}' disabled></p>
         <p class='contentdetail'>需求说明：<input type='text' name='need' class='editinput' value='{{$info->need}}' disabled>
         @else
         <form action="{{ route('infoupdate') }}" method="POST">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <p class='contentdetail'>采访对象：<input type='text' name='type' class='editinput' value='{{$info->type}}' ></p>
         <p class='contentdetail'>姓名：<input type='text' name='name' class='editinput'  value='{{$info->name}}' disabled ></p>
         <input type="hidden" name="name" value="{{$info->name}}">
         <p class='contentdetail'>邮箱：<input type='text' name='email' class='editinput' value='{{$info->email}}' ></p>
         <p class='contentdetail'>联系方式：<input type='text' name='connection' class='editinput' value='{{$info->connection}}' ></p>
         <p class='contentdetail'>场地类型：<input type='text' name='placetype' class='editinput' value='{{$info->placetype}}' ></p>
         <p class='contentdetail'>场地规模：<input type='text' name='scale' class='editinput' value='{{$info->scale}}' ></p>
         <p class='contentdetail'>可提供设备：<input type='text' name='facility' class='editinput' value='{{$info->facility}}' ></p>
         <p class='contentdetail'>场地地址：<input type='text' name='location' class='editinput' value='{{$info->location}}' ></p>
         <p class='contentdetail'>机构名称：<input type='text' name='organization' class='editinput' value='{{$info->organization}}' ></p>
         <p class='contentdetail'>行业/专业领域：<input type='text' name='field' class='editinput' value='{{$info->field}}' ></p>
         <p class='contentdetail'>职位：<input type='text' name='position' class='editinput' value='{{$info->position}}' ></p>
         <p class='contentdetail'>需求说明：<input type='text' name='need' class='editinput' value='{{$info->need}}' ></p>
         <button type="submit" class="contentbutton">确认</button>
         </form>
         @endif
         </span>
         @if (!$flag)
         <div class="editbuttons">
         <form action="{{ route('infoedit') }}" method="POST">
            <input type="hidden" name="key" value="{{$info->name}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="contentbutton">修改</button>
         </form>

         <div id="deletebutton">
         <form action="{{ route('infodelete') }}" method="POST">
            <input type="hidden" name="key" value="{{$info->name}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="contentbutton">删除</button>
         </form>
         </div>
         </div>
         @endif
        
       </div>
      
    </div>
    @else
    <div id="infonew">
        <div class="righttitlebox">
        <p class="righttitle">新建信息</p>
        </div>
        <div class="rightcontentbox">
        <form method="POST" action="{{ route('infoinsert') }}">
          {{ csrf_field() }}
        <div class="formcontent">
        <div class='inputdiv'>
          <p><label for="type">采访对象：</label></p>
          <p><input type="text" id="type" name="type" class="Input" required="required" placeholder="" value="{{ old('type') }}"  /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="name">姓名：</label></p>
          <p><input type="text" id="name" name="name" class="Input"  required="required" placeholder="" value="{{ old('name') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="email">邮箱：</label></p>
          <p><input type="text" id="email" name="email" class="Input" required="required" placeholder="" value="{{ old('email') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="connection">联系方式：</label></p>
          <p><input type="text" id="connection" name="connection" class="Input"  required="required" placeholder="" value="{{ old('connection') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="placetype">场地类型：</label></p>
          <p><input type="text" id="placetype" name="placetype" class="Input" required="required" placeholder="" value="{{ old('placetype') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="scale">场地规模：</label></p>
          <p><input type="text" id="scale" name="scale" class="Input" required="required" placeholder="" value="{{ old('scale') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="facility">可提供设备：</label></p>
          <p><input type="text" id="facility" name="facility" class="Input" required="required" placeholder="" value="{{ old('facility') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="location">场地地址：</label></p>
          <p><input type="text" id="location" name="location" class="Input" required="required" placeholder="" value="{{ old('location') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="organization">机构名称：</label></p>
          <p><input type="text" id="organization" name="organization" class="Input" required="required" placeholder="" value="{{ old('organization') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="field">行业/专业领域：</label></p>
          <p><input type="text" id="field" name="field" class="Input" required="required" placeholder="" value="{{ old('field') }}" /></p>
        </div>
        <div class='inputdiv'>
          <p><label for="position">职位：</label></p>
          <p><input type="text" id="position" name="position" class="Input" required="required" placeholder="" value="{{ old('position') }}" /></p>
        </div>
        <div class='needinput'>
          <p><label for="need">需求说明：</label></p>
          <p><textarea id="need" name="need"   placeholder="" value="{{ old('need') }}" ></textarea></p>
        </div>
        </div>
        <div class="formbutton">
          <button class="button" >完成</button>
        </div>
        </form>
        </div>
    </div>
    @endif
    </div>


</div>


@stop



