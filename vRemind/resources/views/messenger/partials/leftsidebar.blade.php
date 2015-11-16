<nav class="groups-nav">
	<section class="groups-nav-section">
		<div class="group-header input-group">
			{!! Form::open(array('route' => 'messages', 'class'=>'form navbar-form navbar-left searchform')) !!}
			    {!! Form::text('search', null, array('required',
			                                'class'=>'form-control',
			                                'placeholder'=>'Search')) !!}
			    {{-- {!! Form::submit('Search', array('class'=>'btn btn-default')) !!} --}}
			{!! Form::close() !!}
			<span class="input-group-btn">
				<a onclick="createMessage()" class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
			</span>
		</div>

		<div class="group-list">			
			@if (Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {!! Session::get('error_message') !!}
                </div>
            @endif
            @if($threads->count() > 0)
                @foreach($threads as $thread)
	                <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
	                <div onclick="showMessage({!! $thread->id !!})" data-pjax='#chat-area' class="media alert {!!$class!!} clickable">
	                    {{-- <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4> --}}
	                    {{-- <a href="{!! 'messages/' . $thread->id !!}"> </a> --}}
	                    <h4 class="media-heading">{!! $thread->participantsString(Auth::user()->id) !!}</h4>
	                    <p>
	                    	<?php 
	                    		$latestUser = vRemind\User::find($thread->latestMessage->user_id); 
	                    		if ($latestUser->id == Auth::id())
	                    			$name = "You"; 
	                    		else
	                    			$name = $latestUser->name;
	                    	?>
	                    		
	                    	@if (strlen($thread->latestMessage->body) <= 40)
	                    		{!! $name . ": " . $thread->latestMessage->body !!}
                    		@else
	                    		{!! $name . ": " . substr($thread->latestMessage->body, 0, 40) . "..." !!}
                    		@endif
	                    </p>
	                    {{-- <p><small><strong>Creator:</strong> {!! $thread->creator()->name !!}</small></p>
	                    <p><small><strong>Participants:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p> --}}
	                </div>
                @endforeach
            @else
                <p>Sorry, no threads.</p>
            @endif
		</div>
	</section>	
</nav>