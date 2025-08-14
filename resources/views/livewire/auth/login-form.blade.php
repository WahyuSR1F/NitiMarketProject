<div>
        <!-- Login Form -->
        <form
          wire:submit="login"
          id="form-login"
          class="space-y-5"
          autocomplete="off"
          aria-label="Login form"
          >
          @csrf
          <div>
            <label for="login-email" class="block text-xs font-semibold mb-1">Email</label>
            <input
              id="login-email"
              name="email"
              wire:model.defer="email"
              type="email"
              required
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
              placeholder="you@example.com"
            />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>
          <div>
            <label for="login-password" class="block text-xs font-semibold mb-1">Password</label>
            <input
              id="login-password"
              name="password"
              wire:model.defer="password"
              type="password"
              required
              class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff4a4a]"
              placeholder="********"
            />
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </div>
          <button 
            type="submit"
            class="bg-[#ff4a4a] text-white text-xs font-semibold px-6 py-2 rounded w-full hover:bg-[#e04343] transition"
          >
            Login
          </button>
        </form>
</div>
