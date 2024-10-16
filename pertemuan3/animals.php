<?php
# Nama : Ilyas Abdul Aziz
# NIM : 0110223292
# Kelas : SE02

class Animal {
    // Property animals (array)
    public $animals;

    // Constructor untuk mengisi data awal animals
    public function __construct() {
        $this->animals = ['Paus','Lobster'];
    }

    // Method untuk menampilkan seluruh data animals
    public function index() {
        foreach ($this->animals as $index => $animals) {
        }
    }

    // Method untuk menambahkan hewan baru
    public function store($animal) {
        if (is_string($animal)) {
            array_push($this->animals, $animal);
        }
    }

    // Method untuk memperbarui data hewan
    public function update($index, $newAnimal) {
        if (isset($this->animals[$index])) {
            $oldAnimal = $this->animals[$index];
            $this->animals[$index] = $newAnimal;
        }
    }

    // Method untuk menghapus data hewan
    public function destroy($index) {
        if (isset($this->animals[$index])) {
            $deletedAnimal = $this->animals[$index];
            array_splice($this->animals, $index, 1);
            $this->animals = array_values($this->animals);
        }
    }
}

$animal = new Animal();

// Menampilkan seluruh data animals
echo 'Index - Menampilkan seluruh data hewan ';
$animal->index();

print_r($animal->animals);
echo PHP_EOL;

// Menambahkan hewan baru
echo 'Store - Menambahkan data hewan baru ';
$animal->store('Burung');
$animal->index();

print_r($animal->animals);
echo PHP_EOL;

// Memperbarui data hewan
echo 'Update - Mengupdate data hewan ';
$animal->update(0, 'Kucing Anggora');
$animal->index();

print_r($animal->animals);
echo PHP_EOL;


// Menghapus data hewan
echo 'Destroy - Menghapus data hewan ';
$animal->destroy(1);
$animal->index();

print_r($animal->animals);
echo PHP_EOL;