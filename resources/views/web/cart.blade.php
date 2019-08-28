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
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Check</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total_payment=0;
                            @endphp
                            @foreach($cart as $c)
                            <tr>
                                <td>
                                    <div class="switch-wrap d-flex justify-content-between">
                                        <div class="confirm-checkbox">
                                            <input type="checkbox" id="confirm-checkbox">
                                            <label for="confirm-checkbox"></label>
                                        </div>
                                    </div>
                                </td>
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
                                    <h5>IDR <span id="price{{$c->id}}">{{$c->productPrice($c->id_product)}}</span></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <form action="/checkout" method="post">
                                        {{csrf_field()}}
                                        <input type="number" name="qty{{$c->id}}" id="qty{{$c->id}}" maxlength="12" min="1" value="{{$c->quantity}}" title="Quantity:" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    @php
                                    $total_price = $c->productPrice($c->id_product) * $c->quantity;
                                    $total_payment+=$total_price;
                                    @endphp
                                    <h5>IDR <span id="total_price{{$c->id}}">{{$total_price}}</span></h5>
                                </td>
                                <td><a href="/cart/delete/{{$c->id}}" class="genric-btn danger radius">Delete</a></td>
                            </tr>
                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h5>Subtotal</h5></td>
                                <td><h5>IDR <span id="subtotal">{{$total_payment}}</span></h5></td>
                            </tr>
                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a href="/shop" class="genric-btn info">CONTINUE SHOPPING</a>
                                        <button type="submit" class="genric-btn primary">CHECKOUT</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @stop

    @section('jquery')

    <script>
        $(document).ready(function() {
            var cart = {!! json_encode($cart->toArray()) !!};
            var subtotal = 0;
            $.each(cart, function(){
                var variabel_price = "#price"+this.id;
                var variabel_qty = "#qty"+this.id;
                var variabel_total = "#total_price"+this.id;
                var price = parseInt($(variabel_price).text());       
                function updatePrice() {
                    var sum, num = parseInt($(variabel_qty).val(),10);
                    console.log(num);
                    if(num) {
                        sum = num * price;
                        $(variabel_total).text(sum);
                    }
                }
                $(document).on("change, mouseup, keyup", "#qty"+this.id, updatePrice);
            });
            $.each(cart, function(){
                var variabel_price = "#price"+this.id;
                var price = parseInt($(variabel_price).text());
                subtotal = subtotal + price;
                console.log(price);
                function upadateSubtotal() {
                    $("#subtotal").text(subtotal);
                }
                $(document).on("change, mouseup, keyup", "#qty"+this.id, upadateSubtotal);
            });
        });
    </script>
    @stop