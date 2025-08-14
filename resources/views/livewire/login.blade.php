<div class="max-w-7xl mx-auto px-6 py-12 md:flex md:items-center md:justify-between md:gap-12 min-h-[600px]">
    <!-- Left side: selection and forms -->
    <div class="md:w-1/2 bg-white rounded-lg shadow-lg p-8 max-w-md mx-auto z-20 relative flex flex-col">
      <div class="mb-8 text-center">
        <h1 class="text-2xl font-extrabold mb-2">Selamat Datang di Niti Market</h1>

        <p class="text-xs text-[#152238]">
          Silakan pilih untuk masuk atau daftar akun baru.
        </p>
      
      </div>

      <div class="flex justify-center space-x-6 mb-8">
        <button wire:click="showLogin" type="button"
            class="text-xs font-semibold px-6 py-2 rounded border border-[#ff4a4a] text-[#ff4a4a] hover:bg-[#ff4a4a] hover:text-white transition">
            Login
        </button>
        <button wire:click="showRegister" type="button"
            class="text-xs font-semibold px-6 py-2 rounded border border-gray-300 text-gray-500 hover:border-[#ff4a4a] hover:text-[#ff4a4a] transition">
            Register
        </button>
      </div>

      <!-- Forms container -->
      <div class="flex-1">
          
        
      
         {{-- Load Component --}}
         @if ($activeComponent === 'login')
              <livewire:auth.login-form wire:key="login" />
          @elseif ($activeComponent === 'register')
              <livewire:auth.register-form wire:key="register" />
          @endif
      </div>
    </div>

    <!-- Right side: image with orange overlay -->
    <div class="md:w-1/2 relative rounded-lg overflow-hidden max-w-xl h-[600px]">
      <img
        src="https://storage.googleapis.com/a1aa/image/aa6b5b2c-f843-41d8-0d5f-9d2d36182f0e.jpg"
        alt="Traditional grocery store stall with various packaged goods and hanging items"
        class="absolute inset-0 w-full h-full object-cover"
        width="600"
        height="600"
      />
      <div
        class="absolute inset-0 bg-gradient-to-br from-[#ff4a4a] to-[#ff7f7f] opacity-90 mix-blend-overlay pointer-events-none"
      ></div>
    </div>
</div>