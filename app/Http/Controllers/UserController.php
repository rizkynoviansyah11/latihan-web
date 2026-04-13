<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('pages.createUser');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data user ke database
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect('/users')->with('success', 'User berhasil ditambahkan.');
    }

    public function index(Request $request)
    {
        $keyword = $request->input('search');
        if ($keyword) {
            $users = User::where('name', 'like', '%' . $keyword . '%')->paginate(10);
        } else {
            $users = User::orderBy('id')->paginate(10);
        }
        return view('pages.indexUser', compact('users'));
    }
    
    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/users')->with('success', 'User berhasil dihapus.');
        } else {
            return redirect('/users')->with('error', 'User tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.editUser', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            return redirect('/users')->with('success', 'User berhasil diperbarui.');
        } else {
            return redirect('/users')->with('error', 'User tidak ditemukan.');
        }
    }

}
