@extends('master')
@section('noiDung')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $n)
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
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection