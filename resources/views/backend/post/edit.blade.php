@extends('layouts.admin')
@section('content')
  

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Edit Post</h1>
		</div>

		<div class="col-sm-12">
			<div class="row">
                {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['adminPostsController@update', $post->id],'files'=>true]) !!}
        
        
        @csrf
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" value="{{ $post->title }}" id="post_title" class="form-control" placeholder="Enter title here">				
						</div>
						<div class="form-group">
							<label>Slug</label>
							<input type="text"  name="slug" id="slug" class="form-control" >
							<p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
						</div>
          
						<div class="form-group">		
							<textarea class="form-control" id="editor" name="body" rows="15">{!! $post->body !!}</textarea>
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
						
						<div class="content cat-content">
							<h4>Category  <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4><hr>	
              @foreach ($categories as $cat)
                
              <p>
              <label for="{{ $cat->id }}">
              <input type="checkbox" value="{{ $cat->id }}" name="category_id" id="cat1" @if ($cat->id) chacked @endif >{{ $cat->title }}
              </label>
              </p>
              @endforeach

                </div>
                <div class="content featured-image">
                    <h4>Featured Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
                    @if ($post->image)
                    <p><img id="output" style="max-width: 100%" src="{{ $post->image }}"/></p>
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p><label class="btn btn-warning " for="file" style="cursor: pointer;">Featured Image </label></p>
                        
                    @else
                    <p><img id="output" style="max-width: 100%" /></p>
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p><label class="btn btn-warning " for="file" style="cursor: pointer;">Featured Image </label></p>  
                    @endif
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





<script>
	// auto image upload show
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
	</script>
  
@endsection