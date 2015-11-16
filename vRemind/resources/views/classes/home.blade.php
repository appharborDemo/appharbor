@extends('layout.default')

@section('left-sidebar')
    @include('classes.partials.leftsidebar')
@endsection

@section('right-sidebar')
    @include('classes.partials.rightsidebar')
@endsection

@section('content')
    <div class="mot-hang">
        <img alt="image-main" style="float:left;margin-right:15px;" src="resources/assets/img/classesAvatar/avatar_baseball.png" height="65px"/>
        <div class="mot-hang-70">
            <span class="mot-hang-chu-title">
                Phân tích thiết kế phần mềm
            </span>
            <span class="mot-hang-chu-description">
                @phantc231
            </span>
        </div>
        <div class="button-setting icon-an-noi-dung" onclick="MoKhungChuaClassSetting()">
            <div class="noidung-icon" style="left:-32px;">
                Class settings
            </div>
        </div>
        
        <div class="main-area" style="margin-top: 90px;">
            <div class="panel-body">
                {{-- You are logged in! --}}
                {{-- $user = auth(); --}}
                @if (Auth::user()->hasRole('teacher'))
                    Teacher
                @elseif (Auth::user()->hasRole('student'))
                    Student
                @else
                    Parent
                @endif
            </div>
                
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ url('/classes/upload') }}">
              <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">To: </span>
                    <input type="text" class="form-control" id="toClass" placeholder="Select class">
                </div>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" placeholder="Type your annoucement to Class X"></textarea>
              </div>
              <div class="form-group">
                <input type="file" name="file">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
              <button  type="submit" class="btn btn-primary">Send</button>
                @if (Session()->has('image')) 
                    <img src="..\uploads\{!! Session::get('image') !!}"   style="width:304px;height:228px;">
                @endif
              
            </form>
        </div>
    </div>

@include('classes.partials.modals')	
@endsection