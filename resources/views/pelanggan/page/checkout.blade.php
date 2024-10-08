@extends('pelanggan.layout.index')

@section('content')
<div class="row mt-3">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <h3>Masukkan Alamat Penerima</h3>
                <div class="row mb-3">
                    <label for="username" class="col-form-label col-sm-3">Nama Penerima</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control col-sm-9" id="username" name="username" placeholder="Masukkan Nama Penerima" autofocus >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-form-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Penerima">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telp" class="col-form-label col-sm-3">No Telepon Penerima</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Penerima">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ekspedisi" class="col-form-label col-sm-3">Pengantaran</label>
                    <div class="col-sm-9">
                        <select name="ekspedisi" id="ekspedisi" class="form-control">
                            <option value="">-- Pilih Ekspedisi --</option>
                            <option value="">-- Gojek --</option>
                            <option value="">-- Gocar --</option>
                        </select>
                    </div>    
                </div>
            </div>
        </div> 
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header text-center">
                <h3>Total Belanja</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3 d-flex align-items-center">
                    <label for="totalBelanja" class="col-form-label col-sm-4">Total Belanja</label> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="totalBelanja" name="totalBelanja" value="200000" disabled>
                    </div>
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    <label for="discount" class="col-form-label col-sm-4">Discount</label> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="discount" name="discount" value="0">
                    </div>
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    <label for="ongkir" class="col-form-label col-sm-4">Ongkir</label> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="discount" name="Ongkir" value="0">
                    </div>
                </div>
                <hr>
                <div class="row mb-3 d-flex align-items-center">
                    <label for="dibayarkan" class="col-form-label col-sm-4">Total</label> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="dibayarkan" name="dibayarkan" value="202200">
                    </div>
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    <label for="diterima" class="col-form-label col-sm-4">Diterima</label> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="diterima" name="diterima" value="0" >
                    </div>
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    <label for="dikembalikan" class="col-form-label col-sm-4">Uang dikembalikan</label> 
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="dikembalikan" name="dikembalikan" value="0" readonly>
                    </div>
                </div>
                <button class="btn btn-success  w-100">
                    <i class="fas fa-print"></i>
                    print struck
                </button>
            </div>
        </div>
    </div>
    
</div>
@endsection