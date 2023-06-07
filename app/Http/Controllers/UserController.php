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
    public function payments(Request $request, $id){
        $getid = Product::find($id);
        $ekstensi = $request->file('bukti_pembayaran')->clientExtension();
        $nama = $request->nama_pemesan.'-'.now()->timestamp.'.'.$ekstensi;
        $request->file('bukti_pembayaran')->storeAs('images', $nama);

        // Hitung total harga berdasarkan jumlah pemesanan
        $total_harga = $request->harga * $request->jumlah_pemesan;

        $payments = Transaction::create([
            'id_product' => $getid -> id,
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
    public function daftarRequest(){
        $daftarRequest = ModelsRequest::all();
        return view('pages.daftarRequest', compact('daftarRequest'));
    }
    public function detailRequest($id){
        $detailRequest = ModelsRequest::find($id);
        return view('pages.detailRequest', compact('detailRequest'));
    }
    public function requestBarang(){
        return view('pages.requestBarang');
    }
    public function updateStatus($id){
        $updateStatus = ModelsRequest::find($id);
        return view('pages.updateStatusRequest', compact('updateStatus'));
    }
    
    public function requestmade(Request $request){
        $insertProduct = ModelsRequest::create([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'detail_produk' => $request->detail_produk,
            'status_request' => 'Sedang dicari',
        ]);
        if($insertProduct){
            Session::flash('status', 'success');
            Session::flash('message', 'Request barang berhasil dibuat');
            return redirect('/requestBarang');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Request barang gagal dibuat');
            return redirect('/requestBarang');
        }
    }
    public function updateStatusRequest(Request $request, $id){
        $updateStatusRequest = ModelsRequest::find($id);
        $updateStatusRequest->update($request->except('_token'));

        if($updateStatusRequest){
            Session::flash('status', 'success');
            Session::flash('message', 'Status berhasil dirubah');
            return redirect('/daftarRequest');
        } else {
            Session::flash('status', 'failed');
            Session::flash('message', 'Status gagal dirubah');
            return redirect('/daftarRequest');
        }
    }
    public function pencairandana(){
        $listTransaction =Transaction::all();
        return view('pages.pencairanDana', compact('listTransaction'));
    }
}
