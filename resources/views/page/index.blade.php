@extends('master')
@section('noiDung')
	
	<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
									@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        	</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($new_product)}} styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $n)
								<div class="col-sm-3">
									<div class="single-item">
										@if($n->promotion_price < $n->unit_price)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a target="_self" href="{{route('san-pham',$n->id)}}" target="_self"><img src="source/image/product/{{$n->image}}"  alt=""  height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$n->name}}</p>
											@if($n->promotion_price == $n->unit_price)
											<p class="single-item-price">
												<span>{{$n->unit_price}}</span>
											</p>
											@else
											<p class="single-item-price">
												<span class="flash-del">{{$n->unit_price}}</span>
												<span class="flash-sale">{{$n->promotion_price}}</span>
											</p>
											@endif
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" target="_self"  href="{{route('them-gio-hang',$n->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" target="_self" href="{{route('san-pham',$n->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								<div class="link__new">{{$new_product->links('pagination::bootstrap-4')}}</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($top_product)}} styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@for($i=0;$i<4;$i++)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a target="_self" href="{{route('san-pham',$top_product[$i]->id)}}"><img src="source/image/product/{{$top_product[$i]->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$top_product[$i]->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$top_product[$i]->unit_price}}</span>
												<span class="flash-sale">{{$top_product[$i]->promotion_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('them-gio-hang',$top_product[$i]->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('san-pham',$top_product[$i]->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endfor
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
								@for($i=4;$i<8;$i++)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a target="_self" href="{{route('san-pham',$top_product[$i]->id)}}"><img src="source/image/product/{{$top_product[$i]->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$top_product[$i]->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$top_product[$i]->unit_price}}</span>
												<span class="flash-sale">{{$top_product[$i]->promotion_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('them-gio-hang',$top_product[$i]->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('san-pham',$top_product[$i]->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endfor
							</div>
							<div class="link__new">{{$top_product->links('pagination::bootstrap-4')}}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection