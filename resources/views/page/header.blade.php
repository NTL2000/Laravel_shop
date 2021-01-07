<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a target="_self" href=""><i target="_self" class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
						<li><a target="_self" href=""><i target="_self" class="fa fa-phone"></i> 0163 296 7751</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							<li><a target="_self" href="#">Chào {{Auth::user()->full_name}}</a></li>
							<li><a target="_self" href="{{route('dang-xuat')}}">Đăng xuất</a></li>
						@else
							<li><a target="_self" href="{{route('dang-ky')}}">Đăng kí</a></li>
							<li><a target="_self" href="{{route('dang-nhap')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a target="_self" href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" target="_self" id="searchform" action="{{route('tim-kiem')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i target="_self" class="fa fa-shopping-cart" target="_self"></i> Giỏ hàng {{Session('cart')?Session('cart')->totalQty:"trống"}}<i target="_self" class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item" style="display: flex ;justify-content: space-between">
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<span class="cart-item-amount">{{$product['qty']}}*<span>{{$product['item']['promotion_price']}}</span>
										</div>
									</div>
									<a class="delete__button" target="_self" href="{{route('xoa-gio-hang',$product['item']['id'])}}"><i target="_self" class="fas fa-trash" target="_self"></i></a>
								</div>
								@endforeach
								@endif

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice??0}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a target="_self" href="{{route('thanh-toan')}}" class="beta-btn primary text-center">Đặt hàng <i target="_self" class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i target="_self" class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a target="_self" href="{{route('trang-chu')}}">Trang chủ</a></li>
						<li><a target="_self" href="#">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
								<li><a target="_self" href="{{route('loai-san-pham',$loai->id)}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a target="_self" href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
						<li><a target="_self" href="{{route('lien-he')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->