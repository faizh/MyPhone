@extends('layout.master')

@section('content')

<section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
	    	<h3>Your Order</h3>
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table table-hover">
                    	<th>#</th>
                    	<th>Order Code</th>
                    	<th>Product</th>
                    	<th>Total Payment</th>
                    	<th>Proof of Payment</th>
                    	<th>Status</th>
                    	<tbody>
                    		@php
                    		$number=0;
                    		@endphp
                    		@foreach($order as $o)
                    		@php
                    		$number++;
                    		@endphp
                    		<tr>
                    			<td>{{$number}}</td>
                    			<td>{{$o->code_order}}</td>
                    			<td>
                    				@foreach($product as $data_p)
                    					@foreach($data_p as $p)
                    				<div class="media">
                                        <div class="d-flex">
                                            <img src="images/product/{{$p->gambar}}" alt="" style="width: 100px">
                                        </div>
                                        <div class="media-body">
                                            <h5>{{$p->nama}}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endforeach
                    			</td>
                    			<td>IDR {{$o->total_payment}}</td>
                				@if($o->proof_payment==null)
                				<td><a href="/transfer/{{$o->id}}" class="genric-btn warning radius">Upload</a></td>
                				@else
								<td><a href="/transfer/{{$o->id}}" class="genric-btn success radius">Uploaded</a></td>
                				@endif
                    			@if($o->status==0)
                    			<td><button class="genric-btn danger radius">Unaccepted</button></td>
                    			@else
                    			<td><button class="genric-btn success radius">Accepted</button></td>
                    			@endif
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>	

    @stop