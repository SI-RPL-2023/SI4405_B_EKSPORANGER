<?php

namespace App\Http\Controllers;

use App\Models\Pick_up;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function Home(){
        return view('pages.home');
    }
    public function addProduct(){
        return view('pages.eksportir.TambahProduk');
    }
    public function requestPickup(){
        return view('pages.requestPickup');
    }
    public function requestPickupMade(Request $request){
        $requestPickup = Pick_up::create([
            'nama_toko' => $request->nama_toko,
            'nama_produk' => $request->nama_produk,
            'alamat_penjemputan' => $request->alamat_penjemputan,
            'no_telpon' => $request->no_telpon,
            'jenis_cargo' => $request->jenis_cargo,
            'waktu_penjemputan' => $request->waktu_penjemputan,
            'tanggal_penjemputan' => $request->tanggal_penjemputan,
            'detail_produk' => $request->detail_produk,
            'status_pickup' => 'Menunggu di pick-up',
        ]);
        if($requestPickup){
            Session::flash('status', 'success');
            Session::flash('message', 'request pick up berhasil dibuat');
            return redirect('/requestPickup');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'request pick up gagal dibuat');
            return redirect('/requestPickup');
        }
    }
    public function insertProduct(Request $request){
        $ekstensi = $request->file('foto_barang')->clientExtension();
        $nama = $request->nama_barang.'-'.now()->timestamp.'.'.$ekstensi;
        $request->file('foto_barang')->storeAs('images', $nama);
        $request['foto_barang'] = $nama;
        $insertProduct = Product::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'harga_barang' => $request->harga_barang,
            'foto_barang' => $nama,
            'status_kelayakan' => 'Menunggu konfirmasi',
        ]);
        if($insertProduct){
            Session::flash('status', 'success');
            Session::flash('message', 'produk berhasil ditambahkan');
            return redirect('/addproduct');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'produk gagal ditambahkan');
            return redirect('/addproduct');
        }
    }
    public function daftarproduct(Request $request){
        $cari = $request->cari;
        $listProduct = Product::where('nama_barang', 'LIKE', '%'. $cari. '%')
        ->where('status_kelayakan', 'disetujui')
        ->paginate(15);
        return view('pages.DaftarProduct', compact(['listProduct']));
    }
    public function detailProduct($id){
       $detailProduct = Product::find($id);
        return view('pages.detailProduct', compact(['detailProduct']));
    }
    public function payments(Request $request){
        $ekstensi = $request->file('bukti_pembayaran')->clientExtension();
        $nama = $request->nama_pemesan.'-'.now()->timestamp.'.'.$ekstensi;
        $request->file('bukti_pembayaran')->storeAs('images', $nama);

        // Hitung total harga berdasarkan jumlah pemesanan
        $total_harga = $request->harga * $request->jumlah_pemesan;

        $payments = Transaction::create([
            'nama_pemesan' => $request->nama_pemesan,
            'email' => $request->email,
            'no_telpon' => $request->no_telpon,
            'produk_dibeli' => $request->produk_dibeli,
            'jumlah_pemesan' => $request->jumlah_pemesan,
            'harga' => $total_harga, // Gunakan total harga yang telah dihitung sebelumnya
            'bukti_pembayaran' => $nama,
            'status_pemesanan' => 'Pending',
        ]);
        if($payments){
            return redirect('/sukses');
        } 
    }
    public function sukses(){
        return view('pages.sukses');
    }
}
