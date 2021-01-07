@extends('master')
@section('noiDung')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($type_left as $l)
							<li><a target="_self" href="{{route('loai-san-pham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$type_product->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($sp_theoloai)}} styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $loai)
								<div class="col-sm-4">
									
								</style>
									<div class="single-item">
										@if($loai->unit_price > $loai->promotion_price)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a target="_self" href="product.html"><img src="source/image/product/{{$loai->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$loai->name}}</p>
											<p class="single-item-price" style="font-size: 18px">
												@if($loai->unit_price > $loai->promotion_price)
													<span class="flash-del">{{$loai->unit_price}}</span>
													<span class="flash-sale">{{$loai->promotion_price}}</span>
												@else
													<span>{{$loai->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" target="_self" href="{{route('them-gio-hang',$loai->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" target="_self" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($sp_khac)}} styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $kh)
								<div class="col-sm-4">
									<div class="single-item">
										@if($kh->unit_price > $kh->promotion_price)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a target="_self" href="product.html"><img src="source/image/product/{{$kh->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$kh->name}}</p>
											<p class="single-item-price">
												@if($kh->unit_price > $kh->promotion_price)
													<span class="flash-del">{{$kh->unit_price}}</span>
													<span class="flash-sale">{{$kh->promotion_price}}</span>
												@else
													<span>{{$kh->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" target="_self" href="{{route('them-gio-hang',$kh->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" target="_self" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div class="link__new">{{$sp_khac->links('pagination::bootstrap-4')}}</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection