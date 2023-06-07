<?php

namespace App\Http\Controllers;

use App\Models\Pick_up;
use App\Models\Product;
use App\Models\Request as ModelsRequest;
use App\Models\Ship;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function Home(){
        return view('pages.home');
    }
    public function pesanan(){
        $listTransaksi = Transaction::all();
        return view('pages.Pesanan', compact('listTransaksi'));
    }
    public function detailpesanan($id){
        $detailpesanan = Transaction::find($id);
        return view('pages.detailpesanan', compact('detailpesanan'));
    }
    public function statusPesanan(){
        return view('pages.statusPesanan');
    }
    public function updateStatusPesanan(Request $request, $id){
        $updateStatusPesanan = Transaction::find($id);
        $updateStatusPesanan->update($request->except('_token'));
        if($updateStatusPesanan){
            return redirect('/pesanan');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Pemesanan gagal');
            return redirect('/pesanan/statusPesanan/'.$id);
        }
    }
    public function pickup(){
        $listPickup = Transaction::all();
        return view('pages.pickup', compact('listPickup'));
    }
    public function addProduct(){
        return view('pages.eksportir.TambahProduk');
    }
    public function daftarPickup(){
        $daftarPickup = Pick_up::all();
        return view('pages.daftarPickup', compact('daftarPickup'));
    }
    public function requestPickup($id){
        $requestPickup = Transaction::find($id);
        return view('pages.requestPickup', compact('requestPickup'));
    }
    public function revisi(Request $request){
        $cari = $request->cari;
        $listProduct = Product::where('nama_barang', 'LIKE', '%'. $cari. '%')
        ->where('status_kelayakan', 'Ditolak (Mohon perbaiki deskripsi barang / foto)')
        ->paginate(15);
        return view('pages.permintaanrevisi', compact(['listProduct']));
    }
    public function updateProduk($id){
        $detailProduct = Product::find($id);
        return view('pages.eksportir.updateProduk', compact(['detailProduct']));
    }
    public function revisiProduk(Request $request, $id){
        $revisiProduk = Product::find($id);
        if ($request->hasFile('foto_barang')) {
            $ekstensi = $request->file('foto_barang')->clientExtension();
            $nama = $request->nama_barang.'-'.now()->timestamp.'.'.$ekstensi;
            $request->file('foto_barang')->storeAs('images', $nama);
            $request['foto_barang'] = $nama;
            $revisiProduk->foto_barang = $nama;
        }
        $revisiProduk->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'status_kelayakan' => 'Menunggu konfirmasi',
        ]);

        if($revisiProduk){
        Session::flash('status', 'success');
        Session::flash('message', 'Proses revisi selesai');
        return redirect('updateProduk/'.$id);
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Proses revisi selesai');
            return redirect('updateProduk/'.$id);
        }
    }
    public function requestPickupMade(Request $request, $id){
        $updateStatusPemesanan = Transaction::find($id);
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
        $updateStatusPemesanan->update([
            'status_pemesanan' => 'Disetujui'
        ]);
        if($requestPickup && $updateStatusPemesanan){
            Session::flash('status', 'success');
            Session::flash('message', 'request pick up berhasil dibuat');
            return redirect('requestPickup/'.$id);
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'request pick up gagal dibuat');
            return redirect('requestPickup/'.$id);
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