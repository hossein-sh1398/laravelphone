

@extends('layouts.app')

@section('body')
	<div class="container">
		<div class="card mt-4">
			<div class="card-header">
				Form Enter Mail
			</div>
			<div class="card-body">
				<form action="{{route('auth.send.token')}}" method="post">  
					@csrf
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop