<?php

namespace App\Livewire\Admin\Page;

use Livewire\Component;

class KelolaUser extends Component
{
    use \Livewire\WithPagination, \App\Traits\AlertService;

    protected $paginationTheme = 'tailwind';

    public $search = '';
    public $name;
    public $email;
    public $nomer;
    public $password;
    public $passwordConfrim;
    public $role_id;
    public $user_id;

    //trigger modal
    public $modalCreate = false;
    public $modalEdit = false;
    public $modalDelete = false;
    public $confirmReset =  false;

    public $userName;


    public function resetForm(){
        $this->name = '';
        $this->email = '';
        $this->nomer = null;
        $this->password = null;
        $this->passwordConfrim=null;
        $this->role_id = '';
        $this->user_id = '';
    }

    public function createUser()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'nomer' => [
                    'nullable',
                    'string',
                    'max:15',
                    'regex:/^62[0-9]+$/', // harus diawali 62
                ],
                'password' => 'required|min:6|same:passwordConfrim',
                'role_id' => 'required',
            ]);

            $this->nomer = preg_replace('/\D/', '', $this->nomer);

            // Pastikan prefix +62
            if (!str_starts_with($this->nomer, '62')) {
                $this->nomer = '+62' . ltrim($this->nomer, '0');
            } else {
                $this->nomer = '+' . $this->nomer;
            }

            // Simpan user
            \App\Models\User::create([
                'id' => \Illuminate\Support\Str::uuid(),
                'name' => $this->name,
                'email' => $this->email,
                'nomer' => $this->nomer,
                'password' => \Illuminate\Support\Facades\Hash::make($this->password),
                'role_id' => $this->role_id,
            ]);

            // Reset pagination ke page 1
            $this->resetForm();
            $this->resetPage();
            $this->modalCreate = false;

            // Reset form
            $this->reset(['name', 'email', 'nomer', 'password', 'passwordConfrim', 'role_id']);

            // Alert sukses
            $this->alert('Berhasil', 'User berhasil ditambahkan', 'success');
        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->alert('Validasi Gagal', 'Cek kembali input yang kamu masukkan.', 'error');
        } catch (QueryException $e) {
            $this->alert('Gagal', 'Database error: ' . $e->getMessage(), 'error');
        } catch (Exception $e) {
            $this->alert('Gagal', 'Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
    }
    
    public function openCreateModal($status){
        $this->resetForm();
        $this->modalCreate = $status;
    }

    public function openConfirmReset($status){
        $this->confirmReset = $status;
    }

    public function resetPassword(){
    
    }
   
    public function openEdit($id){
        $user = \App\Models\User::findOrFail($id);
        $this->user_id =  $user->id;
        $this->name =  $user->name;
        $this->email =  $user->email;
        $this->role_id =  $user->role_id;
        $this->nomer =  preg_replace('/\D/', '', $user->nomer);
        $this->modalEdit = true;
    }

    public function updateUser()
    {
        try{
            $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,'.$this->user_id,
                'nomer' => [
                    'nullable',
                    'string',
                    'max:15',
                    'regex:/^62[0-9]+$/', // harus diawali 62
                ],
                'role_id' => 'required|exists:roles,id',

            ]);

            $this->nomer = preg_replace('/\D/', '', $this->nomer);

            // Pastikan prefix +62
            if (!str_starts_with($this->nomer, '62')) {
                $this->nomer = '+62' . ltrim($this->nomer, '0');
            } else {
                $this->nomer = '+' . $this->nomer;
            }
    
            $user = \App\Models\User::findOrFail($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'nomer'=> $this->nomer,
                'role_id' => $this->role_id,
            ]);
    
            $this->resetForm();
            $this->modalEdit = false;
            $this->resetPage(); 
            $this->alert('Berhasil', 'User berhasil diperbarui', 'success');
        }catch (ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->alert('Validasi Gagal', 'Cek kembali input yang kamu masukkan.', 'error');
        } catch (QueryException $e) {
            $this->alert('Gagal', 'Database error: ' . $e->getMessage(), 'error');
        } catch (Exception $e) {
            $this->alert('Gagal', 'Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
    }

    public function openDelete($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $this->user_id = $id;
        $this->userName = $user->name; // simpan nama user
        $this->modalDelete = true;
    }

    public function deleteUser()
    {
        try{
            $user = \App\Models\User::findOrFail($this->user_id);
            $this->name =  $user->name;
            $user->delete();
            $this->modalDelete = false;
            $this->resetPage();
            $this->reset('user_id', 'modalDelete');
            $this->alert('Berhasil', 'User berhasil dihapus', 'success');
        }catch (QueryException $e) {
            $this->alert('Gagal', 'Database error: ' . $e->getMessage(), 'error');
        } catch (Exception $e) {
            $this->alert('Gagal', 'Terjadi kesalahan: ' . $e->getMessage(), 'error');
        }
        
    }

    public function render()
    {
        $users = \App\Models\User::with(['role:id,role'])->select('id','name','email','nomer','role_id')
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })
        ->paginate(12);

        $roles = \App\Models\Role::select("id","role")->get();
        return view('livewire.admin.page.kelola-user',['users' => $users, 'roles' => $roles])->layout('layouts.admin');
    }
}
