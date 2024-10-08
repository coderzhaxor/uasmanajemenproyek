<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data = product::paginate(3);
        return view('admin.page.product',[
            'name' => "Product",
            'tittle' =>  'Admin Product',
            'data' => $data,
        ]);
        
    
    }

    public function addModal(){
        return view('admin.modal.addModal',[
            'title' => 'Tambah Data Product',
            'sku' => 'BRG'.rand(10000, 99999),
        ]);
    }

    public function store(StoreproductRequest $request){
        $data = new product();
        $data->sku  = $request->sku;
        $data->nama_product  = $request->nama_product;
        $data->type  = $request->type;
        $data->kategori  = $request->kategori;
        $data->harga = $request->harga;
        $data->discount  = 10/100;
        $data->stock  = $request->stock;
        $data->is_active  = 1;

        if($request->hasFile('foto')){
            $photo = $request->file('foto');
            $filename = date('Ymd').'_'.$photo->getClientOriginalName();
            $photo->move(public_path('storage/product'),$filename);
            $data->foto = $filename;
        }
        $data->save();
        Alert::toast('Data berhasil disimpan','success');
        return redirect()->route('Product');

    }

    public function show($id){
        $data =   product::findOrFail($id);
        return view('admin.modal.edit',
        [
            'title' => 'Edit data product',
            'data' =>  $data,
        ]
        )-> render();
    }

    public function update(UpdateProductRequest $request, product $product, $id)
    {
        // Melihat semua data yang diterima
       
        $data = product::findOrFail($id);

        // Cek apakah ada file foto yang di-upload
        if($request->file('foto')){
            $photo = $request->file('foto');
            $filename = date('Ymd'). '_'. $photo->getClientOriginalName();
            $photo->move(public_path('storage/product'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $field = [
            'sku'   => $request->sku,
            'nama_product'   => $request->nama_product,
            'type'   => $request->type,
            'kategori'   => $request->kategori,
            'harga'   => $request->harga,
            'stock'   => $request->stock,
            'discount'   => 10/100,
            'is_active'   => 1,
            'foto'   => $filename,
        ];

      

        $data::where('id', $id)->update($field);
        Alert::toast('Data berhasil diupdate', 'success');
        return redirect()->route('Product');
    }


    public function destroy($id)
{
    $product = product::findOrFail($id);
    $product->delete();

    return response()->json([
        'success' => 'Data berhasil dihapus'
    ]);
}


}
