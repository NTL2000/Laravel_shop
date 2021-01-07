@extends('master')
@section('noiDung')
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('thuc-hien-dang-nhap')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						@if(count($errors)>0)
						<div class="alert-danger">
							@foreach($errors->all() as $er){{$er}}@endforeach
						</div>
						@endif
						@if(Session::has('flag'))
							<div class="alert_no" style="color: red">{{Session::get('notify_login'),Session::forget('notify_login'),Session::forget('flag')}} </div>
						@endif
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email address*</label>
							<input name="email" type="email" id="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input name="password" type="password" id="phone" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection