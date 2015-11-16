@extends('layout.default')

@section('left-sidebar')
    @include('messenger.partials.leftsidebar')
@endsection

@section('right-sidebar')
    {{-- @include('messenger.partials.leftsidebar') --}}
@endsection

@section('content')
        <h1 id="greeting">Hello, <span id="username">{{Auth::user()->name}}</span></h1>
        <div id="chat-area" class="col-lg-12 scroll-area">
            <div id="chat-window" class="col-lg-12">
                {{-- messages will show here --}}
            </div>
            
        </div>        
@endsection

@section('footer')
    {!! Html::script('resources/assets/js/jquery-1.11.1.min.js') !!}
    {!! Html::script('resources/assets/js/chats.js') !!}
@endsection