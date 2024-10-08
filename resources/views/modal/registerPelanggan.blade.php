<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3 row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" placeholder="Masukkan Password Anda" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="telp" class="col-sm-3 col-form-label">No Hp</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="telp" placeholder="Masukkan No Telpon Anda" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tgl_lahir" required>
            </div>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Register</button>
          </div>
        </form>
        <p class="text-center mt-3" style="font-size: 12px">Sudah punya akun? <a href="#">Login sekarang</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
