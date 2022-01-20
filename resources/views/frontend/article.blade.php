@extends('layouts.master')
@section('title')
<title>{{ $post->title }}|TheDailyNews</title>
@endsection
@section('content')

	<div class="wrapper">
			<div class="col-md-8">
				<div class="col-md-12" style="padding:15px 15px 30px 0px;">	
					<h3 style="color:black ">{{ $post->title }}</h3>			
					<div class="col-md-12">
						<div class="text-right"><h4><i class="fa fa-eye"></i>{{ $post->views +1 }}
						@if ( $post->views  !=0)
						Views	
						@else
						View	
						@endif
						</h4></div>
						
						<img height="400px" src="{{ $post->image }}" width="100%" style="margin-bottom:15px;" />
						<p align="justify">{!! $post->body !!}</p>
					</div>	
				<div class="share-this">
					<h3 style="color:black ">Share This...</h3>
		<div class="col-md-12">
			<div class="fb-share-button" data-href="{{ url('post/'.$post->slug) }}" data-layout="button_count" data-size="small"></div>
			<span class="tweet-btn">
				<a class="twitter-share-button"
			href="https://twitter.com/intent/tweet" data-size="small">
			Tweet</a></span>
			
			<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
			<script type="IN/Share" data-url="{{ url('post/'.$post->slug) }}"></script>
		</div>
				</div>
						<div class="col-md-12 also-like">
							<h3>You May Also Like</h3>
						</div>	
						@foreach ($related->take(3) as $re)
							
						<div class="col-md-4">
							<img height="70%" src="{{ $re->image }}" width="100%" style="margin-bottom:15px;" />
							<h4><a href="{{ url('post/'.$re->slug) }}">{{ $re->title }}</a></h4>
							<p align="justify">{!! Str::substr($re->body, 0, 200) !!}</p>
						</div>
						@endforeach		
						
				
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