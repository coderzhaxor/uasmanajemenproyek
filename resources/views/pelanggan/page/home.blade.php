@extends('pelanggan.layout.index')

@section('content')
<h4 class="mt-5">Best Seller</h4>
<div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
    @foreach($products as $p) <!-- Looping untuk menampilkan produk -->
        <div class="card" style="width:270px;">
            <div class="card-header m-auto" style="border-radius:5px;">
                <img src="{{ asset('storage/product/'.$p->foto) }}" alt="{{ $p->nama_product }}" style="width: 250px; height:250px">
            </div>
            <div class="card-body">
                <p class="m-0 text-justify">{{ $p->nama_product }}</p>
                <p class="m-0"><i class="fa-regular fa-star"></i>5+</p>
            </div>
            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                <p class="m-0" style="font-size: 16px; font-weight:600;">{{ number_format($p->harga) }}</p>
                <button class="btn btn-outline-primary" style="font-size:15px">
                    <i class="fa-solid fa-cart-plus"> cart</i>
                </button>
            </div>
        </div>
    @endforeach
</div>

<h4 class="mt-5">Makanan Best Seller</h4>
<div class="content mt-3 d-flex flex-lg-wrap gap-5 mb-5">
    @foreach($products as $p) <!-- Looping untuk menampilkan produk makanan best seller -->
        <div class="card" style="width:270px;">
            <div class="card-header m-auto" style="border-radius:5px;">
                <img src="{{ asset('storage/product/'.$p->foto) }}" alt="{{ $p->nama_product }}" style="width: 250px; height:250px">
            </div>
            <div class="card-body">
                <p class="m-0 text-justify">{{ $p->nama_product }}</p>
                <p class="m-0"><i class="fa-regular fa-star"></i>5+</p>
            </div>
            <div class="card-footer d-flex flex-row justify-content-between align-items-center">
                <p class="m-0" style="font-size: 16px; font-weight:600;">{{ number_format($p->harga) }}</p>
                <button class="btn btn-outline-primary" style="font-size:15px">
                    <i class="fa-solid fa-cart-plus"> cart</i>
                </button>
            </div>
        </div>
    @endforeach
</div>
@endsection
