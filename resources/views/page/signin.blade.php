@extends('master')
@section('noiDung')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('ghi_taikhoan')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="ntf">
					@if(count($errors)>0)
						<div class="alert-danger">
							@foreach($errors->all() as $er){{$er}}@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong')){{Session::get('thanhcong'),Session::forget('thanhcong')}}@endif
				</div>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" id="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="name" id="your_last_name" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="password" id="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Re password*</label>
							<input type="password" name="re_password" id="phone" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection