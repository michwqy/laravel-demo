@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/users.css') }}">
@stop


@section('js')
    <script>

     window.onload=function(){
            var view=document.getElementById('infoview');
            view.hidden=false;
            var infonew=document.getElementById('infonew');
            infonew.hidden="hidden";
            var edit=document.getElementById('infoedit');
            edit.hidden="hidden";
            var user=document.getElementById('userview');
            user.hidden="hidden";
            
        }

        function infoview(){
            var view=document.getElementById('infoview');
            view.hidden=false;
            var infonew=document.getElementById('infonew');
            infonew.hidden="hidden";
            var edit=document.getElementById('infoedit');
            edit.hidden="hidden";
            var user=document.getElementById('userview');
            user.hidden="hidden";
        }

        function infonew(){
            var view=document.getElementById('infoview');
            view.hidden="hidden";
            var infonew=document.getElementById('infonew');
            infonew.hidden=false;
            var edit=document.getElementById('infoedit');
            edit.hidden="hidden";
            var user=document.getElementById('userview');
            user.hidden="hidden";

        }

        function infoedit(obj){
            var key=obj.dataset.key;

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function()
           {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
             {
              document.getElementById("infotext").innerHTML=xmlhttp.responseText;
             }
           }
           xmlhttp.open("POST","{{ route('infoview') }}",true);
           xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
           xmlhttp.setRequestHeader("X-CSRF-TOKEN",token);
           xmlhttp.send("key="+key);

            var view=document.getElementById('infoview');
            view.hidden="hidden";
            var infonew=document.getElementById('infonew');
            infonew.hidden="hidden";
            var edit=document.getElementById('infoedit');
            edit.hidden=false;
            var user=document.getElementById('userview');
            user.hidden="hidden";
            var button=document.getElementById('ensurebutton');
            button.hidden="hidden";
        }


        function userview(){
            var view=document.getElementById('infoview');
            view.hidden="hidden";
            var infonew=document.getElementById('infonew');
            infonew.hidden="hidden";
            var edit=document.getElementById('infoedit');
            edit.hidden="hidden";
            var user=document.getElementById('userview');
            user.hidden=false;

        }

        function edit(){
          var key=document.getElementById('infokey');

          var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function()
           {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
             {
              document.getElementById("infotext").innerHTML=xmlhttp.responseText;
             }
           }
           xmlhttp.open("POST","{{ route('infoedit') }}",true);
           xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
           xmlhttp.setRequestHeader("X-CSRF-TOKEN",token);
           xmlhttp.send("key="+key.dataset.key);

          var button=document.getElementById('editbutton');
          button.hidden="hidden";
          var button=document.getElementById('deletebutton');
          button.hidden="hidden";
          var button=document.getElementById('ensurebutton');
          button.hidden=false;
        }

        function update(){
          var inputs=document.getElementsByClassName('editinput');


          var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function()
           {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
             {
              document.getElementById("infotext").innerHTML=xmlhttp.responseText;
             }
           }
           xmlhttp.open("POST","{{ route('infoupdate') }}",true);
           xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
           xmlhttp.setRequestHeader("X-CSRF-TOKEN",token);
           xmlhttp.send("type="+inputs[0].value+"&name="+inputs[1].value+"&email="+inputs[2].value+"&connection="+inputs[3].value+
           "&placetype="+inputs[4].value+"&scale="+inputs[5].value+"&facility="+inputs[6].value+"&location="+inputs[7].value+
           "&organization="+inputs[8].value+"&field="+inputs[9].value+"&position="+inputs[10].value+"&need="+inputs[11].value);

          var button=document.getElementById('ensurebutton');
          button.hidden="hidden";
          var button=document.getElementById('editbutton');
          button.hidden=false;
          var button=document.getElementById('deletebutton');
          button.hidden=false;
        }
        
        function infodelete(){
     
          var key=document.getElementById('infokey');
     
          var xmlhttp=new XMLHttpRequest();
           
            xmlhttp.onreadystatechange=function()
           {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
             {
              alert("删除成功");
             }
           }
           alert(key.dataset.key);
           
           xmlhttp.open("POST","{{ route('infodelete') }}",true);
           xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
           var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
           xmlhttp.setRequestHeader("X-CSRF-TOKEN",token);
           xmlhttp.send("key="+key.dataset.key);
           window.location.replace();
     
        }

    </script>
@stop

@section('content')

<div class='content'>
<div class='left'>
    <div class='leftinfo' onclick="userview()">
        <P>{{$user->name}}</p>
    </div>
    <div class='leftinfo' onclick="infoview()" >
        <p >查看信息</p>
    </div>
    <div class='leftinfo'  onclick="infonew()">
        <p>新建信息</p>
    </div>
    <div >
        <form action="{{ route('logout') }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="loginout">注销</button>
        </form>    
    </div>
</div>

<div class='right'>
    <div id="userview">
        <div class="righttitlebox">
        <p class="righttitle">个人信息</p>
        </div>
        <div class="rightcontentbox">
        <div class="usercontent" ><p>昵称：{{ $user->name}}</p></div>
        <div class="usercontent" ><p>邮箱：{{ $user->email}}</p></div>
        </div>
    </div>
    <div id="infoview">
        <div class="righttitlebox">
        <p class="righttitle">查看信息</p>
        </div>
        <div class="rightcontentbox">
        @foreach ($infos as $key =>$info)
        <div class="rightcontent" data-key="{{$key}}" onclick="infoedit(this)"><p>{{ $info->name}}</p></div>
        @endforeach
        {{$infos->links('vendor.pagination.default2')}}
        </div>
        
    </div>
    <div id="infoedit">
        <div class="righttitlebox">
        <p class="righttitle">信息详情</p>
        </div>

       <div class="rightcontentbox">
         <span id="infotext"></span>
         <div class="editbuttons">
         <div id="editbutton">
         <button class="contentbutton" onclick="edit()">修改</button>
         </div>
         <div id="deletebutton">
         <button class="contentbutton"onclick="infodelete()">删除</button>
         </div>
         </div>
         <div id="ensurebutton">
         <button class="contentbutton"onclick="update()">确认</button>
         </div>
        
       </div>
      
    </div>
    <div id="infonew">
        <div class="righttitlebox">
        <p class="righttitle">新建信息</p>
        </div>
        <div class="rightcontentbox">
        <form method="POST" action="{{ route('infonew') }}">
          {{ csrf_field() }}
        <div class="formcontent">
        <div class='inputdiv'>
          <p><label for="type">采访对象：</label></p>
          <p><input type="text" id="type" name="type" class="Input" required="required" placeholder="" value="{{ old('type') }}" /></p>
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
          <p><textarea id="need" name="need" class="Input"  placeholder="" value="{{ old('need') }}" ></textarea></p>
        </div>
        </div>
        <div class="formbutton">
          <button class="button" >完成</button>
        </div>
        </form>
        </div>
    </div>
    </div>


</div>


@stop



