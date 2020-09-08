
@extends('layouts.app')

@section('body')
	<div class="container">
		<div class="card mt-4">
			<div class="card-header">
				Form Enter Otp
			</div>
			<div class="card-body">
				<form action="{{route('auth.verify.token')}}" method="post">  
					@csrf
					<div class="form-group">
						<label>Code</label>
						<input type="text" name="code" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop