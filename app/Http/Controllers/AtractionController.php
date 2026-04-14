<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraction;

class AtractionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword) {
            $atractions = Atraction::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        } else {
            $atractions = Atraction::orderBy('id')->paginate(5);
        }
        return view('pages.Atractions.indexAtraction', compact('atractions'));
    }

    public function show($id)
    {
        $atraction = Atraction::findOrFail($id);
        return view('pages.Atractions.detailAtraction', compact('atraction'));
    }

    public function create()
    {
        return view('pages.Atractions.createAtraction');
    }

    public function store(Request $request)
    {
        Atraction::create($request->all());

        return redirect('/atractions')->with('success', 'Atraksi berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $atraction = Atraction::find($id);
        if ($atraction) {
            $atraction->delete();
            return redirect('/atractions')->with('success', 'Atraksi berhasil dihapus.');
        } else {
            return redirect('/atractions')->with('error', 'Atraksi tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $atraction = Atraction::find($id);
        return view('pages.Atractions.editAtraction', compact('atraction'));
    }
    public function update(Request $request, $id)
    {
        $atraction = Atraction::find($id);
        if ($atraction) {
            $atraction->update($request->all());
            return redirect('/atractions')->with('success', 'Atraksi berhasil diperbarui.');
        } else {
            return redirect('/atractions')->with('error', 'Atraksi tidak ditemukan.');
        }
    }
}
