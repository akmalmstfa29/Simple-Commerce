@extends('layouts.front')

@section('additional-content')
    <main class="mt-5 pt-4">
        <div class="container dark-grey-text mt-5">

            <div class="row wow fadeIn">

            <div class="col-md-6 mb-4 text-center">

                <img src="{{$product->image_url}}" class="img-fluid" alt="">

            </div>

            <div class="col-md-6 mb-4">

                <div class="p-4">

                <div class="mb-3">
                    <a href="">
                    <span class="badge purple mr-1">category 1</span>
                    </a>
                    <a href="">
                    <span class="badge blue mr-1">category 2</span>
                    </a>
                    <a href="">
                    <span class="badge red mr-1">category 3</span>
                    </a>
                </div>

                <p class="lead">
                    <span class="mr-1">
                    {{-- <del>$200</del> --}}
                    </span>
                    <span>${{$product->price}}</span>
                </p>

                <p class="lead font-weight-bold">{{$product->name}}</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
                    sint voluptatibus!
                    Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>
                <form class="d-flex flex-column justify-content-left" action="{{route('add-to-cart')}}"  method="post">
                    <div class="d-flex flex-row">
                        @csrf
                        <input name="product_id" type="hidden" value="{{ $product->id }}">
                        <input name="qty"  type="number" value="1" min="1" required aria-label="Search" class="form-control mr-2" style="width: 100px">
                        <input name="discount_code" type="text" placeholder="Discount Code" value="" aria-label="Search" class="form-control discount-form" style="width: 140px">
                    </div>
                    <div class="pt-2">
                        <button class="btn btn-primary btn-md m-0 p" type="submit">Add to cart
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>
                    </div>
                </form>

                </div>

            </div>

            </div>

            <hr>

            <div class="row d-flex justify-content-center wow fadeIn">

                <div class="col-md-6 text-center">

                    <h4 class="my-4 h4">Other products in this store</h4>

                </div>

            </div>

            <div class="row wow fadeIn">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <img src="{{$product->image_url}}" class="img-fluid" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
