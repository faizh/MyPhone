@extends('admin.layouts.master')

@section('content')

	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">User Tables</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Category</th>
												<th>Brand</th>
												<th>Name</th>
												<th>Detail</th>
												<th>Color</th>
												<th>Price</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i=1;
											@endphp
											@foreach($data_product as $product)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$product->getCategory($product->id_category)}}</td>
												<td>{{$product->getBrand($product->id_brand)}}</td>
												<td>{{$product->nama}}</td>
												<td>{{$product->detail}}</td>
												<td>{{$product->warna}}</td>
												<td>{{$product->harga}}</td>
												<td>{{$product->description}}</td>
												<td><button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		
@stop