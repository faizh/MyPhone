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
                    	<th>Product</th>
                    	<th>Action</th>
                    	<tbody>
                    		@php
                    		$number=0;
                    		@endphp
                    		@foreach($wishlist as $w)
                    		@php
                    		$number++;
                    		@endphp
                    		<tr>
                    			<td>{{$number}}</td>
                    			<td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="images/product/{{$w->getProductImage($w->id_product)}}" alt="" style="width: 100px">
                                        </div>
                                        <div class="media-body">
                                            <h5>{{$w->getProductName($w->id_product)}}</h5>
                                            <p>Minimalistic shop for multipurpose use</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="genric-btn info radius">Buy</a>
                                    <a href="/wishlist/delete/{{$w->id}}" class="genric-btn danger radius">Delete</a>
                                </td>
                    		</tr>
                    		@endforeach
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>	

    @stop