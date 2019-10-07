<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						@if($active=='dashboard')
						<li><a href="/admin" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@else
						<li><a href="/admin"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@endif

						@if($active=='user')
						<li><a href="/user" class="active"><i class="lnr lnr-user"></i> <span>User</span></a></li>
						@else
						<li><a href="/user"><i class="lnr lnr-user"></i> <span>User</span></a></li>
						@endif

						@if($active=='product')
						<li><a href="/product" class="active"><i class="lnr lnr-user"></i> <span>Product</span></a></li>
						@else
						<li><a href="/product"><i class="lnr lnr-user"></i> <span>Product</span></a></li>
						@endif

						@if($active=='customer')
						<li><a href="/customer" class="active"><i class="lnr lnr-user"></i> <span>Customer</span></a></li>
						@else
						<li><a href="/customer"><i class="lnr lnr-user"></i> <span>Customer</span></a></li>
						@endif

						@if($active=='brands')
						<li><a href="/brands" class="active"><i class="lnr lnr-user"></i> <span>Brands</span></a></li>
						@else
						<li><a href="/brands"><i class="lnr lnr-user"></i> <span>Brands</span></a></li>
						@endif

						@if($active=='order')
						<li><a href="/order" class="active"><i class="lnr lnr-user"></i> <span>Order</span></a></li>
						@else
						<li><a href="/order"><i class="lnr lnr-user"></i> <span>Order</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>