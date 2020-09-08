

@extends('layouts.app')

@section('body')
	<div class="container">
		<div class="card mt-4">
			<div class="card-header">
				Complete Profile
			</div>
			<div class="card-body">
				<form action="{{route('auth.info')}}" method="post">  
					@csrf
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop