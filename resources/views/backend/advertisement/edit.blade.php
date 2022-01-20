@extends('layouts.admin')
@section('content')
  

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> Edit Advertisement</h1>
		</div>

		<div class="col-sm-8">
			<div class="row">
                {!! Form::model($adv, ['method'=>'PATCH', 'action'=> ['adminAdvController@update', $adv->id],'files'=>true]) !!}
        			 @csrf
					<div class="col-sm-9">
						<div class="form-group">	
							<input type="text" name="title" value="{{ $adv->title }}" class="form-control" placeholder="Enter title here">				
						</div>
						<div class="form-group">
							<label>Url</label>
							<input type="text" value="{{ $adv->url }}" name="url" class="form-control" >
						
						</div>
          
                <div class="content featured-image">
                    <h4>Featured Image <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
                    @if ($adv->image)
                    <p><img id="output" style="max-width: 40%" src="{{ $adv->image }}"/></p>
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p><label  for="file" style="cursor: pointer;">Featured Image </label></p>
                        
                    @else
                    <p><img id="output" style="max-width: 40%" /></p>
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p><label class="btn btn-warning " for="file" style="cursor: pointer;">Featured Image </label></p>  
                    @endif
                </div>
				<div class="from-group">
					<label for="location">Location</label>
					<select class="form-control" name="location" id="">
						<option value="{{ $adv->location }}">{{ strtoupper($adv->location) }}</option>
						@if ($adv->location != 'leaderboard')
						<option value="leaderboard">Leaderboard</option>
						@endif
						@if ($adv->location != 'sidebar-top')
						<option value="sidebar-top">Sidebar-top</option>
						@endif
						@if ($adv->location != 'sidebar-bottom')
						<option value="sidebar-bottom">Sidebar-bottom</option>
						@endif
						
					</select>
				</div>
				<div class="from-group">
					<label for="status">Status</label>
					<select class="form-control" name="status" id="">
						<option value="{{ $adv->status }}">{{ $adv->status }}</option>
						@if ($adv->status != 'display')
						<option value="display">Display</option>
						@endif
						@if ($adv->status != 'hide')
						<option value="hide">Hide</option>
						@endif
					   
					</select>
				</div>
				<div class="form-group"><button class="btn btn-primary" type="submit">Update Advertisement</button></div>
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