<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Traits\AlertService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;


class RegisterForm extends Component
{
    use AlertService;
    public string $name;
    public string $email;
    public string $nomer;
    public string $password;
    public string $password_confirmation;

    public function register()
    {
        try {
            $request=  new \Illuminate\Http\Request();
            $request->merge([
                'email' => $this->email,
                'name' => $this->name,
                'nomer' => $this->nomer,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation
            ]); 
            $controller = new \App\Http\Controllers\Register();
            $response = $controller->registeredMemberProcess($request);    
            $this->alert('Berhasil', 'data berhasil registrasi, silahkan login', 'success');
            return back();
        } catch (ValidationException $e) {
       
            // Livewire sudah otomatis mengikat error ke view, jadi ini bisa dihilangkan kecuali kamu mau custom
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            return back();
        } catch (QueryException $e) {
         
            // Tangani error database (misal: email sudah ada)
            $this->alert('Gagal', $e->getMessage(), 'error');
            return back();
        } catch (Exception $e) {
            // Tangani error lainnya (misal typo, null error, dll)
            $this->alert('Gagal', 'Terjadi kesalahan saat mendaftar: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function render()
    {
        return view('livewire.auth.register-form')->layout('layouts.app');
    }
}
