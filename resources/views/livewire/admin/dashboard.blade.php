
<div class="flex h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300 overflow-hidden">
  <!-- Sidebar -->
  <livewire:admin.sidebar/>
  <!-- Overlay for mobile when sidebar is open -->
  <div class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden" id="overlay">
  </div>
  <!-- Main content -->
  <div class="flex-1 flex flex-col ml-0 md:ml-64 transition-all duration-300">
   <!-- Navbar -->

   <!-- Content -->
   <main class="flex-1 overflow-y-auto p-6 md:p-8">
    <h2 class="text-3xl font-semibold mb-6 text-primary dark:text-primary-light">
     Welcome to your dashboard
    </h2>
    <p class="text-gray-700 dark:text-gray-300 max-w-3xl leading-relaxed">
     This is a modern, fully responsive dashboard layout with a sidebar and a navbar using Tailwind CSS. It includes a dark mode toggle and uses your dominant red color (#FF4B4B) for highlights and accents. On smaller screens, the sidebar is hidden by default and can be toggled with the hamburger menu.
    </p>
   </main>
  </div>
</div>

