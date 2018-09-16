@extends('layouts.default')

@section('content')
  <p>{{$name}}您好</p>
  <p>请点击下面链接激活您的账号</p>
  <p><a href="{{$url}}" target="_blank">{{$url}}</a></p>
  <p>链接在24小时内有效</p>
@stop