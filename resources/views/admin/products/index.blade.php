@extends('admin.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Bordered table</h4>
                <p class="card-description">    <a href="{{ url('/products/create') }}" class="btn btn-outline-success">Add Product</a>
                </p>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Product  name </th>
                        <th> Product  name </th>
                        <th colspan="2" class="text-center"> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)

                      <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{  $product->title }} </td>
                        <td> <img src="{{asset('images').'/' .$product->image}}" alt=""> </td>
                        <td>
                            <a href="{{ url('/products/' . $product->id . '/edit') }}" class="btn btn-outline-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy',$product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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
