@extends('layouts.app') @section('layout-body')
<x-navigation.navigation-menu />
<livewire:main-search />
{{ $slot }}

{{-- Dark Mode Toggle + Bounce Animation --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleBtn = document.getElementById("darkModeToggle");
        const htmlEl = document.documentElement;

        // Toggle login button animation
        document
            .getElementById("loginBtn")
            ?.addEventListener("click", function () {
                const icon = document.getElementById("loginIcon");
                if (icon) {
                    icon.classList.add("animate-login");
                    setTimeout(
                        () => icon.classList.remove("animate-login"),
                        500
                    );
                }
            });

        // Dark mode init
        function updateIcon() {
            if (!toggleBtn) return; // ✅ kalau tombol nggak ada, jangan jalanin apa-apa
            toggleBtn.innerHTML = htmlEl.classList.contains("dark")
                ? '<i class="fas fa-sun"></i>'
                : '<i class="fas fa-moon"></i>';
        }

        if (
            localStorage.getItem("theme") === "dark" ||
            (!localStorage.getItem("theme") &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            htmlEl.classList.add("dark");
        }

        updateIcon();

        // Toggle dark mode
        toggleBtn?.addEventListener("click", () => {
            htmlEl.classList.toggle("dark");
            localStorage.setItem(
                "theme",
                htmlEl.classList.contains("dark") ? "dark" : "light"
            );
            updateIcon();
        });
    });
</script>
@endsection
