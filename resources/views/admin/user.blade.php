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
												<th>Name</th>
												<th>Email</th>
												<th>ID Card</th>
												<th>Phone</th>
												<th>Address</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@php
											$i=1;
											@endphp
											@foreach($data_user as $user)
											<tr>
												<td>{{$i++}}</td>
												<td>{{$user->nama_depan}} {{$user->nama_belakang}}</td>
												<td>{{$user->email}}</td>
												<td>{{$user->idcard}}</td>
												<td>{{$user->telepon}}</td>
												<td>{{$user->alamat}}</td>
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