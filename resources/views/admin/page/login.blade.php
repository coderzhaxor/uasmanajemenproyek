<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    <title>Marketplace Katering | {{ $title }}</title>
</head>
<body>
    
  <main class="d-flex justify-center align-items-center">
      <div class="card p-4 m-auto" style="max-width: 400px; width: 100%;">
          <div class="card-header bg-transparent text-center">
              <h5>{{ $name }}</h5>
          </div>
          
          <form action="{{ route('admin.loginProses') }}" method="POST">
              @csrf
              <div class="card-body">
                  <div class="mb-3 row">
                      <label for="username" class="col-sm-5 col-form-label">Username</label>
                      <div class="col-sm-7">
                          <input type="text" class="form-control" id="username" name="username" autocomplete="off" autofocus>
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="password" class="col-sm-5 col-form-label">Password</label>
                      <div class="col-sm-7">
                          <input type="password" class="form-control" id="password" name="password">
                      </div>
                  </div>
                  <div class="card-footer bg-transparent w-100">
                      <button type="submit" class="btn btn-success w-100 mt-2">Login Now</button>
                      <button class="btn btn-danger w-100 mt-2">Lupa Password</button>
                      <a href="{{ route('register') }}" class="btn btn-primary w-100 mt-2">Register</a>
                  </div>
              </div>
          </form>
      </div>
  </main>

  @include('sweetalert::alert')

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
  @stack('scripts')
</body>
</html>
