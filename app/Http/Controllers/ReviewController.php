<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Atraction;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword) {
            $reviews = Review::where('name', 'like', '%' . $keyword . '%')->paginate(5);
        } else {
            $reviews = Review::orderBy('id')->paginate(5);
        }
        return view('pages.Review.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = \App\Models\Review::findOrFail($id);
        return view('pages.Review.detail', compact('review'));
    }

    public function create()
    {
        $atractions = Atraction::all();
        return view('pages.Review.create', compact('atractions'));
    }

    // public function store(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'atraction_id' => 'required',
    //         'name' => 'required|string|max:255',
    //         'comment' => 'nullable',
    //     ]);
    //     // dd($request->all(),$validatedData);
    //     $review = \App\Models\Review::create($validatedData);
    //     $review->update($validatedData);
    //     return redirect('/reviews')->with('success', 'Review berhasil ditambahkan.');
    // }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'atraction_id' => 'required',
            'name' => 'required|string|max:255',
            'Atraksi' => 'required|string',
            'comment' => 'required|string',
        ]);

        Review::create($validatedData);

        return redirect('/reviews')->with('success', 'Review berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $review = \App\Models\Review::find($id);
        if ($review) {
            $review->delete();
            return redirect('/reviews')->with('success', 'Review berhasil dihapus.');
        } else {
            return redirect('/reviews')->with('error', 'Review tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $atractions = Atraction::all();
        $review = \App\Models\Review::findOrFail($id);
        return view('pages.Review.edit', compact('review', 'atractions'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'atraction_id' => 'required',
            'name' => 'required|string|max:255',
            'Atraksi'=> 'required|string',
            'comment' => 'required|string',
        ], [
            "name.required" => "Pastikan ada mengisi nama",

        ]);

        $review = \App\Models\Review::find($id);
        if ($review) {
            $review->update($validatedData);
            return redirect('/reviews')->with('success', 'Review berhasil diperbarui.');
        } else {
            return redirect('/reviews')->with('error', 'Review tidak ditemukan.');
        }
    }
}
