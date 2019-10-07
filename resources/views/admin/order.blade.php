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
												<th>User</th>
												<th>Order Code</th>
												<th>Proof of Payment</th>
												<th>Total Payment</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i=1;
											@endphp
											@foreach($data_order as $order)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$order->getUser($order->id_user)}}</td>
												<td>{{$order->code_order}}</td>
												<td>{{$order->proof_payment}}</td>
												<td>{{$order->total_payment}}</td>
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