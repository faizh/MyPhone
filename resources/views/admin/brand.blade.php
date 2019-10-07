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
												<th>Name</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i=1;
											@endphp
											@foreach($data_brand as $brand)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$brand->getCategory($brand->id_category)}}</td>
												<td>{{$brand->nama}}</td>
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