<?php

namespace App\Http\Controllers;

use App\Models\DprdkabSubmission;
use App\Models\Votedprdkab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DprdkabController extends Controller
{
    public function index()
    {
        $dprdkab_submissions = DprdkabSubmission::all();
        return view('portofolio.dprdkab.create', compact('dprdkab_submissions'));
    }

    public function store(Request $request)
    {
        if (DprdkabSubmission::count() > 10) {
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

        DprdkabSubmission::create($validatedData);

        return redirect()->back()->with('success', 'form_dprdkab submitted successfully!');
    }

    public function show($id)
    {
        $form_dprdkab = DprdkabSubmission::findOrFail($id);
        return view('portofolio/dprdkab/show', compact('form_dprdkab'));
        // return view('portofolio/dpr/show', ['id' => $id]);
    }

    public function showdprdkab($id)
    {
        $form_dprdkab = DprdkabSubmission::findOrFail($id);
        return view('portofolio/showdprdkab', compact('form_dprdkab'));
        // return view('portofolio/dpr/show', ['id' => $id]);
    }

    public function edit($id)
    {
        $form_dprdkab = DprdkabSubmission::findOrFail($id);
        return view('portofolio/dprdkab/edit', compact('form_dprdkab'));
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

        $form_dprdkab = DprdkabSubmission::findOrFail($id);

        if ($request->hasFile('foto')) {
            
            if ($form_dprdkab->foto) {
                Storage::disk('public')->delete($form_dprdkab->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('photos', 'public');
        }

        $form_dprdkab->update($validatedData);

        return redirect()->route('show', $id)->with('success', 'form_dprdkab updated successfully!');
    }

    public function destroy($id)
    {
        $form_dprdkab = DprdkabSubmission::findOrFail($id);

        if ($form_dprdkab->foto) {
            Storage::disk('public')->delete($form_dprdkab->foto);
        }

        $form_dprdkab->delete();

        return redirect()->route('portofolio')->with('success', 'form_dprdkab deleted successfully!');
    }
    
    public function index2()
    {
        $dprdkab_submissions = DprdkabSubmission::all()->groupBy('partai');
        return view('pemilihan.dprdkab', compact('dprdkab_submissions'));
    }

    public function showdprdkab2($id)
    {
        $form_dprdkab = DprdkabSubmission::findOrFail($id);
        $userVote = Votedprdkab::where('user_id', Auth::id())->first();
        return view('pemilihan/showdprdkab', compact('form_dprdkab', 'userVote'));
    }
}
