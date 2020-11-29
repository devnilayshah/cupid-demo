@extends('layouts.auth')

@section('title')
Registration
@endsection

@section('content')


<div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
	<div class="div-to-align">
		<div class="">
			<h2 class="mb-4 text-center color-red">Register for Cupid Knot</h2>
			<form class="text-center border border-light p-5" method="POST" id="register_form" name="register_form" action="{{ route('register.store') }}">
				@csrf

				@if($errors)
				@foreach($errors->all() as $error)
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ $error }}
				</div>
				@endforeach
				@endif
				<h4>Basic Information</h4>
				<input type="text" id="first_name" name="first_name" class="form-control mb-4" placeholder="First Name">
				<input type="text" id="last_name" name="last_name" class="form-control mb-4" placeholder="Last Name">
				@if(!isset($_GET['email']))
				<input type="email" id="email_id" name="email_id" class="form-control mb-4" placeholder="E-mail">
				@else
				<input type="email" id="email_id_dis" name="email_id_dis" class="form-control mb-4" readonly value="{{ $_GET['email'] }}">
				<input type="hidden" id="email_id" name="email_id" class="form-control mb-4" value="{{ $_GET['email'] }}">
				@endif
				<input type="hidden" name="social_id" value="{{ isset($_GET['id']) ? $_GET['id'] : '' }}">
				
				<input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
				<input type="text" id="annual_income" name="annual_income" class="form-control mb-4" placeholder="Annual Income">
				<input type="text" id="date_of_birth" name="date_of_birth" class="form-control mb-4 datepicker" placeholder="DOB" autocomplete="off">
				<div class="form-check mb-4 mt-4 float-left main-radio">
					<input type="radio" class="form-check-input" id="gender_1" name="gender" value="1" checked>
					<label class="form-check-label" for="gender_1">Male</label>
					<div class="radio-div">
						<input type="radio" class="form-check-input" id="gender_2" name="gender" value="0">
						<label class="form-check-label" for="gender_2">female</label>
					</div>
				</div>
				<select name="occupation" id="occupation" class="form-control mb-4">
					<option value="">Select Occupation</option>
					@foreach($occupations as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
				<select name="family_type" id="family_type" class="form-control mb-4">
					<option value="">Select Family Type</option>
					@foreach($familyTypes as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
				<select name="manglik" id="manglik" class="form-control mb-4">
					<option value="">Select Maglik</option>
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select>

				<h4>Partner Preference</h4>

				<select name="occupation_preference[]" id="occupation_preference" class="form-control mb-4" multiple>
					<option value="">Select Occupation</option>
					@foreach($occupations as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>

				<select name="family_type_preference[]" id="family_type_preference" class="form-control mb-4" multiple>
					<option value="">Select Family Type</option>
					@foreach($familyTypes as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
				<select name="manglik_preference" id="manglik_preference" class="form-control mb-4">
					<option value="">Select Maglik</option>
					<option value="0">No</option>
					<option value="1">Yes</option>
					<option value="3">Both</option>
				</select>

				<label for="amount">Expected Annual Income: <span id="expected_from">0</span> - <span id="expected_to">1000000</span></label>                      
				<div id="slider-range"></div>
				<input type="hidden" name="annual_income_preference_from" id="expected_from_hidden">
				<input type="hidden" name="annual_income_preference_to" id="expected_to_hidden">

				<button class="btn btn-info btn-block my-4" type="submit">Sign Up</button>
				<p>Already a member?
					<a href="{{ route('login') }}">Login</a>
				</p> 
				<p>or sign Up with:</p>
				<a href="{{ route('google') }}" class="mx-2" role="button"><i class="fab fa-google light-blue-text"></i></a>
			</form>                         
		</div>
	</div>
</div>


@endsection