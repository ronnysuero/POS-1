<div class="widget-box transparent">

		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-name"> Full Name </div>

				<div class="profile-info-value">
					<i class="icon-user light-green bigger-110"></i>
					<span id="guarantor_name" data-pk="{{$staff['id']}}" class="editable editable-click"> {{{ucwords($staff['guarantor_name'])}}} </span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Address </div>

				<div class="profile-info-value">
					<i class="icon-map-marker light-green bigger-110"></i>
					<span id="guarantor_address" data-pk="{{$staff['id']}}" class="editable editable-click">{{{$staff['guarantor_address']}}}</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Phone Number </div>

				<div class="profile-info-value">
					<i class="icon-phone light-green bigger-110"></i>
					<span id="guarantor_phone" data-pk="{{$staff['id']}}" class="editable editable-click"> {{{$staff['guarantor_phone']}}}</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Email </div>

				<div class="profile-info-value">
					<i class="icon- light-green bigger-110">@</i>
					<span id="guarantor_email" data-pk="{{$staff['id']}}" class="editable editable-click"> {{{$staff['guarantor_email']}}}</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> <small>Work-place Phone</small> </div>

				<div class="profile-info-value">
					<i class="icon-phone purple bigger-110"></i>
					<span id="guarantor_workplace_phone" data-pk="{{$staff['id']}}" class="editable editable-click"> {{{$staff['guarantor_workplace_phone']}}} </span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> <small>Work-place Address</small> </div>

				<div class="profile-info-value">
				<i class="icon-map-marker purple bigger-110"></i>
					<span id="guarantor_workplace_address" data-pk="{{$staff['id']}}" class="editable editable-click"> {{{$staff['guarantor_workplace_address']}}} </span>
				</div>
			</div>

			<!--<div class="profile-info-row">
				<div class="profile-info-name"> About Me </div>

				<div class="profile-info-value">
					<span id="about" class="editable editable-click">Editable as WYSIWYG</span>
				</div>
			</div>-->
		</div>



</div> <!-- PERSONAL DETAILS ENDS HERE -->