<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        return view('pages.Destinations.indexDestinasi', compact('destinations'));
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('pages.Destinations.detaildestinasi', compact('destination'));
    }

    public function create()
    {
        return view('pages.Destinations.createDestination');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ticket_price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'working_days' => 'required|string|max:255',
        ], [
            "name.required" => "Pastikan Nama itu di isi",
            "description.required" => "Pastikan mengisi deskripsi",
            "ticket_price" => "Pastikan mengisi harga tiket",
            "working_hours" => "Pastikan mengisi hari operasional"
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = basename($imagePath);
        }
        \App\Models\Destination::create($validatedData);

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
        return view('pages.Destinations.editDestinasi', compact('destination'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ticket_price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'working_days' => 'required|string|max:255',
        ], [
            "name.required" => "Pastikan Nama itu di isi",
            "description.required" => "Pastikan mengisi deskripsi",
            "ticket_price.required" => "Pastikan mengisi harga tiket",
            "working_hours.required" => "Pastikan mengisi hari operasional"
        ]);
        $destination = \App\Models\Destination::find($id);

        if ($destination) {
            if ($destination->image && $request->hasFile('image')) {
                Storage::disk('public')->delete('images/' . $destination->image);
            }

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $validatedData['image'] = basename($imagePath);
            }

            $destination->update($validatedData);
            return redirect('/destinations')->with('success', 'Destinasi berhasil diperbarui.');
        } else {
            return redirect('/destinations')->with('error', 'Destinasi tidak ditemukan.');
        }
    }
}
