@extends('layouts.master')
@section('content')

	<div class="wrapper">

		<div class="row" style="margin-top:30px;">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">
					<div class="col-md-12">
						<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">{{ $cat->title }}</span></h3>
					</div>
					<div class="col-md-12">
						@foreach ($posts as $key=>$post )
						@if ($key ==0)
							
						<img src="{{ $post->image }}" width="100%" style="margin-bottom:15px;" />
						<p align="justify">{!! Str::substr($post->body, 0, 300) !!}</p><p><a href="{{ URL::to('post',$post->slug) }}">Read more &raquo;</a></p>
						@endif
						@endforeach
							
					</div>
					<div class="row">
						@foreach ($posts as $key=>$post )
						@if ($key >0 && $key <10)
						<div class="col-md-6">
							<img src="{{ $post->image }}" height="200px" width="100%" style="margin-bottom:15px;" />
							<p align="justify">{!! Str::substr($post->body, 0, 150) !!}</p><p><a href="{{ URL::to('post',$post->slug) }}">Read more &raquo;</a></p>
						</div>
						@endif
						@endforeach
						
					</div>            
				</div>        
			</div>

<!-- right section -->
<div class="col-md-4">
	<div class="col-md-12" style="padding:15px;">
		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">LATEST NEWS</span></h3>
		@foreach ($latest->take(10) as $let)
			
		<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
			<div class="col-md-4">
				<div class="row">
					<img src="{{ $let->image }}" width="100%" style="margin-left:-15px;" />
				</div>
			</div>
			<div class="col-md-8">
				<div class="row" style="padding-left:10px;">
					<a href="{{ url('post/'.$let->slug) }}"><h4>{{ $let->title }}</h4></a>
					
				</div>
			</div>
		</div>
		@endforeach
	
	</div>
	@if ($sidebartop)
	<p><a href="{{ $sidebartop->url }}"><img src="{{ $sidebartop->image }}" alt="{{ $sidebartop->title }}" width="100%" /></a></p>
	@endif
				@if ($sidebarbottom)
				<p><a href="{{ $sidebarbottom->url }}"><img src="{{ $sidebarbottom->image }}" alt="{{ $sidebarbottom->title }}" width="100%" /></a></p>
				@endif
</div> 
		</div> 
	</div>

@endsection