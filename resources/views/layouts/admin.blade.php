@extends('layouts.app') @section('layout-body')
<livewire:admin.sidebar />
<livewire:admin.navbar-admin />
<div
    class="flex h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300 overflow-hidden"
>
    <!-- Sidebar -->
    <!-- Overlay -->
    <div
        class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden"
        id="overlay"
    ></div>
    <!-- Main -->
    <div class="flex-1 flex flex-col ml-0 md:ml-64 transition-all duration-300">
        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            {{ $slot }}
        </main>
    </div>
</div>
@endsection
