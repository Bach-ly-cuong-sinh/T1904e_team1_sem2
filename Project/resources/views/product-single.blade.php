@extends('layouts.frontend')

@section ('content')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
        <h1 class="mb-0 bread">Product Single</h1>
      </div>
    </div>
  </div>
</div>
 
<section class="ftco-section">
  <div class="container">
    <div class="row">
      @foreach($SProduct as $Product)
      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="" class="image-popup"><img src="" id="img" class="img-fluid" alt="Colorlib Template"></a>
      </div>
      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <h3 id="name"></h3>

        <div class="rating d-flex">
          <p class="text-left mr-4">
            <a href="#" class="mr-2">5.0</a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
          </p>
          <p class="text-left mr-4">
            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
          </p>
          <p class="text-left">
            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
          </p>
        </div>
        <p class="price"><span id="price"></span></p>
        <p id="title"></p>

        <div class="row mt-4">
          <div class="col-md-6">
            <div class="form-group d-flex">
              <div class="select-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="" id="" class="form-control">
                  <option value="">Small</option>
                  <option value="">Medium</option>
                  <option value="">Large</option>
                  <option value="">Extra Large</option>
                </select>
              </div>
            </div>
          </div>
          <div class="w-100"></div>
          <div class="input-group col-md-6 d-flex mb-3">
            <span class="input-group-btn mr-2">
                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                 <i class="ion-ios-remove"></i>
                </button>
              </span>
            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
            <span class="input-group-btn ml-2">
                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                   <i class="ion-ios-add"></i>
               </button>
            </span>
          </div>
          <div class="w-100"></div>
          <div class="col-md-12">
            <p style="color: #000;"></p>
          </div>
        </div>
        <p><a href="add/{{$Product->pr_id}}" class="btn btn-black py-3 px-5">Add to Cart</a></p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Products</span>
        <h2 class="mb-4">Related Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    @foreach($lsProduct as $Product)
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="javascript:void(0)" onclick="loadProductDeatil({{$Product->pr_id}})" class="img-prod"><img class="img-fluid" src="{{asset($Product->pr_image)}}" alt="Colorlib Template">
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#">{{$Product->pr_name}}</a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span>{{$Product->pr_price}}</span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex">
                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                  <span><i class="ion-ios-menu"></i></span>
                </a>
                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                  <span><i class="ion-ios-cart"></i></span>
                </a>
                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                  <span><i class="ion-ios-heart"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
       
    </div>
    {{$lsProduct->links()}}
  </div>
</section>

<script>
//Load chi tiet san pham

function loadProductDeatil(id){
$.ajax({
  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },url:"{{route('product.detail')}}",
            type:"GET",
            data:{id},
            success:function(res) {
              $('#name').text(res.data.pr_name);
              $('#title').text(res.data.pr_title);
              $('#price').text(res.data.pr_price);
              $('#img').attr('src',res.data.pr_image);
            }

})
}
</script>
@endsection
