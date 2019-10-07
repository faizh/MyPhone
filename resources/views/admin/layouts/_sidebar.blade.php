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
						<li><a href="/admin/user" class="active"><i class="lnr lnr-user"></i> <span>User</span></a></li>
						@else
						<li><a href="/admin/user"><i class="lnr lnr-user"></i> <span>User</span></a></li>
						@endif

						@if($active=='product')
						<li><a href="/admin/product" class="active"><i class="lnr lnr-user"></i> <span>Product</span></a></li>
						@else
						<li><a href="/admin/product"><i class="lnr lnr-user"></i> <span>Product</span></a></li>
						@endif

						@if($active=='brand')
						<li><a href="/admin/brand" class="active"><i class="lnr lnr-user"></i> <span>Brand</span></a></li>
						@else
						<li><a href="/admin/brand"><i class="lnr lnr-user"></i> <span>Brand</span></a></li>
						@endif

						@if($active=='order')
						<li><a href="/admin/order" class="active"><i class="lnr lnr-user"></i> <span>Order</span></a></li>
						@else
						<li><a href="/admin/order"><i class="lnr lnr-user"></i> <span>Order</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>