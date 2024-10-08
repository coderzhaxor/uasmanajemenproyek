@extends('pelanggan.layout.index')

@section('content')
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                  Kategori
                </div>
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                              Snack
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body ">
                                <div class="d-flex flex-column gap-4">
                                    <a href="#" class="page-link" >
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                              Makanan
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body ">
                                <div class="d-flex flex-column gap-4">
                                    <a href="#" class="page-link" >
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                              Minuman
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body ">
                                <div class="d-flex flex-column gap-4">
                                    <a href="#" class="page-link" >
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                    <a href="#" class="page-link">
                                        <i class="fas fa-plus"></i>Chiki
                                    </a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
        <div class="col-md-9 d-flex flex-wrap gap-4 mb-4">
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
            <div class="pagination d-flex flex-row justify-content-between mt-3">
                    <div class="showData">
                        Data ditampilkan {{ $products->count() }} dari {{$products->total()}}
                    </div>
                    <div >
                        {{ $products->links() }}
                    </div>
            </div>
        </div>
    </div>
@endsection