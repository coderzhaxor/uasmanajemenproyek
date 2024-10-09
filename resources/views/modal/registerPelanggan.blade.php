<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('register.pelanggan') }}">
                  @csrf
                  <input type="hidden" name="role" value="0"> <!-- Default role as User -->

                  <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda" required>
                  </div>

                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda" required>
                  </div>

                  <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" required>
                  </div>

                  <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" required>
                  </div>

                  <div class="mb-3">
                      <label for="telp" class="form-label">No Hp</label>
                      <input type="tel" class="form-control" id="telp" name="telp" pattern="[0-9]{10,}" placeholder="Masukkan No Telepon Anda" required>
                  </div>

                  <div class="mb-3">
                      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                  </div>

                  <button type="submit" class="btn btn-success col-sm-12">Register</button>
                  <p class="m-auto text-center p-2" style="font-size: 12px;">Jika belum ada akun, register sekarang</p>
                  <button type="button" class="btn btn-danger col-sm-12" data-bs-dismiss="modal">Close</button>
              </form>
          </div>
      </div>
  </div>
</div>
