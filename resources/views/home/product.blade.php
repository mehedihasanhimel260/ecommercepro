<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ url('/singleproduct/' . $product->id) }}" class="option1">
                                    View ditails
                                </a>
                               <form action="{{ url('/carts') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <input type="hidden" name="product_id" value="{{ $product->id}}">

                                <input type="hidden" name="quantity" value="1">
                                <button  class="option2 btn " type="submit">Add to Cart</button>
                            </form>

                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ asset('/images/' . $product->image) }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $product->title }}
                            </h5>
                            <h6>
                                ${{ $product->discount_price }}
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
