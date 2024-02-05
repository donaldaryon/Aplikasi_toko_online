@extends('user.app')
@section('content')
<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0" class="{{ Request::path() === '/' ? '' : '' }}"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Kain Tenun</strong></div>
    </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset('storage/'.$produk->image) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
        <h2 class="text-black">{{ $produk->name }}</h2>
        <p>
            {{ $produk->description }}
        </p>
        <p><strong class="text-primary h4">Rp.{{number_format($produk->price,2,',','.') }} </strong></p>
        <div class="mb-5">
            <form action="{{ route('user.keranjang.simpan') }}" method="post">
                @csrf
                @if(Route::has('login'))
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                @endif
            <input type="hidden" name="products_id" value="{{ $produk->id }}" id="number">
            <small>Sisa Stok {{ $produk->stok }}</small>
            <input type="hidden" value="{{ $produk->stok }}">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
            <button class="btn btn-outline-primary js-btn-minus" id="minus" type="button">&minus;</button>
            </div>
            <input type="text" name="qty" class="form-control text-center" id="numberPlace" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly>
            <div class="input-group-append">
            <button class="btn btn-outline-primary js-btn-plus"  id="plus" type="button">&plus;</button>
            </div>
        </div>    
 <script>
     window.onload=function(){
    var minusBtn = document.getElementById("minus"),
        plusBtn = document.getElementById("plus"),
        numberPlace = document.getElementById("numberPlace"),
        submitBtn = document.getElementById("submit"),
        number = 1, /// number value
        min = 0, /// min number
        max = {{ $produk->stok }}; /// max number
        
    minusBtn.onclick = function(){
        if (number>min){
           number = number-1; /// Minus 1 of the number
           numberPlace.innerText = number ; /// Display the value in place of the number
           
        }
        if(number == min) {        
            numberPlace.style.color= "red";
            setTimeout(function(){numberPlace.style.color= "black"},500)
        }
        else {
          numberPlace.style.color="black";            
           }
                
    }
    plusBtn.onclick = function(){
        if(number<max){
           number = number+1;
           numberPlace.innerText = number ; /// Display the value in place of the number
        }     
        if(number == max){
            $("#plus").attr("disabled", true);
               numberPlace.style.color= "red";
               alert("Maaf,Jumlah Pesanan Anda Telah Mencapai Batas Sisa Stok : " + number);                             
        }
           
        else {
               numberPlace.style.color= "black";               
        }
          
    }   
}
 </script>
        </div>
        <p><button id="submit" type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection