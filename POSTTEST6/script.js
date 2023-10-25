const themeToggleBtn = document.getElementById("theme-toggle-btn");
const body = document.body;

// Add event listener to the theme toggle button
themeToggleBtn.addEventListener("click", () => {
    if (body.classList.contains("dark-mode")) {
        // Disable dark mode
        body.classList.remove("dark-mode");
        resetHeaderStyles();
        resetFooterStyles();
    } else {
        // Enable dark mode
        body.classList.add("dark-mode");
        setHeaderStylesDarkMode();
        setFooterStylesDarkMode();
    }
});

// Check user's preference from previous session (if any)
const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
if (isDarkMode) {
    body.classList.add("dark-mode");
    setHeaderStylesDarkMode();
    setFooterStylesDarkMode();
}

// Function untuk mengubah style header pada dark mode
function setHeaderStylesDarkMode() {
    const header = document.querySelector("header");
    header.style.backgroundColor = "#222";
    header.style.color = "#fff";
}

// Function untuk mengubah style footer pada dark mode
function setFooterStylesDarkMode() {
    const footer = document.querySelector("footer");
    footer.style.backgroundColor = "#333";
    footer.style.color = "#fff";
}

// Function untuk mengembalikan style header ke mode terang
function resetHeaderStyles() {
    const header = document.querySelector("header");
    header.style.backgroundColor = "";
    header.style.color = "";
}

// Function untuk mengembalikan style footer ke mode terang
function resetFooterStyles() {
    const footer = document.querySelector("footer");
    footer.style.backgroundColor = "";
    footer.style.color = "";
}

// ... Kode lainnya Anda tetapkan dalam pertanyaan sebelumnya ...

// Mengambil semua elemen dengan kelas 'container'
const judul = document.getElementsByClassName('container');

// Mengubah warna teks dari setiap elemen dengan kelas 'display-4' menjadi merah
for (let i = 0; i < judul.length; i++) {
    judul[i].style.color = 'black';
}

const button = document.getElementById('btn-info');
button.addEventListener("click", function showinfo() {
    const x = document.getElementById('info');
    if (x.style.display == 'none'){
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
});