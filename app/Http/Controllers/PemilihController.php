<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PemilihController extends Controller
{
    public function register(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'nik' => 'required|unique:users,nik',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'password' => 'required|min:6',
        ]);

        // Save voter data to the database
        $user = new User();
        $user->nik = $request->nik;
        $user->nama = $request->nama;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->agama = $request->agama;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('loginpemilihan')->with('success', 'Pendaftaran Akun Berhasil');
    }

    public function login(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            // If authentication is successful, redirect to the appropriate page
            return redirect()->route('homepemilih');
        } else {
            // If authentication fails, return with an error message
            return back()->with('error', 'NIK atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpemilihan');
    }
}
