<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addModal">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('addData') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">
              <div class="mb-3 row">
                <label for="sku" class="col-sm-5 col-form-label">SKU</label>
                <div class="col-sm-7">
                  <input type="text"  class="form-control-plaintext" id="sku" name="sku" value="{{ $sku }}" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_product" class="col-sm-5 col-form-label">Nama Product</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="nama_product" name="nama_product">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="type" class="col-sm-5 col-form-label">Type Product</label>
                <div class="col-sm-7">
                  <select type="text"  class="form-control"  id="type" name="type">
                    <option value="">Pilih Type</option>
                    <option value="pokok">Makanan Pokok</option>
                    <option value="sehat">Makanan Sehat</option>
                    <option value="jangfood">Jang Food</option>
                    <option value="minuman">Minuman</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kategori" class="col-sm-5 col-form-label">Kategori</label>
                <div class="col-sm-7">
                  <select type="text"  class="form-control"  id="kategori" name="kategori">
                    <option value="pilih_kategori">Pilih Kategori</option>
                    <option value="snack">nasi </option>
                    <option value="makanan_berat">Makanan Berat</option>
                    <option value="minuman_bersoda">minuman Bersoda</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="harga" class="col-sm-5 col-form-label">Harga</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="harga" name="harga">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="discount" class="col-sm-5 col-form-label">Discount</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="discount" name="discount">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="stock" class="col-sm-5 col-form-label">Stock</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="stock" name="stock">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="foto" class="col-sm-5 col-form-label">Foto</label>
                <div class="col-sm-7">
                  <input type="file" class="form-control" accept=".png, .jpg, .jpeg"    id="foto" name="foto">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>