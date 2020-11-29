@extends('layouts.app')

@section('title') Dashboard @endsection


@section('content')
<div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
	<div class="div-to-align">
		<span class="logout"><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt light-blue-text"></i></a></span>
		<h2 class="mb-4 text-center color-red">Welcome, {{ Auth::user()->name }}</h2>
		<table class="table table-bordered">
			<tr>
				<th>Name:</th>
				<td>{{ Auth::user()->name }}</td>
			</tr>
			<tr>
				<th>EmailId:</th>
				<td>{{ Auth::user()->email }}</td>
			</tr>
			<tr>
				<th>Date Of Birth:</th>
				<td>{{ Auth::user()->userDetail->date_of_birth->format('d M Y') }}</td>
			</tr>
			<tr>
				<th>Gender:</th>
				<td>{{ (Auth::user()->userDetail->gender == 1) ? 'Male' : 'Female' }}</td>
			</tr>
			<tr>
				<th>Annual Income:</th>
				<td>{{ Auth::user()->userDetail->annual_income }} INR</td>
			</tr>
			<tr>
				<th>Occupation:</th>
				@php 
				$occupation = config('constant.OCCUPATION');
				@endphp
				@if(!is_null(Auth::user()->userDetail->occupation))
				<td>{{ $occupation[Auth::user()->userDetail->occupation] }}</td>
				@else
				<td>NA</td>
				@endif
			</tr>
			<tr>
				<th>Family Type:</th>
				@php 
				$familyType = config('constant.FAMILY_TYPE');
				@endphp
				@if(!is_null(Auth::user()->userDetail->family_type))
				<td>{{ $familyType[Auth::user()->userDetail->family_type] }}</td>
				@else
				<td>NA</td>
				@endif
			</tr>
			<tr>
				<th>Manglik:</th>
				@if(!is_null(Auth::user()->userDetail->manglik))
				<td>{{ (Auth::user()->userDetail->manglik == 1) ? 'Yes' : 'No' }}</td>
				@else
				<td>NA</td>
				@endif
			</tr>
		</table>
	</div>
</div>
<div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center" style="margin-bottom: 20px;">
	<div class="div-to-align">
		<h4 class="mb-4 text-center color-red">Profile matches with your preferences</h4>
		<div class="row">
			<div class="container">
				@forelse($matches as $match)
				<div class="card" style="width: 30rem;">
					<div class="card-body">
						<h5 class="card-title">{{ $match->user->name }}</h5>
						<p class="card-text">EmailId : {{ $match->user->email }}</p>
						<p class="card-text">Date Of Birth : {{ $match->date_of_birth->format('d M Y') }}</p>
						<p class="card-text">Annual Income : {{ $match->annual_income  }} INR</p>
						<p class="card-text">Occupation : 
							@if(!is_null($match->occupation))
							<td>{{ $occupation[$match->occupation] }}</td>
							@else
							<td>NA</td>
							@endif
						</p>
						<p class="card-text">Family Type : 
							@if(!is_null($match->family_type))
							<td>{{ $familyType[$match->family_type] }}</td>
							@else
							<td>NA</td>
							@endif
						</p>
						<p class="card-text">Manglik : 
							@if(!is_null($match->manglik))
							<td>{{ ($match->manglik == 1) ? 'Yes' : 'No' }}</td>
							@else
							<td>NA</td>
							@endif
						</p>
					</div>
				</div>
				@empty
				<h4 class="align-items-center">No Matching profile for your preferences.</h4>
				@endforelse
			</div>	
		</div>
	</div>
</div>

@endsection