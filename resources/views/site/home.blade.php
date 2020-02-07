@extends('layouts.master')

@section('title')
@parent| Home @stop

@section('content')

 <!-- Main Container -->
				@if(Auth::guest())
			
				<!-- Slideshow container -->
			
					<div class="bg-image" style="background-image: url('/assets_new/img/photos/hp-bg.jpg')">
			
                    <div class="hero bg-black-op-25">
					<div class="hero-inner">
                        <div class="content content-full text-center">
                                <h1 class="display-3 font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInDown">Welcome to Atlanta</h1>
                                <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown">Part of VATUSA and VATSIM</h2>
                                <!--<a class="btn btn-hero btn-noborder btn-rounded btn-success mr-5 mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="#">
                                    <i class="fa fa-info mr-10"></i> About Us
                                </a>
                                <a class="btn btn-hero btn-noborder btn-rounded btn-primary mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="#">
                                    <i class="fa fa-user mr-10"></i> Join Us
                                </a>-->
                            </div>
					</div>
					</div>
                </div>
				
				
				@else
				<div class="bg-image" style="background-image: url('/assets_new/img/photos/hp-bg.jpg')">
                    <div class="hero bg-black-op-25">
					<div class="hero-inner">
                        <div class="content content-full text-center">
                                <h1 class="display-3 font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInDown">Welcome Back to Atlanta, {{Auth::user()->fname}}.</h1>
                                <h2 class="font-w400 text-white-op mb-50 invisible" data-toggle="appear" data-class="animated fadeInDown"> 
							
                                <a class="btn btn-hero btn-noborder btn-rounded btn-primary mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp" href="/profile">
                                    <i class="fa fa-user mr-10"></i> My Profile
                                </a>
                            </div>
					</div>
					</div>
                </div>
				@endif
                <div class="content">
					
					<!-- Left Column -->
                    <div class="row items-push py-30">
                        <div class="col-xl-8">
							
							<!-- Top Controllers Module -->
							<h2 class="content-heading-hp">Top <?php echo date ("F"); ?> Controllers <small>By number of hours.</small></h2>
							<div class="row">
								 <?php $pos=0 ?>
								@if (count($currentTop3) == 3)
									@foreach($currentTop3 as $controller)
										<?php $pos++ ?>
										@if ($pos == 1)
											<div class="col-md-6 col-xl-4"><a class="block block-link-pop bg-gd-sun text-center"><div class="block-content block-content-full"><img class="img-avatar" src="/storage/files/"+$controller->cid alt="Profile Picture"></div><div class="block-content block-content-full bg-black-op-5"><div class="font-w600 text-white mb-5">{{{ $controller->fname . " " . $controller->lname }}}</div><div class="font-size-sm text-white-op">{{{ $controller->duration_time }}}</div></div><div class="block-content block-content-full block-content-sm"><span class="font-w600 font-size-sm text-warning-light"><i class="fa fa-hourglass mr-10"></i>First Place</span></div></a></div>
										@elseif ($pos == 2)
											<div class="col-md-6 col-xl-4"><a class="block block-link-pop bg-muted text-center"><div class="block-content block-content-full"><img class="img-avatar" src="/assets_new/img/avatars/avatar8.jpg" alt="Profile Picture"></div><div class="block-content block-content-full bg-black-op-5"><div class="font-w600 text-white mb-5">{{{ $controller->fname . " " . $controller->lname }}}</div><div class="font-size-sm text-white-op">{{{ $controller->duration_time }}}</div></div><div class="block-content block-content-full block-content-sm"><span class="font-w600 font-size-sm text-white-op"><i class="fa fa-hourglass-half mr-10"></i>Second Place</span></div></a></div>
										@elseif ($pos == 3)
											<div class="col-md-6 col-xl-4"><a class="block block-link-pop bg-elegance-dark text-center"><div class="block-content block-content-full"><img class="img-avatar" src="/assets_new/img/avatars/avatar8.jpg" alt="Profile Picture"></div><div class="block-content block-content-full bg-black-op-5"><div class="font-w600 text-white mb-5">{{{ $controller->fname . " " . $controller->lname }}}</div><div class="font-size-sm text-white-op">{{{ $controller->duration_time }}}</div></div><div class="block-content block-content-full block-content-sm"><span class="font-w600 font-size-sm text-white-op"><i class="fa fa-hourglass-o mr-10"></i>Third Place</span></div></a></div>
										@endif
									@endforeach
								@elseif (count($currentTop3) == 2)
									@foreach($currentTop3 as $controller)
										<?php $pos++ ?>
										@if ($pos == 1)
											<div class="col-md-6 col-xl-6"><a class="block block-link-pop bg-gd-sun text-center"><div class="block-content block-content-full"><img class="img-avatar" src="/assets_new/img/avatars/avatar8.jpg" alt="Profile Picture"></div><div class="block-content block-content-full bg-black-op-5"><div class="font-w600 text-white mb-5">{{{ $controller->fname . " " . $controller->lname }}}</div><div class="font-size-sm text-white-op">{{{ $controller->duration_time }}}</div></div><div class="block-content block-content-full block-content-sm"><span class="font-w600 font-size-sm text-warning-light"><i class="fa fa-hourglass mr-10"></i>First Place</span></div></a></div>
										@elseif ($pos == 2)
											<div class="col-md-6 col-xl-6"><a class="block block-link-pop bg-muted text-center"><div class="block-content block-content-full"><img class="img-avatar" src="/assets_new/img/avatars/avatar8.jpg" alt="Profile Picture"></div><div class="block-content block-content-full bg-black-op-5"><div class="font-w600 text-white mb-5">{{{ $controller->fname . " " . $controller->lname }}}</div><div class="font-size-sm text-white-op">{{{ $controller->duration_time }}}</div></div><div class="block-content block-content-full block-content-sm"><span class="font-w600 font-size-sm text-white-op"><i class="fa fa-hourglass-half mr-10"></i>Second Place</span></div></a></div>
										@endif
									@endforeach
								@elseif (count($currentTop3) == 1)
									@foreach($currentTop3 as $controller)
										<?php $pos++ ?>
										@if ($pos == 1)
											<div class="col-md-6 col-xl-12"><a class="block block-link-pop bg-gd-sun text-center"><div class="block-content block-content-full"><img class="img-avatar" src="/assets_new/img/avatars/avatar8.jpg" alt="Profile Picture"></div><div class="block-content block-content-full bg-black-op-5"><div class="font-w600 text-white mb-5">{{{ $controller->fname . " " . $controller->lname }}}</div><div class="font-size-sm text-white-op">{{{ $controller->duration_time }}}</div></div><div class="block-content block-content-full block-content-sm"><span class="font-w600 font-size-sm text-warning-light"><i class="fa fa-hourglass mr-10"></i>First Place</span></div></a></div>
										@endif
									@endforeach
								@else
									<div class="col-md-6 col-xl-12"><a class="block block-transparent text-center bg-gd-primary"><div class="block-content bg-black-op-5"><p class="font-w600 text-white">No controllers have logged hours this month</p></div><div class="block-content"><p><i class="fa fa-exclamation-triangle fa-4x text-white-op"></i></p></div></a></div>
								@endif
							</div>

						<!-- END Top Controllers Module -->
							
							<!-- Notices -->
                    		<h2 class="content-heading-hp">News </h2>
							
                          		@foreach($news as $n)
								<a class="block block-rounded block-link-shadow" href="/news/view/{{ $n->id }}">
									<div class="block-content block-content-full">
										<p class="font-size-sm text-muted float-sm-right mb-5"><em>{{$n->date}}</em></p>
										<h4 class="font-size-default text-primary mb-0">
											<i class="fa fa-newspaper-o text-muted mr-5"></i> {{$n->title}}
										</h4>
									</div>
								</a>
								@endforeach
							
							<!-- END Notices -->
							
							<!-- Events -->
                    		<h2 class="content-heading-hp">Events</h2>
							<div class="row">
							@if(Auth::guest())
							@forelse ($events as $e)
									@if($e->banner_path == null)
									
									<div class="col-12">
										<div class="block">
											<div class="block-content">
												<p>{{{$e->title}}}</a></p>
											</div>
										</div>
									</div>
									@else
									<div class="col-12">
										<div class="block">
											<div class="block-content">
												<p><img src="{{ $e->banner_path }}" width="500px" alt="{{ $e->name }}"></a></p>
											</div>
										</div>
									</div>
									@endif
									@empty
									<div class="col-md-12 col-xl-12">
										<div class="block-content block-content-full">
											<div class="py-50 text-center bg-white-op-25">
												<div class="font-size-h2 font-w700 mb-0 text-primary"><i class="fa fa-calendar-times-o text-muted mr-5"></i></div>
												<div class="font-size-h2 font-w700 mb-0 text-primary">No events scheduled</div>
												<div class="font-size-sm font-w600 text-uppercase">Check back soon!</div>
											</div>
										</div>
									</div>
									@endforelse
								
							@else
							
								   @forelse ($events as $e)
									@if($e->banner_path == null)
									
									<div class="col-12">
										<div class="block">
											<div class="block-content">
												<p><a href="/event/{{{$e->id}}}">{{{$e->title}}}</a></p>
											</div>
										</div>
									</div>
									@else
									<div class="col-12">
										<div class="block">
											<div class="block-content">
												<p><a href="/event/{{{$e->id}}}"><img src="{{ $e->banner_path }}" width="500px" alt="{{ $e->name }}"></a></p>
											</div>
										</div>
									</div>
									@endif
								
									@empty
									
									<div class="col-md-12 col-xl-12">
										<div class="block-content block-content-full">
											<div class="py-50 text-center bg-white-op-25">
												<div class="font-size-h2 font-w700 mb-0 text-primary"><i class="fa fa-calendar-times-o text-muted mr-5"></i></div>
												<div class="font-size-h2 font-w700 mb-0 text-primary">No events scheduled</div>
												<div class="font-size-sm font-w600 text-uppercase">Check back soon!</div>
											</div>
										</div>
									</div>
									@endforelse
						
							@endif
							</div>
                        	<!-- END Events -->
							<hr class="d-xl-none">
                        </div>
						<!-- END Left Column -->

                        <!-- Right Column -->
                        <div class="col-xl-4">
							
							
							
							<!-- Table for Online Facilities -->
							<div class="block">
								<div class="block-header block-header-default">
									<h3 class="block-title"> <i class="si si-earphones mr-10"></i>Facilities</h3>
								</div>
								<div class="block-content" style="padding-top:0px;">
										<table class="table table-borderless table-vcenter" style="text-align: center">
											<tbody>
												<tr align="center" style="border-bottom:1px solid lightgrey;">
													<th style="vertical-align:middle; text-align:center;">Facility</th>
													<th style="vertical-align:middle; text-align:center;">Status</th>
												</tr>
												<tr align="center">
												@if($atl_ctr === 1)
													<td>Atlanta Center</td><td>
													<span class="badge badge-success">Online</span></td></tr>
												@else
													<td>Atlanta Center</td><td>
													<span class="badge badge-danger">Offline</span></td></tr>
												@endif
												@if($atl_app === 1)
													<td>A80 TRACON</td><td>
													<span class="badge badge-success">Online</span></td></tr>
												@else
													<td>A80 TRACON</td><td>
													<span class="badge badge-danger">Offline</span></td></tr>
												@endif
												@if($atl_twr === 1)
													<td>ATL ATCT</td><td>
													<span class="badge badge-success">Online</span></td></tr>
												@else
													<td>ATL ATCT</td><td>
													<span class="badge badge-danger">Offline</span></td></tr>
												@endif
												@if($clt_twr === 1)
													<td>CLT ATCT</td><td>
													<span class="badge badge-success">Online</span></td></tr>
												@else
													<td>CLT ATCT</td><td>
													<span class="badge badge-danger">Offline</span></td></tr>
												@endif
												
												</tbody>
										</table>
								</div>
							</div>
							<!-- END Table for Online Facilities -->

							<!-- Table for Online Controllers -->
							<div class="block">
								<div class="block-header block-header-default">
									<h3 class="block-title"> <i class="fa fa-user mr-10"></i>ZTL Controllers Online</h3>
								</div>
								<div class="block-content">
									@if($controllers->count() == 0)
									<center>There are no controllers online.</center><br />
									@elseif($controllers->count() == 1)
									<table class="table table-borderless table-vcenter" style="text-align: center">
											<tbody>
												<tr align="center" style="border-bottom:1px solid lightgrey;">
													<th style="vertical-align:middle; text-align:center;">Position</th>
													<th style="vertical-align:middle; text-align:center;">Controller</th>
													<th style="vertical-align:middle; text-align:center;">Duration</th>
												</tr>
												@foreach($controllers as $controller)
													<tr align="center">
														<td style="vertical-align:middle;">{{ $controller->atc }}</td>
														<td style="vertical-align:middle;">
															@if($controller->controller)
																{{ $controller->controller->full_name }}
															@else
																{{ $controller->name }}
															@endif
														</td>
														<td style="vertical-align:middle;">{{ $controller->duration() }}</td>
													</tr>
												@endforeach
											</tbody>
									</table>
									<center>There is 1 controller online!</center><br />
									@else
									<table class="table table-borderless table-vcenter" style="text-align: center">
											<tbody>
												<tr align="center" style="border-bottom:1px solid lightgrey;">
													<th style="vertical-align:middle; text-align:center;">Position</th>
													<th style="vertical-align:middle; text-align:center;">Controller</th>
													<th style="vertical-align:middle; text-align:center;">Time Online</th>
												</tr>
												@foreach($controllers as $controller)
													<tr align="center">
														<td style="vertical-align:middle;">{{ $controller->position }}</td>
														<td style="vertical-align:middle;">{{ $controller->name }}</td>
														<td style="vertical-align:middle;">{{ $controller->time_online }}</td>
												@endforeach
												</tbody>
									</table>
									<center>There are {{$controllers->count()}} controllers online!</center><br />
									@endif
								</div>
							</div>
							<!-- END Table for Online Controllers -->
							<!-- Table for Weather -->
							<div class="block">
								<div class="block-header block-header-default">
									<h3 class="block-title"> <i class="fa fa-user mr-10"></i>Weather</h3>
								</div>
								<div class="block-content">
									@if($airports->count() == 0)
									<center>No airport to show.</center><br />
									@elseif($airports->count() > 0)
									<table class="table table-borderless table-vcenter" style="text-align: center">
											<tbody>
												<tr align="center" style="border-bottom:1px solid lightgrey;">
													<th style="vertical-align:middle; text-align:center;">Airport ICAO</th>
													<th style="vertical-align:middle; text-align:center;">Condition</th>
													
												</tr>
												@foreach($airports as $a)
													<tr align="center">
														<td style="vertical-align:middle;">{{ $a->ltr_4 }}</td>
														<td><button type="button" class="btn btn-alt-{{$a->visual_conditions}}" data-toggle="popover" title="{{$a->ltr_4}} METAR" data-placement="top" data-content="{{$a->metar}}">{{$a->visual_conditions}}</button></td></tr>
													
												@endforeach
												</tbody>
									</table>
								
									@endif
								</div>
							</div>
									

@stop
