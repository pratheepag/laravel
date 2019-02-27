@extends('layouts.app')
@section('content')
	<script type="text/javascript">
		$( document ).ready(function() {
			
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
		
		<form action="{{ route('article.update', $article->id)}}" method="post" >
			@csrf
			@method('PUT')
			<div class="row">
				
				<div class="col-md-12">
					<strong>Description:</strong>
					<textarea class="form-control" name="description" rows="8" cols="80">{{$article->description}}</textarea>
				</div>
				
				<div class="col-md-12">
					<strong>Type:</strong>
					<select name="type"  class="form-control">
						<option value=" ">--Select--</option>
						@if ($article->type == "image")
							<option value="image" selected="selected">Image</option>
						@else
							<option value="image">Image</option>
						@endif
						
						@if ($article->type == "audio")
							<option value="audio" selected="selected">Audio</option>
						@else
							<option value="audio">Audio</option>
						@endif
						
						@if ($article->type == "video")
							<option value="video" selected="selected">Video</option>
						@else
							<option value="video">Video</option>
						@endif
						</select>
				</div>
				@if ($article->type == "image")
					<div class="col-md-12" id="imageDiv" style="display:block" >
				@else 
					<div class="col-md-12" id="imageDiv" style="display:none" >
				@endif
					<strong>Image:</strong>
					@foreach($article->images as $image)
					<img src="{{ $image->name }}" />			
					@endforeach
					<input class="form-control" name="image" id="image" type="file" />
				</div>
				
				@if ($article->type == "audio")
					<div class="col-md-12" id="audioDiv" style="display:block" >
				@else 
					<div class="col-md-12" id="audioDiv" style="display:none" >
				@endif
					<strong>Audio:</strong>
					@foreach($article->audios as $audio)
						<img src="{{ $audio->name }}" />			
					@endforeach
					<input class="form-control" name="audio" type="file" />
				</div>
				
				<div class="col-md-12" id="videoDiv">
					<strong>Video:</strong>
					@foreach($article->videos as $video)
						<input class="form-control" name="video" type="text" value="{{ $video->videourl }} " />
					@endforeach
				</div>
				
				<div class="col-md-12">
					<a href="{{route('article.index')}}" class="btn btn-sm btn-success">Back</a>
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
@endsection