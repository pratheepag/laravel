@extends('layouts.app')
@section('content')
	<script type="text/javascript">
		$( document ).ready(function() {
			$('#imageDiv').hide();
			$('#audioDiv').hide();
			$('#videoDiv').hide();
			$('#type').change(function() {
				if($(this).val() == "image"){
					$('#imageDiv').show();
					$('#audioDiv').hide();
					$('#videoDiv').hide();
				}else if($(this).val() == "audio"){
					$('#audioDiv').show();
					$('#imageDiv').hide();
					$('#videoDiv').hide();
				}else if($(this).val() == "video"){
					$('#videoDiv').show();
					$('#audioDiv').hide();
					$('#imageDiv').hide();
				}else{
					$('#imageDiv').hide();
					$('#audioDiv').hide();
					$('#videoDiv').hide();
				}
			})
		});
		
	</script>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>New Article</h3>
			</div>
		</div>
		
		@if($errors->any())
			<div class="alert alert-danger">
				<stong>Some problem in input </strong><br>
				<ul>
					@foreach($errors as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
		<form action="{{ route('article.store')}}" method="post"  enctype="multipart/form-data" >
			@csrf
			<div class="row">
				
				<div class="col-md-12">
					<strong>Description:</strong>
					<textarea class="form-control" name="description" rows="8" cols="80"></textarea>
				</div>
				
				<div class="col-md-12">
					<strong>Type:</strong>
					<select name="type" id="type" class="form-control">
						<option value=" ">--Select--</option>
						<option value="image">Image</option>
						<option value="audio">Audio</option>
						<option value="video">Video</option>
					</select>
				</div>
				
				<div class="col-md-12" id="imageDiv">
					<strong>Image:</strong>
					<input class="form-control" name="image" id="image" type="file" />
				</div>
				
				<div class="col-md-12" id="audioDiv">
					<strong>Audio:</strong>
					<input class="form-control" name="audio" type="file" />
				</div>
				
				<div class="col-md-12" id="videoDiv">
					<strong>Video:</strong>
					<input class="form-control" name="video" type="text" />
				</div>
				
				<div class="col-md-12">
					<a href="{{route('article.index')}}" class="btn btn-sm btn-success">Back</a>
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
@endsection