<?php
// Initialize variables for total price and shipping charge
$totalPrice = 0;
$shippingCharge = 5;

?>

@extends('home.master')
@section('content')
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Checkout <span>Page</span>
            </h2>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-hover">
                    <!-- Table header -->
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartsData as $carts)
                            <tr>
                                <th scope="row"><img src="{{ asset('/images/' . $carts->product->image) }}"
                                        width="50px" height="50px"></th>
                                <td>{{ $carts->product->title }}</td>
                                <td>
                                    <form action="{{ url('/carts/'.$carts->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="input-group quantity mr-3" style="width: 130px;">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-outline-danger btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control btn-outline-danger text-center"
                                                name="quantity" value="{{ $carts->quantity }}" id="quantityInput">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-outline-danger btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    ${{ $carts->product->price * $carts->quantity }}
                                </td>
                                <td>
                                    <form action="{{ url('/carts/' . $carts->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-outline-danger"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                // Calculate the total price for each product and add it to the overall total
                                $totalPrice += ($carts->product->price * $carts->quantity);
                            ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>${{ number_format($totalPrice, 2) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>${{ number_format($shippingCharge, 2) }}</span>
                            </li>
                            <?php
                                // Calculate the total amount including shipping charge
                                $totalAmount = $totalPrice + $shippingCharge;
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>${{ number_format($totalAmount, 2) }}</strong></span>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-outline-danger">
                            Go to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- @extends('home.master')
@section('content')
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Checkout <span>Page</span>
            </h2>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartsData as $carts)
                            <tr>
                                <th scope="row"><img src="{{ asset('/images/' . $carts->product->image) }}"
                                        width="50px" height="50px">
                                </th>
                                <td>{{ $carts->product->title }}</td>
                                <td>
                                    <form action="{{ url('/carts/'.$carts->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-outline-danger btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control btn-outline-danger text-center"
                                            name="quantity" value="{{ $carts->quantity }}" id="quantityInput">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-outline-danger btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                </td>
                                <td>
                                    ${{ $carts->product->price * $carts->quantity }}
                                </td>
                                <td>
                                    <form action="{{ url('/carts/' . $carts->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Products
                                <span>$53.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>$60</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                        </ul>

                        <button type="button" class="btn btn-outline-danger">
                            Go to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection --}}
