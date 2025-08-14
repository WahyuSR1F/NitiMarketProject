<div>
    <form
    wire:submit='register'
    id="form-register"
    class="space-y-5"
    autocomplete="off"
    aria-label="Register form"
  >
  @csrf
    <div>
      <label for="register-name" class="block text-xs font-semibold mb-1">Full Name</label>
      <input
        id="register-name"
        name="name"
        wire:model='name'
        type="text"
        required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
        placeholder="Your full name"
      />
      @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
      <label for="register-nomer" class="block text-xs font-semibold mb-1">No Telephone</label>
      <input
        id="register-nomer"
        name="number"
        wire:model='nomer'
        type="number"
        required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
        placeholder="Tambahkan 62 bukan +62 depan nomor"
      />
      @error('nomer') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
      <label for="register-email" class="block text-xs font-semibold mb-1">Email</label>
      <input
        id="register-email"
        name="email"
        wire:model='email'
        type="email"
        required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
        placeholder="you@example.com"
      />
      @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
      <label for="register-password" class="block text-xs font-semibold mb-1">Password</label>
      <input
        id="register-password"
        name="password"
        wire:model='password'
        type="password"
        required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
        placeholder="********"
      />
      @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div>
      <label for="register-password" class="block text-xs font-semibold mb-1">Password Confirm</label>
      <input
        id="register-password"
        name="password_confirmation"
        wire:model='password_confirmation'
        type="password"
        required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
        placeholder="********"
      />
      @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <button
      type="submit"
      class="bg-[#ff4a4a] text-white text-xs font-semibold px-6 py-2 rounded w-full hover:bg-[#e04343] transition"
    >
      Register
    </button>
    
  </form>
</div>
