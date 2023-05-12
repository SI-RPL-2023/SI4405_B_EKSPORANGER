<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function VerifikasiHalaman(Request $request){
        $cari = $request->cari;
        $listProduct = Product::where('nama_barang', 'LIKE', '%'. $cari. '%')
        ->orWhere('status_kelayakan', $cari)
        ->paginate(10);
        return view('pages.admin.VerifikasiHalaman', compact(['listProduct']));
    }
    public function detailProduct($id){
        $detailProduct = Product::find($id);
        return view('pages.admin.detailProduct', compact(['detailProduct']));
    }
    public function verifikasiProduct($id){
        $statusverifikasi = Product::find($id);
        return view('pages.admin.statusverifikasi', compact(['statusverifikasi']));
    }
    public function productVerification(Request $request, $id){
        $statusverification = Product::find($id);
        $statusverification->update($request->except('_token'));
        if($statusverification){
        Session::flash('status', 'success');
        Session::flash('message', 'produk terverifikasi');
        return redirect('/verifikasi/VerifikasiProduct/'.$id);
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'produk gagal terverifikasi');
            return redirect('/verifikasi/VerifikasiProduct/'.$id);
        }
    }
}
