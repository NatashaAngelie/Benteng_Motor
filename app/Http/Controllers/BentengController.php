<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Produk;
use App\Models\Transaksi;

class BentengController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function showRegister() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'email' => 'required|unique:akun,email',
            'password' => 'required|min:5',
        ]);

        Akun::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/')->with('success', 'Register berhasil');
    }

    public function login(Request $request) {
        $akun = Akun::where('email', $request->email)->first();

        if ($akun && Hash::check($request->password, $akun->password)) {
            Session::put('email', $akun->email);
            return redirect('/inventory');
        }

        return back()->with('error', 'Login gagal!');
    }

    public function inventory() {
        if (!Session::has('email')) return redirect('/');
    
        $produk = Produk::all(); // ambil data produk
        return view('inventory', compact('produk'));
    }    

    public function TambahProduk() {
        return view('tambah_produk');
    }
    
    public function simpanProduk(Request $request) {
        $request->validate([
            'nama_produk' => 'required',
            'harga_per_unit' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);
    
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga_per_unit' => $request->harga_per_unit,
            'jumlah' => $request->jumlah,
        ]);
    
        return redirect('/inventory')->with('success', 'Produk berhasil ditambahkan!');
    }    

    public function editProduk($id) {
        $produk = Produk::findOrFail($id);
        return view('edit_produk', compact('produk'));
    }

    public function updateProduk(Request $request, $id) {
        $request->validate([
            'nama_produk' => 'required',
            'harga_per_unit' => 'required|numeric',
            'jumlah' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga_per_unit' => $request->harga_per_unit,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/inventory')->with('success', 'Produk berhasil diperbarui');
    }

    public function hapusProduk($id) {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect('/inventory')->with('success', 'Produk berhasil dihapus');
    }

    public function transaksi() {
        $data = Transaksi::all();
        return view('transaksi', compact('data'));
    }

    public function tambahTransaksi() {
        return view('tambah_transaksi');
    }

    public function simpanTransaksi(Request $request) {
        Transaksi::create($request->all());
        return redirect('/transaksi')->with('success', 'Transaksi ditambahkan');
    }

    public function editTransaksi($id) {
        $transaksi = Transaksi::findOrFail($id);
        return view('edit_transaksi', compact('transaksi'));
    }

    public function updateTransaksi(Request $request, $id) {
        Transaksi::findOrFail($id)->update($request->all());
        return redirect('/transaksi')->with('success', 'Transaksi diupdate');
    }

    public function hapusTransaksi($id) {
        Transaksi::findOrFail($id)->delete();
        return redirect('/transaksi')->with('success', 'Transaksi dihapus');
    }

    public function logout() {
        Session::flush();
        return redirect('/');
    }
}
