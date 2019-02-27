@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Detail View</h3>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<strong>Name:</strong>{{$article->description}}
				<div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Type:</strong>{{$article->type}}
				<div>
			</div>
			<div class="col-md-12">
				<a href="{{ route('article.index')}}" class="btn btn-sm btn-success">Back</a>
			</div>
		</div>
	</div>
@endsection