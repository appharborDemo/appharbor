{{-- <h1>{!! $thread->subject !!}</h1> --}}

@foreach($thread->messages as $message)
    <div class="media">
        <a class="pull-left" href="#">
            <img src="//www.gravatar.com/avatar/{!! md5($message->user->email) !!}?s=64" alt="{!! $message->user->name !!}" class="img-circle">
        </a>
        <div class="media-body">
            <h5 class="media-heading">{!! $message->user->name !!}</h5>
            <p>{!! $message->body !!}</p>
            <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
        </div>
    </div>
@endforeach

{{-- <h2>Add a new message</h2> --}}

{{-- {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!} --}}
{!! Form::open(['data-pjax'=>'#message']) !!}
<!-- Message Form Input -->
<div class="form-group">
    <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
    {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'message']) !!}
</div>
{{-- <div class="col-lg-12">
    <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
    <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
</div>
 --}}            
@if($users->count() > 0)
<div class="checkbox">
    @foreach($users as $user)
        <label title="{!! $user->name !!}"><input type="checkbox" name="recipients[]" value="{!! $user->id !!}">{!! $user->name !!}</label>
    @endforeach
</div>
@endif

<!-- Submit Form Input -->
<div class="form-group">
    {{-- {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!} --}}
    {!! Form::button('Submit', ['class' => 'btn btn-primary form-control', 'onclick'=>'sendMessage()', 'id' => 'submitButton']) !!}
</div>
{!! Form::close() !!}
