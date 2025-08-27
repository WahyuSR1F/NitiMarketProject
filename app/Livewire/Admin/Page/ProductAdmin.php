<?php

namespace App\Livewire\Admin\Page;

use Livewire\Component;

class ProductAdmin extends Component
{
    use \Livewire\WithPagination, \App\Traits\AlertService, \Livewire\WithFileUploads;
    public $search = '';
    public $perPage = 12;

    //filter
    public $kategori; 
    public $hargaMax;
    public $hargaMin;
    public $dateMasuk;
    public $asalPerusahaan;


    //form
    public $name;
    public $harga;
    public $stok;
    public $deskripsi;
    public $kategoriId;
    public $asal;
    public $productsBy;
    public $productImg;
    public $productBy;

    //excecute
    public $deleteId;


    //modal optimasion
    public $modalCreate =  false;
    public $modalEdit =  false;
    public $modalDelete =  false;

    private function resetInputFields()
    {
        $this->name = '';
        $this->harga = '';
        $this->stok = '';
        $this->deskripsi = '';
        $this->kategoriId = '';
        $this->asal = '';
        $this->productsBy = '';
        $this->productImg = null; // biasanya file pakai null
    }

    public function resetFilter()
    {
        $this->reset([
            'kategori',
            'hargaMin',
            'hargaMax',
            'dateMasuk',
            'asalPerusahaan',
        ]);
    }

    public function modalCreateOpen($status){
        $this->resetInputFields();
        $this->modalCreate =  $status;
       
    }

    public function modalDeleteOpen($id = null, $status){
       $this->deleteId = $id;
       $this->modalDelete = $status;
    }
    

    public function modalEditOpen($id = null,$status){
        if ($status == true){
            $product = \App\Models\Product::findOrFail($id);
            $this->name = $product->nama;
            $this->harga = $product->harga;
            $this->stok = $product->stok;
            $this->deskripsi = $product->deskripsi;
            $this->kategoriId = $product->kategori_id;
            $this->asal = $product->asal;
            $this->productBy = $product->product_by;
            $this->productImg = $product->productImg;
        }else{
            $this->resetInputFields();
        }
        $this->modalEdit =  $status;

    }

    public function createProduct()
    {
  
        try{
        
            $this->validate([
                'name'       => 'required|string|max:255',
                'harga'      => 'required|numeric',
                'deskripsi'  => 'nullable|string',
                'kategoriId' => 'required|exists:kategoris,id', // pastikan tabel kategori ada
                'asal'       => 'nullable|string|max:255',
                'productsBy' => 'nullable|string|max:255',
                'productImg' => 'nullable|image|max:2048', // max 2MB
            ]);

            dd($this->productImg);

            $filePath =  $this->productImg->store('product');
        
            // Upload file jika ada
        
            // Simpan ke database
            \App\Models\Product::create([
                'nama'        => $this->name,
                'harga'       => $this->harga,
                'deskripsi'   => $this->deskripsi,
                'kategori_id' => $this->kategoriId,
                'asal'        => $this->$filePath,
                'products_by' => $this->productsBy,
            ]);
        
            // Reset form
            $this->reset([
                'name',
                'harga',
                'deskripsi',
                'kategoriId',
                'asal',
                'productsBy',
                'productImg',
            ]);
            $this->resetPage();
            // Kirim notifikasi ke frontend
            $this->alert('Berhasil', 'User berhasil ditambahkan', 'success');

        } catch (\Illuminate\Validation\ValidationException $e) {
          // simpan ke error bag supaya tetap muncul di @error()
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }

            // gabung semua error jadi string untuk alert
            $allErrors = collect($e->errors())->flatten()->implode("\n");

            $this->alert(
                'Validasi Gagal',
                $allErrors, // tampil semua pesan error
                'error'
            );

            return;
        } catch (\Illuminate\Database\QueryException $e) {
            $this->alert('Gagal', 'Database error: ' . $e->getMessage(), 'error');
            return;
        } catch (Exception $e) {
            $this->alert('Gagal', 'Terjadi kesalahan: ' . $e->getMessage(), 'error');
            return;
        }
        // Validasi input
     
    }
    

    public function applyFilter()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = \App\Models\Product::with('kategoris')->when($this->search, function ($query){
            $query->where(function ($q){
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('harga','like','%' . $this->search . '%')
                  ->orWhere('deskripsi','like','%' . $this->search . '%')
                  ->orWhere('asal','like','%' . $this->search . '%')
                  ->orWhere('product_by','like', '%' . $this->search . '%');
            });
        })
         // 🏷️ filter kategori
         ->when($this->kategori, function ($query) {
            $query->where('kategori_id', $this->kategori);
        })
        // 💰 filter harga
        ->when($this->hargaMin, function ($query) {
            $query->where('harga', '>=', (int) $this->hargaMin);
        })
        ->when($this->hargaMax, function ($query) {
            $query->where('harga', '<=', (int) $this->hargaMax);
        })
        // 📅 filter tanggal masuk
        ->when($this->dateMasuk, function ($query) {
            $query->whereDate('created_at', '>=', $this->dateMasuk);
        })
        // 🏭 filter asal perusahaan
        ->when($this->asalPerusahaan, function ($query) {
            $query->where('product_by', 'like', '%' . $this->asalPerusahaan . '%');
        })
        ->paginate($this->perPage);
        $kategori = \App\Models\Kategori::select('id', 'nama')->get();
        return view('livewire.admin.page.product-admin',['products' => $products, 'kategoris' => $kategori])->layout('layouts.admin');
    }
}
