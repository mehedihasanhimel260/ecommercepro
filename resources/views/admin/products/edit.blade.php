@extends('admin.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-3 grid-margin stretch-card"></div>
        <div class="col-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update product</h4>
              <p class="card-description"> Basic form elements </p>
              <form class="forms-sample" action="{{ route('products.update', $product) }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="exampleInputName1">Product Name</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="title" value="{{ $product->title }}" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Product Category</label>
                  <select class="form-control" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                    <label for="exampleInputName1">Product Image</label>
                    <input type="file" class="form-control" id="exampleInputName1" name="image" placeholder="Name">
                    <img src="{{asset('images').'/' .$product->image}}" alt="">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Product Discribtion</label>
                    <textarea class="form-control" id="exampleTextarea1" name="description" rows="3">{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Product Price</label>
                    <input type="Number" class="form-control" id="exampleInputName1" name="price" value="{{ $product->price }}"placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Offer Price</label>
                    <input type="Number" class="form-control" id="exampleInputName1" name="discount_price" value="{{ $product->discount_price }}"placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Product Quantity</label>
                    <input type="Number" class="form-control" id="exampleInputName1" name="qty"value="{{ $product->qty }}" placeholder="Name">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Save</button>
                <button class="btn btn-dark">Cancel</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-3 grid-margin stretch-card"></div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection
