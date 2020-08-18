@extends('layouts.master')

@section('title')
@parent
| Statistics
@stop

@section('content')

<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url('/assets_new/img/photos/stats.jpg');">
	<div class="bg-black-op-75">
		<div class="content content-center text-center">
			<div class="pt-50 pb-20">
				<h1 class="font-w700 text-white mb-10">ARTCC Statistics</h1>
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
			<span class="breadcrumb-item active">ARTCC Statistics</span>
		</nav>
	</div>
</div>
<!-- End Breadcrumb -->

<?php
	$mname = date("F", mktime(0, 0, 0, $month, 1, $year));
	if ($month == 1) { $pm = 12; $pyr = $year - 1; } else { $pm = $month -1; $pyr = $year; }
	if ($month == 12) { $nm = 1; $nyr = $year + 1; } else { $nm = $month + 1; $nyr = $year; }
?>

<!-- Main Container -->
<!-- Page Content -->
<div class="content">
	<!-- Quick Stats -->
	<h3>Atlanta ARTCC Quick Statistics</h3>
	<div class="row gutters-tiny">

		<div class="col-4 col-xl-4">
			<a class="block block-link-pop text-right bg-gd-emerald">
				<div class="block-content block-content-full clearfix border-black-op-b border-3x">
					<div class="float-left mt-10 d-none d-sm-block">
						<i class="si si-bar-chart fa-3x text-white"></i>
					</div>
					<div class="font-size-h3 font-w600 text-white">
						@if(!empty($all_stats['month']))
						<?php echo round ($all_stats['month']) ?>
						@else
						0
						@endif
					</div>
					<div class="font-size-sm font-w600 text-uppercase text-white-op"><?php echo date ("F"); ?> MTD Hours</div>
				</div>
			</a>
		</div>

		<div class="col-4 col-xl-4">
			<a class="block block-link-pop text-right bg-gd-leaf">
				<div class="block-content block-content-full clearfix border-black-op-b border-3x">
					<div class="float-left mt-10 d-none d-sm-block">
						<i class="si si-bar-chart fa-3x text-white"></i>
					</div>
					<div class="font-size-h3 font-w600 text-white">
						@if(!empty($all_stats['year']))
						<?php echo round ($all_stats['year'])?>
						@else
						0
						@endif
					</div>
					<div class="font-size-sm font-w600 text-uppercase text-white-op"><?php echo date ("Y"); ?> YTD Hours</div>
				</div>
			</a>
		</div>
		<div class="col-4 col-xl-4">
			<a class="block block-link-pop text-right bg-gd-sun">
				<div class="block-content block-content-full clearfix border-black-op-b border-3x">
					<div class="float-left mt-10 d-none d-sm-block">
						<i class="si si-bar-chart fa-3x text-white"></i>
					</div>
					<div class="font-size-h3 font-w600 text-white">
						@if(!empty($all_stats['total']))
						<?php echo round ($all_stats['total'])?>
						@else
						0
						@endif
					</div>
					<div class="font-size-sm font-w600 text-uppercase text-white-op">All-Time Hours</div>
				</div>
			</a>
		</div>
	</div>
	<!-- END Quick Stats -->
	<br />
 	<!-- Home Controller & Visiting Controller Tabs -->
	<h3><?=$mname?> 20<?=$year?> Controller Statistics</h3>
	<div class="row">
		<div class="col-lg-12">
			<a href="/stats/<?=$pyr?>/<?=$pm?>"><button type="button" class="btn btn-rounded btn-secondary min-width-125 mb-10"><i class="fa fa-fw fa-backward mr-5"></i>Previous Month</button></a>
			<div style="float: right;"><a href="/stats/<?=$nyr?>/<?=$nm?>" ><button type="button" class="btn btn-rounded btn-secondary min-width-125 mb-10"><i class="fa fa-fw fa-forward mr-5"></i> Next Month</button></a></div>
			<!-- Main Stats Tabs -->
			<div class="block">
				<ul class="nav nav-tabs nav-tabs-alt align-items-center" data-toggle="tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" href="#home">Home Controllers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#visiting">Visiting Controllers</a>
					</li>
				</ul>
				<div class="block-content tab-content">
					<div class="tab-pane active" id="home" role="tabpanel">
						<h4 class="font-w400">Home Controllers</h4>
						<div class="table-responsive">
						<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">CID</th>
                                            <th class="text-center">Rating</th>
                                            <th class="text-center">Local ATCT</th>
                                            <th class="text-center">TRACON</th>
                                            <th class="text-center">Center</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($home as $h)
											@if ($stats[$h->id]->total_hrs == "--")
											@else
											<tr>
												<td class="text-center">{{{$h->backwards_name}}}</td>
												<td class="text-center">{{{$h->id}}}</td>
												<td class="text-center">{{{$h->rating_short}}}</td>
												<td class="text-center">{{{$stats[$h->id]->local_hrs}}}</td>
												<td class="text-center">{{{$stats[$h->id]->approach_hrs}}}</td>
												<td class="text-center">{{{$stats[$h->id]->enroute_hrs}}}</td>
												<td class="text-center">{{{$stats[$h->id]->total_hrs}}}</td>
											</tr>
											@endif
                                        @empty
                                        <tr>
                                          <td colspan="7">No home controllers are available.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
						</div>

					</div>
					<div class="tab-pane" id="visiting" role="tabpanel">
						<h4 class="font-w400">Visiting Controllers</h4>
						<div class="table-responsive">
						<table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">CID</th>
                                            <th class="text-center">Rating</th>
                                            <th class="text-center">Local ATCT</th>
                                            <th class="text-center">TRACON</th>
                                            <th class="text-center">Center</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($visit as $h)
											@if ($stats[$h->id]->total_hrs == "--")
											@else
											<tr>
												<td class="text-center">{{{$h->backwards_name}}}</td>
												<td class="text-center">{{{$h->id}}}</td>
												<td class="text-center">{{{$h->rating_short}}}</td>
												<td class="text-center">{{{$stats[$h->id]->local_hrs}}}</td>
												<td class="text-center">{{{$stats[$h->id]->approach_hrs}}}</td>
												<td class="text-center">{{{$stats[$h->id]->enroute_hrs}}}</td>
												<td class="text-center">{{{$stats[$h->id]->total_hrs}}}</td>
											</tr>
											@endif
                                        @empty
                                        <tr>
                                          <td colspan="7">No home controllers are available.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
						</div>

					</div>
				</div>
			</div>
			<!-- END Main Stats Tabs -->
		</div>

	</div>
	<!-- END Home Controller & Visiting Controller Tabs -->

	</div>

<!-- END Page Content -->


@stop
