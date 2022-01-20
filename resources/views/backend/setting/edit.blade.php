@extends('layouts.admin')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-gear"></i>Settings</h1>
		</div>
        <img src="{{ $setting->image }}" alt="" class="img-responsive img-rounded">
		<div class="col-sm-4 cat-form">
			@if(count($errors) > 0 )


    <div class="alert alert-danger alert-dismissble fade in">

        <ul>

            @foreach($errors->all() as $error)


                <li>{{$error}}
				
					<a href="" class="close" data-dismis="alert">&times;</a>
				</li>


            @endforeach


        </ul>



    </div>




@endif











			@if (Session::has('message'))
			<div class="alert alert-success alert-dismissble fade in">
				{{ Session('message') }}
				<a href="" class="close" data-dismis="alert">&times;</a>
			</div>
				
			@endif
			<h3>Update Settings</h3>
		
			{!! Form::model($setting, ['method'=>'PATCH', 'action'=> ['adminSettingController@update', $setting->id],'files'=>true]) !!}
         
			@csrf
          
			<div class="form-group">
				{{-- {!! Form::label('image', 'Photo:') !!}
				{!! Form::file('image', null, ['class'=>'form-control'])!!} --}}


				<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
				<p><label class="btn btn-info" for="file" style="cursor: pointer;">LOGO </label></p>
				<p><img id="output" width="200" /></p>
			 </div>

            <div class="form-group">
                {!! Form::label('about', 'about:') !!}
                {!! Form::textarea('about', null, ['class'=>'form-control'])!!}
                
            
            </div>

			

	
				<div class="form-group">
                    {!! Form::label('social', 'Social:') !!}
                    {!! Form::text('social', null, ['class'=>'form-control'])!!}
                    <p class="text-muted">e.g http://fb.com/mdilius </p>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Update Settings</button>
				</div>
				{!! Form::close() !!}


		</div>

     
	</div>
</div>
<script>
	var loadFile = function(event) {
	  var image = document.getElementById('output');
	  image.src = URL.createObjectURL(event.target.files[0]);
	};
	</script>
@endsection