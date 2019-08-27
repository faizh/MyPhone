@extends('layout.master')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <div class="cart_inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total_payment=0;
                                            @endphp
                                            @foreach($checkout as $c)
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <div class="d-flex">
                                                            <img src="images/product/{{$c->productImage($c->id_product)}}" alt="" style="width: 100px">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5>{{$c->productName($c->id_product)}}</h5>
                                                            <p>Minimalistic shop for multipurpose use</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5>IDR {{$c->productPrice($c->id_product)}}</h5>
                                                </td>
                                                <td>
                                                    <div class="product_count">
                                                        <h5>{{$c->quantity}}</h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    @php
                                                    $total_price = $c->productPrice($c->id_product) * $c->quantity;
                                                    $total_payment+=$total_price;
                                                    @endphp
                                                    <h5>IDR {{$total_price}}</h5>
                                                </td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    <h5>Subtotal</h5>
                                                </td>
                                                <td>
                                                    <h5>IDR {{$total_payment}}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="order_box">
                            <h2>Payment</h2>
                            <div class="cart_inner">
                                <table>
                                <tr>
                                    <td><h5>Choose Bank</h5></td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="/order" method="post">
                                        {{csrf_field()}}

                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="bca" name="selector">
                                                <label for="bca" value="bca">BCA</label>
                                                <div class="check"></div>
                                            </div>
                                        </div>
                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="mandiri" name="selector">
                                                <label for="mandiri">Mandiri</label>
                                                <div class="check"></div>
                                            </div>
                                        </div>
                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="bni" name="selector">
                                                <label for="bni">BNI</label>
                                                <div class="check"></div>
                                            </div>
                                        </div>
                                        <div class="payment_item">
                                            <div class="radion_btn">
                                                <input type="radio" id="bri" name="selector">
                                                <label for="bri">BRI</label>
                                                <div class="check"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </table>
                                    
                                        <h3>Total Payment <span style="color: #ffba00">IDR {{$total_payment}}</span></h3>
                                        <input type="hidden" name="total_payment" value="{{$total_payment}}">
                                        <button type="submit" class="genric-btn primary radius">Create Order</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

   @stop