@extends('layouts.master')
@section('title')
<title>{{ $page->title }}|TheDailyNews</title>
@endsection
@section('content')

	<div class="wrapper container-fluid">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">				
					<div class="col-md-12">
					
						<h2 class="text-uppercase">{{ $page->title }}</h2>
						
						<p align="justify">{!! $page->body !!}</p>
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
								<a href="{{ url('page/'.$let->slug) }}"><h4>{{ $let->title }}</h4></a>
								
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
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" nonce="FJn8Klbk"></script>


		<script>window.twttr = (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
			  t = window.twttr || {};
			if (d.getElementById(id)) return t;
			js = d.createElement(s);
			js.id = id;
			js.src = "https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js, fjs);
		  
			t._e = [];
			t.ready = function(f) {
			  t._e.push(f);
			};
		  
			return t;
		  }(document, "script", "twitter-wjs"));</script>
		
@endsection