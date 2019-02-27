@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h3>List Article</h3>
			</div>
			<div class="col-sm-2">
				<a class="btn btn-sm btn-success" href="{{ route('article.create') }}">Create New Article</a>
			</div>
		</div>
	
	
		@if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
		@endif
		
		<table class="table table-hover table-sm">
			<tr>
				<th width="50px"><b>No.</b></th>
				<th width="300px"><b>Type</b></th>
				<th ><b>Description</b></th>
				
				<th width="180px"><b>Action</b></th>
			</tr>
		
		@foreach($article as $arti)
			<tr>
				<td><b>{{++$i}}.</b></td>
				
				<td>{{$arti->type}}</td>
				<td>{{$arti->description}}</td>
				<td>
					<form action="{{ route('article.destroy', $arti->id) }}" method="post">
						<a class="btn btn-sm btn-success" href="{{ route('article.show', $arti->id)}}">Show</a>
						<a class="btn btn-sm btn-warning" href="{{ route('article.edit', $arti->id)}}">Edit</a>
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-sm btn-danger">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
		</table>
		
		{!! $article->links() !!}
		
		
	</div>
@endsection