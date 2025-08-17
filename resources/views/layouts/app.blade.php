<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $title ?? config("app.name") }}</title>

        {{-- Tailwind CSS CDN --}}
        <script src="https://cdn.tailwindcss.com"></script>

        {{-- FontAwesome --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- Custom Styles --}}
        <style>
            body {
                font-family: "Inter", sans-serif;
            }

            .animate-login {
                animation: bounce 0.5s;
            }

            @keyframes bounce {
                0%,
                20%,
                50%,
                80%,
                100% {
                    transform: translateY(0);
                }

                40% {
                    transform: translateY(-10px);
                }

                60% {
                    transform: translateY(-5px);
                }
            }
        </style>

        {{-- Tailwind Configuration --}}
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primaryRed: "#ff4a4a",
                            primaryRedHover: "#e03f3f",
                            primaryRedLight: "#ff7f7f",
                            darkBg: "#152238",
                            darkText: "#f9fafb",
                        },
                        fontFamily: {
                            inter: ["Inter", "sans-serif"],
                        },
                    },
                },
            };
        </script>
    </head>

    <body
        class="bg-[#f9fafb] text-[#152238] dark:bg-darkBg dark:text-darkText transition-colors duration-500"
    >
        @livewireStyles @livewireScripts @stack('scripts') @yield('layout-body')

        {{-- Footer --}}
        <footer
            class="bg-[#f9fafb] dark:bg-darkBg text-xs text-center text-gray-500 dark:text-gray-400 py-4 border-t border-gray-200 dark:border-gray-700"
        >
            Copyright © 2025 - WordPress Theme by CreativeThemes
        </footer>

        {{-- Scripts --}}
        {{-- SweetAlert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("livewire:init", () => {
                Livewire.on("swal:alert", (data) => {
                    const alertData = data[0]; // Ambil dari array pertama
                    Swal.fire({
                        title: alertData.title || "Info",
                        text: alertData.text || "",
                        icon: alertData.icon || "info",
                        confirmButtonText: alertData.confirmButtonText || "OK",
                        customClass: {
                            popup: "swal-small",
                        },
                    });
                });

                Livewire.on("swal:toast", (data) => {
                    const toastData = data[0];
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: toastData.timer || 3000,
                        timerProgressBar: true,
                    });

                    Toast.fire({
                        icon: toastData.icon || "success",
                        title: toastData.title || "",
                    });
                });
            });
        </script>
    </body>
</html>
