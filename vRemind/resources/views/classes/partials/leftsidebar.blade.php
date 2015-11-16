<nav class="groups-nav">
	@if (Auth::user()->hasRole('teacher'))
		<section class="groups-nav-section">
			{{-- <div class="group-header input-group">
				<h4 class="groups-nav-section-title">CLASSES OWNED</h4>
				<span class="input-group-btn">
					<button class="btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
				</span>
			</div> --}}
			<div class="mot-hang" >                
                <span class="chu-class">
                    CLASSES OWNED
                </span>              
                
                <div class="button-add icon-an-noi-dung" data-toggle="modal" data-target="#addClassModal" aria-haspopup="true" onclick="MoTrangAddClass()">
                    +
                    <div class="noidung-icon" style="left: -34px;
                        top: 50px;font-size: 15px;">
                        Add a class
                    </div>
                </div>
            </div>

			<div class="group-list">
				<ul class="menu-class">
                    <li class="menu-class-child class-selected">
                        <img alt="avatarclass"  src="resources/assets/img/classesAvatar/avatar_baseball.png"/>
                        <font>
                            Phân tích thiết kế phần mềm
                        </font>
                        
                    </li>
                    <li class="menu-class-child">
                        <img alt="avatarclass" src="resources/assets/img/classesAvatar/avatar_apple_default.png" />
                        
                        <font>
                            Thiết kế dữ liệu và giải thuật
                        </font>
                    </li>
                    <li class="menu-class-child">
                        <img alt="avatarclass" src="resources/assets/img/classesAvatar/avatar_history.png"/>
                        <font>
                             Lập trình ứng dụng
                        </font>
                    </li>
                </ul>
			</div>
		</section>
	@endif

	<section class="groups-nav-section">
		<div class="class-ow-jo" style="margin-top:50px;">
            <div class="mot-hang" >
                <span class="chu-class">
                    CLASSES JOINED
                </span>
                <div class="button-add icon-an-noi-dung" data-toggle="modal" data-target="#joinClassModal" aria-haspopup="true" onclick="MoTrangJoinClass()">
                    +
                    <div class="noidung-icon" style="left: -34px;
                        top: 50px;font-size: 15px;">
                        Join a class
                    </div>
                </div>
            </div>
            <ul class="menu-class">
                <li class="menu-class-child class-selected">
                    <img alt="avatarclass"  src="resources/assets/img/classesAvatar/avatar_baseball.png"/>
                    <font>
                        Cơ sở dữ liệu nâng cao
                    </font>                        
                </li>
            </ul>
        </div>
	</section>	
</nav>
