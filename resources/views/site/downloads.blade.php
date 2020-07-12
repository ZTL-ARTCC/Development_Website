@extends('layouts.master')



@section('title')

@parent

| Documents and Downloads

@stop



@section('content')

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/docs.jpg');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">Documents and Downloads</h1>
				<h2 class="h4 font-w400 text-white-op">Atlanta ARTCC</h2>
			</div>
		</div>
	</div>
</div>
<!-- END Hero -->

<!-- Breadcrumb -->
<div class="bg-body-light border-b">
	<div class="content py-5 text-center">
		<nav class="breadcrumb bg-body-light mb-0">
			<a class="breadcrumb-item" href="/">Home</a>
			<span class="breadcrumb-item active">Controller</span>
			<span class="breadcrumb-item active">Documents and Downloads</span>
		</nav>
	</div>
</div>
<!-- End Breadcrumb -->

<!-- Main Content -->
<div class="content content-full nice-copy-story">
	<div class="row justify-content-center py-30">
		<div class="col-lg-10">

		<div class="js-filter" data-speed="400">
		<div class="p-10 bg-white push">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#" data-category-link="all">
						<i class="fa fa-fw fa-files-o mr-5"></i> All Files
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-category-link="vrc">
						<i class="fa fa-fw fa-file-archive-o mr-5"></i> VRC
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-category-link="vstars">
						<i class="fa fa-fw fa-file-archive-o mr-5"></i> vSTARS
					</a>
				</li>
				 <li class="nav-item">
					<a class="nav-link" href="#" data-category-link="veram">
						<i class="fa fa-fw fa-file-archive-o mr-5"></i> vERAM
					</a>
				</li>
				 <li class="nav-item">
					<a class="nav-link" href="#" data-category-link="vatis">
						<i class="fa fa-fw fa-file-archive-o mr-5"></i> vATIS
					</a>
				</li>
				 <li class="nav-item">
					<a class="nav-link" href="#" data-category-link="sop">
						<i class="fa fa-fw fa-files-o mr-5"></i> SOPs
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-category-link="loa">
						<i class="fa fa-fw fa-files-o mr-5"></i> LOAs
					</a>
				</li>
			</ul>
		</div>
		<div class="row">
			@foreach ($vrc as $v)
			<div class="col-md-6 col-xl-6" data-category="vrc">
			<a class="block block-rounded block-link-shadow" href="{{ $v->path }}">
				<div class="block-content block-content-full text-center">
					<div class="item item-2x item-circle bg-success-light text-success mx-auto my-20">
						VRC
					</div>
					<div class="block-content block-content-full bg-body-light text-center">
						<div class="font-size-lg">{{{$v->name}}}</div>
						<div class="font-size-sm text-muted">Last Update: {{{$v->updated_at}}}z</div>
						@if(empty($v->comments))
						<div class="font-size-sm text-muted">No description available.</div>
						@else
						<div class="font-size-sm text-muted">{{{$v->comments}}}</div>
						@endif
					</div>
				</div>
			</a>
			</div>
			@endforeach
			
			@foreach ($vstars as $v)
			<div class="col-md-6 col-xl-6" data-category="vstars">
			<a class="block block-rounded block-link-shadow" href="{{ $v->path }}">
				<div class="block-content block-content-full text-center">
					<div class="item item-2x item-circle bg-info-light text-info mx-auto my-20">
						vSTARS
					</div>
					<div class="block-content block-content-full bg-body-light text-center">
						<div class="font-size-lg">{{{$v->name}}}</div>
						<div class="font-size-sm text-muted">Last Update: {{{$v->updated_at}}}z</div>
						@if(empty($v->comments))
						<div class="font-size-sm text-muted">No description available.</div>
						@else
						<div class="font-size-sm text-muted">{{{$v->comments}}}</div>
						@endif
					</div>
				</div>
			</a>
			</div>
			@endforeach
			
			@foreach ($veram as $v)
			<div class="col-md-6 col-xl-6" data-category="veram">
			<a class="block block-rounded block-link-shadow" href="{{ $v->path }}">
				<div class="block-content block-content-full text-center">
					<div class="item item-2x item-circle bg-warning-light text-warning mx-auto my-20">
						vERAM
					</div>
					<div class="block-content block-content-full bg-body-light text-center">
						<div class="font-size-lg">{{{$v->name}}}</div>
						<div class="font-size-sm text-muted">Last Update: {{{$v->updated_at}}}z</div>
						@if(empty($v->comments))
						<div class="font-size-sm text-muted">No description available.</div>
						@else
						<div class="font-size-sm text-muted">{{{$v->comments}}}</div>
						@endif
					</div>
				</div>
			</a>
			</div>
			@endforeach
			
			@foreach ($vatis as $v)
			<div class="col-md-6 col-xl-6" data-category="vatis">
			<a class="block block-rounded block-link-shadow" href="{{ $v->path }}">
				<div class="block-content block-content-full text-center">
					<div class="item item-2x item-circle bg-secondary text-secondary-light mx-auto my-20">
						vATIS
					</div>
					<div class="block-content block-content-full bg-body-light text-center">
						<div class="font-size-lg">{{{$v->name}}}</div>
						<div class="font-size-sm text-muted">Last Update: {{{$v->updated_at}}}z</div>
						@if(empty($v->comments))
						<div class="font-size-sm text-muted">No description available.</div>
						@else
						<div class="font-size-sm text-muted">{{{$v->comments}}}</div>
						@endif
					</div>
				</div>
			</a>
			</div>
			@endforeach
			
			@foreach ($sop as $s)
			<div class="col-md-6 col-xl-6" data-category="sop">
			<a class="block block-rounded block-link-shadow" href="{{ $s->path }}">
				<div class="block-content block-content-full text-center">
					<div class="item item-2x item-circle bg-danger-light text-danger mx-auto my-20">
						<i class="fa fa-file-pdf-o"></i>
					</div>
					<div class="block-content block-content-full bg-body-light text-center">
						<div class="font-size-lg">{{{$s->name}}}</div>
						<div class="font-size-sm text-muted">Last Update: {{{$s->updated_at}}}z</div>
						@if(empty($s->comments))
						<div class="font-size-sm text-muted">No description available.</div>
						@else
						<div class="font-size-sm text-muted">{{{$s->comments}}}</div>
						@endif
					</div>
				</div>
			</a>
			</div>
			@endforeach
			
			@foreach ($loa as $v)
			<div class="col-md-6 col-xl-6" data-category="loa">
			<a class="block block-rounded block-link-shadow" href="{{ $v->path }}">
				<div class="block-content block-content-full text-center">
					<div class="item item-2x item-circle bg-info-light text-info mx-auto my-20">
						<i class="fa fa-file-pdf-o"></i>
					</div>
					<div class="block-content block-content-full bg-body-light text-center">
						<div class="font-size-lg">{{{$v->name}}}</div>
						<div class="font-size-sm text-muted">Last Update: {{{$v->updated_at}}}z</div>
						@if(empty($v->comments))
						<div class="font-size-sm text-muted">No description available.</div>
						@else
						<div class="font-size-sm text-muted">{{{$v->comments}}}</div>
						@endif
					</div>
				</div>
			</a>
			</div>
			@endforeach
		
	  </div>
<!-- END Files Filtering -->
	</div>
</div>
</div>
<!-- END Story -->

<!-- END Page Content -->
</div>
<!-- END Main Container -->

@stop

