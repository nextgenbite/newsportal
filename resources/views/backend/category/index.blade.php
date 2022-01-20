@extends('layouts.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Categories</h1>
		</div>
		
		<div class="col-sm-4 cat-form">
			
			@if (Session::has('message'))
			<div class="alert alert-success alert-dismissble fade in">
				{{ Session('message') }}
				<a href="" class="close" data-dismis="alert">&times;</a>
			</div>
				
			@endif
			<h3>Add New Category</h3>
			{!! Form::open(['method'=>'POST', 'action'=> 'CategoriesController@store']) !!}
			@csrf
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="title" id="category_name" class="form-control">
					<p>The name is how it appears on your site.</p>
				</div>

				<div class="form-group">
					<label>Slug</label>
					<input type="text" name="slug" id="slug" class="form-control" readonly="">
					<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
				</div>
	
				<div class="form-group">
					<label>Status</label>
					
					<select class="form-control" name="status" id="">
						<option>On</option>
						<option >Off</option>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Add New Category</button>
				</div>
				{!! Form::close() !!}


		</div>

		<div class="col-sm-8 cat-view">
			<div class="row">
				<div class="col-sm-3">
					<select name="bulk-action" class="form-control">
						<option>Bulk Action</option>
						<option>Move to Trash</option>
					</select>
				</div>
				<div class="col-sm-2">
					<button class="btn btn-default">Apply</button>
				</div>
				<div class="col-sm-3 col-sm-offset-4">
					<input type="text" id="search" name="search" class="form-control" placeholder="Search Category">
				</div>	
			</div>
			<div class="content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th><input type="checkbox" id="select-all"> Name</th>
						
							<th>Slug</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@if (count($categories) > 0)
							
						
						@foreach ($categories as $cat)
						<tr>
							<td>
								<input type="checkbox" name="select-cat"> 
								<a href="{{URL::to('admin/category/'.  $cat->id. '/edit')}}">{{ $cat->title }}</a>
							</td>
						
							<td>{{ $cat->slug }}</td>
							<td>{{ $cat->status }}</td>
							
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="3">No Data</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-sm-12">
			        <ul class="pagination">
			          <li><a href="#">&laquo;</a></li>
			          <li><a href="#">1</a></li>
			          <li><a href="#">2</a></li>
			          <li class="active"><a href="#">3</a></li>
			          <li><a href="#">4</a></li>
			          <li><a href="#">5</a></li>
			          <li><a href="#">&raquo;</a></li>
			        </ul>
			    </div>	
			</div>  						
		</div>
	</div>
</div>

@endsection