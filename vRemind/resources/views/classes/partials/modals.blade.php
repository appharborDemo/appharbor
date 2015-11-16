{{-- Add Class Modal --}}
<div class="modal fade" id="addClassModal" tabindex="-1" role="dialog" aria-labelledby="addClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="helpModalLabel">Thêm Lớp</h4>
      </div>
      
      {!! Form::open(array('url'=>'classes/add','method'=>'POST', 'id'=>'addClassForm')) !!}
      <div class="modal-body">
        <div class="mot-hang">
            <div class="mot-hang-30">
                <img alt="image-random" width="90px" id="image-randomId" src="resources/assets/img/classesAvatar/avatar_baseball.png"/>
                <span class="mot-hang-chu-edit" data-toggle="modal" data-target="#editIconModal" aria-haspopup="true" onclick="MoFormEditIcon()">
                    Edit icon
                </span>
                <input type="hidden" name="soIconDuocChon" id="so-icon-duoc-chon-id"/>
            </div>
            <div class="mot-hang-70">
                <form>
                    <span class="mot-hang ">
                        Class name
                    </span>
                    <span class="mot-hang" style="margin-bottom:20px;">
                         {!! Form::text('className','',array('id'=>'className','class'=>'form-control span6','placeholder' => 'e.g. Math101')) !!}

                        <span class="mot-hang validator" id="validator-class-name-id">
                            The name must be at least 3 characters long.
                        </span>
                    </span>
                    
                    <span>
                        Class code
                    </span>
                    <div class="input-group">
                      <div class="input-group-addon">@</div>
                      {!! Form::text('classCode','',array('id'=>'classCode','class'=>'form-control')) !!}
                    </div>
                </form>
            </div>
            
        </div>
        <div class="mot-hang" style="margin-top:15px; 
              padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
             
        </div>
        
        <div class="mot-hang">
            <input name="participant_can_reply" id="participant_can_reply" type="checkbox" class="input-ben-trong-check"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 Participants can reply to your messages.
             </span>
         </div>
        <div class="mot-hang">
             <input name="message_under_13" id="message_under_13" type="checkbox" class="input-ben-trong-check"/>
             <span style="float:left;margin:7px 0px 0px 10px;">
                 I will only message people 13 or older
             </span>
             <span style="float:left;width:87%;margin-left:12%;
                   font-size:11px; color:gray;">
                 It's okay if students are under 13. We’ll ask for a parent's email 
                 address to keep everyone in the loop.
             </span>
        </div>          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Thêm</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Icon Modal -->
<div class="modal fade" id="editIconModal" tabindex="-1" role="dialog" aria-labelledby="editIconModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editIconModalLabel">Select a class icon</h4>
      </div>
      <div class="modal-body">
        <div class="mot-hang" style="margin-top:15px; 
              padding-top: 15px; border-top:1px solid rgba(128, 128, 128, 0.42);">
             
        </div>
        <div class="mot-hang" id="noi-chua-icon-id" style="margin-top:35px;">
            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Join Class Modal -->
<div class="modal fade" id="joinClassModal" tabindex="-1" role="dialog" aria-labelledby="joinClassModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="joinClassModalLabel">Join a class</h4>
      </div>
      <div class="modal-body">
        <span>
            Enter class code
        </span>
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="prefixClassCode">@</label>
            <div class="input-group">
              <div class="input-group-addon">@</div>
              <input type="text" class="form-control" id="classCode" placeholder="Enter class code">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Join</button>
        </form>
        <a class="btn btn-link">Search for your class instead</a>
      </div>
    </div>
  </div>
</div>
