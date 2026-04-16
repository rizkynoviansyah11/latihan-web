<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraction;
use App\Models\Destination;

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
        $atraction = \App\Models\Atraction::findOrFail($id);
        return view('pages.Atractions.detailAtraction', compact('atraction'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('pages.Atractions.createAtraction', compact('destinations'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'destination_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable',
        ]);
        // dd($request->all(),$validatedData);
        $atraction = \App\Models\Atraction::create($validatedData);
        $atraction->update($validatedData);
        return redirect('/atractions')->with('success', 'Atraksi berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $atraction = \App\Models\Atraction::find($id);
        if ($atraction) {
            $atraction->delete();
            return redirect('/atractions')->with('success', 'Atraksi berhasil dihapus.');
        } else {
            return redirect('/atractions')->with('error', 'Atraksi tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $destinations = Destination::all();
        $atraction = \App\Models\Atraction::findOrFail($id);
        return view('pages.Atractions.editAtraction', compact('atraction', 'destinations'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'destination_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable',
        ],[
            "name.required"=>"Pastikan ada mengisi nama",
            
        ]);

        $atraction = \App\Models\Atraction::find($id);
        if ($atraction) {
            $atraction->update($validatedData);
            return redirect('/atractions')->with('success', 'Atraksi berhasil diperbarui.');
        } else {
            return redirect('/atractions')->with('error', 'Atraksi tidak ditemukan.');
        }
    }
}
