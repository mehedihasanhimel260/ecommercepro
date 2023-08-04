@extends('admin.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Orders table</h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> Order ID </th>
                        <th> User Name </th>
                        <th> Total </th>
                        <th> Status </th>
                        <th colspan="2" class="text-center"> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{  $order->user->name }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>{{  $order->status }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">View</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
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
