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
                    <div class="col-lg-7">
                        <div class="order_box">
                            <h2>Payment</h2>
                            <div class="cart_inner">
                                <p>Please transfer to :</p>
                                <h6>
                                    <table>
                                        <tr>
                                            <td>Bank</td>
                                            <td>:</td>
                                            <td>Mandiri</td>
                                        </tr>
                                        <tr>
                                            <td>No</td>
                                            <td>:</td>
                                            <td>12681212939</td>
                                        </tr>
                                        <tr>
                                            <td>A/N</td>
                                            <td>:</td>
                                            <td>Faiz Hermawan</td>
                                        </tr>
                                        <tr>
                                            <td>Payment</td>
                                            <td>:</td>
                                            <td>IDR {{$order->total_payment}}</td>
                                        </tr>
                                    </table>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="order_box">
                            <h2>Upload</h2>
                            <div class="cart_inner">
                                <span>Upload your proof of payment :</span>
                                <form action="/complete" method="post" style="margin-top: 10px" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_order" value="{{$order->id}}">
                                    @if(isset($order->proof_payment))
                                    <img src="/images/proof/{{$order->proof_payment}}" width="380px" style="margin-bottom:10px ">
                                    @endif
                                    <input type="file" name="proof"><br>
                                    <button type="submit" class="genric-btn primary radius" style="margin-top: 15px">Complete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

   @stop