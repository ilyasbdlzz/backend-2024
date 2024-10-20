<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller {

    private $animals = ['Monyet', 'Anjing', 'Kelinci','Hamster','Singa'];

    public function index() {
        return response()->json(['Berikut adalah array dari dari animals' => $this->animals]);
    }

    //methd untuk menambahkan Hewan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
        ]);

        // Menambahkan data hewan ke array
        array_push($this->animals, $request->name);

        return response()->json(['Pesan dari API' => 'Berhasil menambahkan Hewan ke Array!', 'animals' => $this->animals]);
    }

    // Method untuk memperbarui data hewan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
        ]);

        if (isset($this->animals[$id])) {
            $this->animals[$id] = $request->name;
            return response()->json(['Pesan dari API' => 'Hewan berhasil diperbarui!', 'animals' => $this->animals]);
        } else {
            return response()->json(['Pesan dari API' => 'Hewan tidak ditemukan!'], 404);
        }
    }
    

    // Method untuk menghapus data hewan
    public function destroy($id)
    {
        if (isset($this->animals[$id])) {
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals);
            return response()->json(['Pesan dari API' => 'Hewan berhasil dihapus!', 'animals' => $this->animals]);
        } else {
            return response()->json(['Pesan dari API' => 'Hewan tidak ditemukan!'], 404);
        }
    }
    
}

