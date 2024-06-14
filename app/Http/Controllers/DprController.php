<?php

namespace App\Http\Controllers;

use App\Models\DprSubmission;
use App\Models\Votedpr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DprController extends Controller
{
    public function index()
    {
        $dpr_submissions = DprSubmission::all();
        return view('portofolio.dpr.create', compact('dpr_submissions'));
    }

    public function store(Request $request)
    {
        if (DprSubmission::count() > 10) {
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

        DprSubmission::create($validatedData);

        return redirect()->back()->with('success', 'Form DPR submitted successfully!');
    }

    public function show($id)
    {
        $form_dpr = DprSubmission::findOrFail($id);
        return view('portofolio.dpr.show', compact('form_dpr'));
    }

    public function showdpr($id)
    {
        $form_dpr = DprSubmission::findOrFail($id);
        return view('portofolio.showdpr', compact('form_dpr'));
    }

    public function edit($id)
    {
        $form_dpr = DprSubmission::findOrFail($id);
        return view('portofolio.dpr.edit', compact('form_dpr'));
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

        $form_dpr = DprSubmission::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($form_dpr->foto) {
                Storage::disk('public')->delete($form_dpr->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('photos', 'public');
        }

        $form_dpr->update($validatedData);

        return redirect()->route('show', $id)->with('success', 'Form DPR updated successfully!');
    }

    public function destroy($id)
    {
        $form_dpr = DprSubmission::findOrFail($id);

        if ($form_dpr->foto) {
            Storage::disk('public')->delete($form_dpr->foto);
        }

        $form_dpr->delete();

        return redirect()->route('portofolio')->with('success', 'Form DPR deleted successfully!');
    }

    public function index2()
    {
        $dpr_submissions = DprSubmission::all()->groupBy('partai');
        return view('pemilihan.dpr', compact('dpr_submissions'));
    }
    
    public function showdpr2($id)
    {
        $form_dpr = DprSubmission::findOrFail($id);
        $userVote = Votedpr::where('user_id', Auth::id())->first();
        return view('pemilihan.showdpr', compact('form_dpr', 'userVote'));
    }
}
