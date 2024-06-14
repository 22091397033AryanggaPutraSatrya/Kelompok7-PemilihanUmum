<?php

namespace App\Http\Controllers;

use App\Models\DprdprovSubmission;
use App\Models\Votedprdprov;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DprdprovController extends Controller
{
    public function index()
    {
        $dprdprov_submissions = DprdprovSubmission::all();
        return view('portofolio.dprdprov.create', compact('dprdprov_submissions'));
    }

    public function store(Request $request)
    {
        if (DprdprovSubmission::count() > 10) {
            return redirect()->back()->with('error', 'You can only submit one form');
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'partai' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'visi_misi' => 'required|string',
            'pendidikan' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'organisasi' => 'required|string',
            'prestasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('photos', 'public');
        }

        DprdprovSubmission::create($validatedData);

        return redirect()->back()->with('success', 'form_dprdprov submitted successfully!');
    }

    public function show($id)
    {
        $form_dprdprov = DprdprovSubmission::findOrFail($id);
        return view('portofolio/dprdprov/show', compact('form_dprdprov'));
    }

    public function showdprdprov($id)
    {
        $form_dprdprov = DprdprovSubmission::findOrFail($id);
        return view('portofolio/showdprdprov', compact('form_dprdprov'));
    }

    public function edit($id)
    {
        $form_dprdprov = DprdprovSubmission::findOrFail($id);
        return view('portofolio/dprdprov/edit', compact('form_dprdprov'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'partai' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:255',
            'visi_misi' => 'required|string',
            'pendidikan' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'organisasi' => 'required|string',
            'prestasi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $form_dprdprov = DprdprovSubmission::findOrFail($id);

        if ($request->hasFile('foto')) {
            
            if ($form_dprdprov->foto) {
                Storage::disk('public')->delete($form_dprdprov->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('photos', 'public');
        }

        $form_dprdprov->update($validatedData);

        return redirect()->route('show', $id)->with('success', 'form_dprdprov updated successfully!');
    }

    public function destroy($id)
    {
        $form_dprdprov = DprdprovSubmission::findOrFail($id);

        if ($form_dprdprov->foto) {
            Storage::disk('public')->delete($form_dprdprov->foto);
        }

        $form_dprdprov->delete();

        return redirect()->route('portofolio')->with('success', 'form_dprdprov deleted successfully!');
    }

    public function index2()
    {
        $dprdprov_submissions = DprdprovSubmission::all()->groupBy('partai');
        return view('pemilihan.dprdprov', compact('dprdprov_submissions'));
    }
    
    public function showdprdprov2($id)
    {
        $form_dprdprov = DprdprovSubmission::findOrFail($id);
        $userVote = Votedprdprov::where('user_id', Auth::id())->first();
        return view('pemilihan/showdprdprov', compact('form_dprdprov', 'userVote'));
    }
}
