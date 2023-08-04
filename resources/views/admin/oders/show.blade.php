@extends('admin.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card" >
                <div class="card-body">
                    <div class="container mb-5 mt-3">
                        <div class="row d-flex align-items-baseline">
                            <div class="col-xl-9">
                                <p style="font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p>
                            </div>
                        <hr>
                        </div>
                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('put')
                        <div class="container">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <i class="fab fa-mdb fa-4x ms-0" ></i>
                                    <p class="pt-0">MehediExpress</p>
                                </div>

                            </div>


                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: {{ $order->user->name }}</li>
                                    <li class="text-muted">{{ $order->user->address }}</li>
                                    <li class="text-muted"><i class="fas fa-phone"></i>{{ $order->user->phone }}</li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Invoice</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" ></i> <span
                                        class="fw-bold">ID:</span>#{{ $order->id }}</li>
                                    <li class="text-muted"><i class="fas fa-circle" ></i> <span
                                        class="fw-bold">Creation Date: </span>{{ $order->created_at->format('d/m/Y') }}</li>
                                    <li class="text-muted"><i class="fas fa-circle" ></i> <span
                                        class="me-1 fw-bold">Status:</span><span class="badge  fw-bold">
                                        <select name="status" class="form-control">
                                            <option value="processing" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}> Processing</option>
                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>

                                        </span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead  class="text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <?php $total = 0?>
                            @foreach($order->orderItems as $orderItem)
                                <tr>
                                    <td>{{ $orderItem->product_id }}</td>
                                    <td>{{ $orderItem->product->title}}</td>
                                    <td>{{ $orderItem->quantity }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>{{ $orderItem->quantity * $orderItem->price }}</td> <!-- Calculate the subtotal for this item -->
                                </tr>
                               <?php $total+=($orderItem->quantity * $orderItem->price );?>
                            @endforeach
                            </tbody>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                            <p class="ms-3">Add additional notes and payment information</p>

                            </div>
                            <div class="col-xl-3">
                            <ul class="list-unstyled">
                                <li class="text-muted ms-3"><span class=" me-4">SubTotal </span>${{  number_format($total, 2)}}</li>
                            </ul>
                            <p class=" float-start"><span class=" me-3"> Total Amount </span><span
                                style="font-size: 25px;">${{ $order->total_amount }}</span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10">
                            <p>Thank you for your purchase</p>
                            </div>
                            <div class="col-xl-2">
                            <button type="subbmit" class="btn btn-primary text-capitalize">Save </button>
                            </div>
                        </div>


                    </form>

                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection
