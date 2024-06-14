<?php

namespace App\Http\Controllers;

use App\Models\DpdSubmission;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DpdController extends Controller
{
    public function index()
    {
        $dpd_submissions = DpdSubmission::all();
        return view('portofolio/dpd/create', compact('dpd_submissions'));
    }

    public function store(Request $request)
    {
        if (DpdSubmission::count() > 10) {
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

        DpdSubmission::create($validatedData);

        return redirect()->back()->with('success', 'form_dpd submitted successfully!');
    }

    public function show($id)
    {
        $form_dpd = DpdSubmission::findOrFail($id);
        return view('portofolio/dpd/show', compact('form_dpd'));
    }

    public function showdpd($id)
    {
        $form_dpd = DpdSubmission::findOrFail($id);
        return view('portofolio/showdpd', compact('form_dpd'));
    }

    public function editdpd($id)
    {
        $form_dpd = DpdSubmission::findOrFail($id);
        return view('portofolio/dpd/edit', compact('form_dpd'));
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

        $form_dpd = DpdSubmission::findOrFail($id);

        if ($request->hasFile('foto')) {
            
            if ($form_dpd->foto) {
                Storage::disk('public')->delete($form_dpd->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('photos', 'public');
        }

        $form_dpd->update($validatedData);

        return redirect()->route('show', $id)->with('success', 'form_dpd updated successfully!');
    }

    public function destroy($id)
    {
        $form_dpd = DpdSubmission::findOrFail($id);

        if ($form_dpd->foto) {
            Storage::disk('public')->delete($form_dpd->foto);
        }

        $form_dpd->delete();

        return redirect()->route('portofolio')->with('success', 'form_dpd deleted successfully!');
    }

    public function index2()
    {
        $dpd_submissions = DpdSubmission::all()->groupBy('partai');
        return view('pemilihan/dpd', compact('dpd_submissions'));
    }

    public function showdpd2($id)
    {
        $form_dpd = DpdSubmission::findOrFail($id);
        $userVote = Vote::where('user_id', Auth::id())->first();
        return view('pemilihan.showdpd', compact('form_dpd', 'userVote'));
    }
}