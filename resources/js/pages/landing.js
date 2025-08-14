
const toggleBtn = document.getElementById('darkModeToggle');
console.log(toggleBtn);
const htmlEl = document.documentElement;

document.getElementById('loginBtn').addEventListener('click', function() {
        const icon = document.getElementById('loginIcon');
        icon.classList.add('animate-login');
        // Menghapus kelas animasi setelah selesai
        setTimeout(() => {
            icon.classList.remove('animate-login');
        }, 500); // Durasi animasi sama dengan durasi di CSS
});
// Initialize icon
function updateIcon() {
  if (htmlEl.classList.contains('dark')) {
    toggleBtn.innerHTML = '<i class="fas fa-sun"></i>';
  } else {
    toggleBtn.innerHTML = '<i class="fas fa-moon"></i>';
  }
}
// Load saved mode or system preference
if (
  localStorage.getItem('theme') === 'dark' ||
  (!localStorage.getItem('theme') &&
    window.matchMedia('(prefers-color-scheme: dark)').matches)
) {
  htmlEl.classList.add('dark');
} else {
  htmlEl.classList.remove('dark');
}
updateIcon();

toggleBtn.addEventListener('click', () => {
  htmlEl.classList.toggle('dark');
  if (htmlEl.classList.contains('dark')) {
    localStorage.setItem('theme', 'dark');
  } else {
    localStorage.setItem('theme', 'light');
  }
  updateIcon();
});
