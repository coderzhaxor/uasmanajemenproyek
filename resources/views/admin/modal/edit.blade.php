<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editModal">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('updateData', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="mb-3 row">
                <label for="sku" class="col-sm-5 col-form-label">SKU</label>
                <div class="col-sm-7">
                  <input type="text"  class="form-control-plaintext" id="sku" name="sku" value="{{ $data->sku }}" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="nama_product" class="col-sm-5 col-form-label">Nama Product</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="nama_product" name="nama_product" value="{{ $data->nama_product }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="type" class="col-sm-5 col-form-label">Type Product</label>
                <div class="col-sm-7">
                  <select type="text"  class="form-control"  id="type" name="type">
                    <option value="pilih_type">Pilih Type</option>
                    <option value="makanan_pokok" {{ $data->type == 'Makanan Pokok' ? 'selected': '' }}>Makanan Pokok </option>
                    <option value="snack" {{ $data->type == 'snack' ? 'selected': '' }}>Snack </option>
                    <option value="jangfood" {{ $data->type == 'jangfood' ? 'selected': '' }}>JangFood</option>
                    <option value="minuman" {{ $data->kategori == 'minuman' ? 'selected': '' }}>minuman</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="kategori" class="col-sm-5 col-form-label">Kategori</label>
                <div class="col-sm-7">
                  <select type="text"  class="form-control"  id="kategori" name="kategori">
                    <option value="pilih_kategori">Pilih Kategori</option>
                    <option value="nasi" {{ $data->kategori == 'nasi' ? 'selected': '' }}>nasi </option>
                    <option value="makanan_berat" {{ $data->kategori == 'keripik' ? 'selected': '' }}>keripik</option>
                    <option value="minuman_bersoda" {{ $data->kategori == 'minuman_bersoda' ? 'selected': '' }}>minuman Bersoda</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="harga" class="col-sm-5 col-form-label">Harga</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="discount" class="col-sm-5 col-form-label">Discount</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="discount" name="discount" value="{{ $data->discount }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="stock" class="col-sm-5 col-form-label">Stock</label>
                <div class="col-sm-7">
                  <input type="number" class="form-control" id="stock" name="stock" value="{{ $data->stock }}">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="foto" class="col-sm-5 col-form-label">Foto</label>
                <div class="col-sm-7">
                  <input type="hidden" name="foto" value="{{ $data->foto }}">
                  <img src="{{ asset('storage/product/'.$data->foto) }}"  id="preview" alt="" style="width: 100px;" class="mb-2 preview">
                  <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg()">

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

  <script>
    function previewImg() {
        const foto = document.querySelector('#inputFoto');
        const preview = document.querySelector('.preview');

        // Pastikan ada file yang dipilih
        if (foto.files && foto.files[0]) {
            preview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(OFREvent) {
                preview.src = OFREvent.target.result;
            }
        } else {
            // Jika tidak ada file yang dipilih, sembunyikan preview
            preview.style.display = 'none';
        }
    }
</script>
