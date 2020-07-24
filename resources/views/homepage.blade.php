@extends('layouts.front')

@section('additional-content')

  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Simple E-Commerce</strong>
              </h1>

              <p>
                <strong>Just for local cart</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Made with Love by Akmal Musthofa</strong>
              </p>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Simple E-Commerce</strong>
              </h1>

              <p>
                <strong>Just for local cart</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Made with Love by Akmal Musthofa</strong>
              </p>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Simple E-Commerce</strong>
              </h1>

              <p>
                <strong>Just for local cart</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Made with Love by Akmal Musthofa</strong>
              </p>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->
@endsection
@section('content')
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">

  <!-- Navbar brand -->

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse show" id="basicExampleNav">
    <form class="form-inline">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->

<!--Section: Products v.3-->
<section class="text-center mb-4">

  @foreach ($productChunk as $products)
  <div class="row wow fadeIn">
    @foreach ($products as $product)
      <div class="col-lg-3 col-md-6 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card image-->
          <div class="view overlay">
            <img src="{{$product->image_url}}" class="card-img-top"
              alt="">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <!--Card image-->

          <!--Card content-->
          <div class="card-body text-center">
            <!--Category & Title-->
            <a href="" class="grey-text">
              <h5><i>Category</i></h5>
            </a>
            <h5>
              <strong>
                <a href="" class="dark-grey-text">{{$product->name}}</a>
              </strong>
            </h5>

            <h4 class="font-weight-bold blue-text">
              <strong>{{$product->price}}$</strong>
            </h4>

          </div>
          <!--Card content-->

        </div>
        <!--Card-->

      </div>
    @endforeach
  </div>
  @endforeach

</section>
<!--Section: Products v.3-->

<!--Pagination-->
<nav class="d-flex justify-content-center wow fadeIn">
  <ul class="pagination pg-blue">

    <!--Arrow left-->
    <li class="page-item disabled">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>

    <li class="page-item active">
      <a class="page-link" href="#">1
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>

    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
<!--Pagination-->
@endsection
