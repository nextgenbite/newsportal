@extends('layouts.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-gear"></i> Settings</h1>
		</div>
		
		<div class="col-sm-4 cat-form">
			
			@if (Session::has('message'))
			<div class="alert alert-success alert-dismissble fade in">
				{{ Session('message') }}
				<a href="" class="close" data-dismis="alert">&times;</a>
			</div>
				
			@endif
			<h3>Website Settings</h3>
            
			{!! Form::open(['method'=>'POST', 'action'=> 'adminSettingController@store', 'files'=>true]) !!}
			@csrf
				<div class="form-group">
					<label>Logo</label>
					<input type="file" name="image"  class="form-control">
				</div>

				<div class="form-group">
					<label>About Us</label>
                    <textarea class="form-control" name="about" id="" cols="30" rows="10"></textarea>
				</div>
                <div id="socialFiledGroup">
                    <div class="form-group">
                        <label>Social</label>
                        {{-- <input type="url" name="social[]" class="form-control"> --}}
                        <input type="url" name="social" class="form-control">
                        <p class="text-muted">e.g http://fb.com/mdilius </p>
                    </div>    
                </div>
                <div class="text-right from-group">
                    <span class="btn btn-warning" id="addSocialField">
                        <i class="fa fa-plus"></i>
                    </span>
                </div>
				<div class="form-group">
                    <div class="alert alert-danger alert-dismissable noshow" id="socialAlert">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <strong>sorry!</strong>You've reached the social fields limit.</div>
                </div>
				<div class="form-group">
					<button class="btn btn-primary">Add New Setting</button>
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
						
							
						@foreach ($setting as $set )
							
						<tr>
							<td>
								<input type="checkbox" name="select-cat"> 
								{{-- <a href="{{URL::to('admin/category/'.  $set->id. '/edit')}}">{{ $set->title }}</a> --}}
							</td>
						
							<td>{{ $set->about }}</td>
							<td>{{ $set->social }}</td>
							<td><img height="50px" src="{{ $set->image }}" alt=""></td>
							<td><a class="btn btn-info" href="{{URL::to('admin/settings/'.  $set->id. '/edit')}}">view</a></td>
						</tr>
		
						@endforeach
			
					
				
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
</div>
<style>
    .noshow{
        display: none;
    }
</style>
<script>
 
     var socialCounter = 1;
    $('#addSocialField').click(function(){
        socialCounter++;
         if(socialCounter >5){
        $('#socialAlert').removeClass('noshow');
        return;
       }
        newDiv=$(document.createElement('div')).attr("class", "form-group");
        newDiv.after().html(' <input type="url" name="social[]" class="form-control"></div>');
        newDiv.appendTo("#socialFiledGroup"); 
    })

    

</script>

@endsection