@extends('layouts.admin')
@section('content')
  

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add New Page</h1>
		</div>

		<div class="col-sm-12">
			<div class="row">
        {!! Form::open(['method'=>'POST', 'action'=> 'adminPagesController@store', 'files'=>true]) !!}
        @csrf
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" id="post_title" class="form-control" placeholder="Enter title here">				
						</div>
            
						<div class="form-group">
							<label>Slug</label>
							<input type="text" name="slug" id="slug" class="form-control" >
							<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
						</div>
						<div class="form-group">		
							<textarea class="form-control" id="editor" name="body" rows="15"></textarea>
							<div class="col-sm-12 word-count">Word count: 0</div>
						</div>	
					</div>
					<div class="col-sm-3">
						<div class="content publish-box">
							<h4>Publish  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
							<div class="form-group">
								<button name="status" value="draft" class="btn btn-default">Save Draft</button>
							</div>
							<p>Status: Draft <a href="#">Edit</a></p>
							<p>Visibility: Public <a href="#">Edit</a></p>
							<p>Publish: Immediately <a href="#">Edit</a></p>
							<div class="row">
								<div class="col-sm-12 main-button">
									<button name="status" value="published" class="btn btn-primary pull-right">Publish</button>
								</div>
							</div>	
						</div>
					
					
					</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	CKEDITOR.replace( 'editor', {
		filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
		filebrowserUploadMethod: 'form'
	});
	</script>

  
@endsection