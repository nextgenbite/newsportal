@extends('layouts.admin')
@section('content')
  

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Add Advertisement</h1>
		</div>

		<div class="col-sm-8">
			<div class="row">
        {!! Form::open(['method'=>'POST', 'action'=> 'adminAdvController@store', 'files'=>true]) !!}
        
        @csrf
					<div class="col-sm-12">
						<div class="form-group">	
							<input type="text" name="title"  class="form-control" placeholder="Enter title here">				
						</div>
						<div class="form-group">
							<label>Url</label>
							<input type="url" name="url" placeholder="Enter url here" class="form-control" >
						</div>
						<div class="form-group content featured-image">
							<h4>Advertisement Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
              <p><img id="output" style="max-width: 100%" /></p>
              <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
              <p><label for="file" style="cursor: pointer;">Upload Image </label></p>
          	</div>
			  <div class="from-group">
				  <label for="location">Location</label>
				  <select class="form-control" name="location" id="">
					  <option value="leaderboard">Leaderboard</option>
					  <option value="sidebar-top">Sidebar-top</option>
					  <option value="sidebar-bottom">Sidebar-bottom</option>
				  </select>
			  </div>
			  <div class="from-group">
				  <label for="status">Status</label>
				  <select class="form-control" name="status" id="">
					  <option value="display">Display</option>
					 
					  <option value="hide">Hide</option>
				  </select>
			  </div>
			  <div class="form-group"><button class="btn btn-primary" type="submit">Add Advertisement</button></div>
					</div>
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>




<script>
	// auto image upload show
	var loadFile = function(event) {
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(event.target.files[0]);
	};
	</script>
  
@endsection