const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebarToggle');
const closeBtn = document.getElementById('closeBtn');

sidebarToggle.addEventListener('click', () => {
    sidebar.style.right = "0";
});

closeBtn.addEventListener('click', () => {
    sidebar.style.right = "-350px";
});

// Close sidebar when clicking outside
document.addEventListener('click', (event) => {
    if (sidebar.style.right === "0" && !sidebar.contains(event.target) && event.target !== sidebarToggle) {
        sidebar.style.right = "-350px";
    }
});
