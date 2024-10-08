@extends('admin.layout.index')

@section('content')
   <div class="card rounded-full" style="width: 100%;">
    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-0">
        <button class="btn btn-info" id="addData">
           <i class="fa fa-plus">
                <span>Tambah Product</span>
           </i> 
        </button>
        <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
    </div>
    <div class="card-body">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Foto</td>
                    <td>Date in</td>
                    <td>SKU</td>
                    <td>Product Name</td>
                    <td>Type</td>
                    <td>Category</td>
                    <td>Price</td>
                    <td>Stock</td>
                    <td>#</td>
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                        <tr class="text-center">
                            <td colspan="9">Belum ada barang</td>
                        </tr>
                @else
                    @foreach ($data as $y => $x)
                            <tr class="align-middle">
                                <td>{{ ++$y }}</td>
                                <td>
                                    <img src="{{ asset('storage/product/'.$x->foto )}}" alt="Gambar Product" style="width: 100px">
                                </td>
                                <td>{{ $x->created_at }}</td>
                                <td>{{ $x->sku }}</td>
                                <td>{{ $x ->nama_product }}</td>
                                <td>{{ $x->type.''}}</td>
                                <td>{{ $x->kategori }}</td>
                                <td>{{ $x->harga }}</td>
                                <td>{{ $x->stock }}</td>
                                <td>
                                    <div class="btn-group" role="group" >
                                        <button class="btn btn-info editModal me-2" data-id="{{ $x->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger deleteData" data-id="{{ $x->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                    @endforeach 
                @endif       
            </tbody>
        </table>
        <div class="pagination d-flex flex-row justify-content-between mt-3">
            <div class="showData">
                Data ditampilkan {{ $data->count() }} dari {{$data->total()}}
            </div>
            <div >
                {{ $data->links() }}
            </div>
        </div>
    </div>
   </div>
   <div class="tampilData" style="display: none;"></div>
   <div class="tampilEditData" style="display: none;"></div>

   <script>
    $('#addData').click(function() {
        $.ajax({
            url: '{{ route('addModal') }}',
            success: function(response) {
                $('.tampilData').html(response).show();
                $('#addModal').modal("show");
            }
        });
    });

    $('.editModal').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "{{ route('editModal', ['id' => ':id']) }}".replace(':id', id),
            success: function(response) {
                $('.tampilEditData').html(response).show();
                $('#editModal').modal("show");
            }
        });
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('.deleteData').click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Swal.fire({
        title: 'Hapus data?',
        text: "Kamu yakin untuk menghapus produk ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "{{ route('deleteData', ['id' => ':id']) }}".replace(':id', id),
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        Toast.fire({
                            icon: "success",
                            title: response.success,
                        });

                        // Reload page to reflect deletion
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi kesalahan saat menghapus data',
                        icon: 'error'
                    });
                }
            });
        }
    });
});

</script>
@endsection