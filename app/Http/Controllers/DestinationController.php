<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword) {
            $destinations = Destination::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        } else {
            $destinations = Destination::orderBy('id')->paginate(5);
        }
        return view('pages.indexDestinasi', compact('destinations'));
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.detaildestinasi', compact('destination'));
    }

    public function create()
    {
        return view('pages.createDestination');
    }

    public function store(Request $request)
    {
        Destination::create($request->all());

        return redirect('/destinations')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $destination = Destination::find($id);
        if ($destination) {
            $destination->delete();
            return redirect('/destinations')->with('success', 'Destinasi berhasil dihapus.');
        } else {
            return redirect('/destinations')->with('error', 'Destinasi tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('pages.editDestinasi', compact('destination'));
    }
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);
        if ($destination) {
            $destination->update($request->all());
            return redirect('/destinations')->with('success', 'Destinasi berhasil diperbarui.');
        } else {
            return redirect('/destinations')->with('error', 'Destinasi tidak ditemukan.');
        }
    }
}
