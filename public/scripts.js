var sidebarBtn = document.getElementById('sidebarBtn');
var sidebar = document.getElementById('sidebar');
var topbar = document.getElementById('topbar');
var content = document.getElementById('content');

sidebarBtn.addEventListener('click', function() {
    sidebar.style.left = "-260px";
    topbar.style.left = "0";
    topbar.style.width = "100%";
    content.style.left = "0";
    content.style.width = "100%";
})

// TODO: toggle functionality on sidebar toggle button

// data tables initialization
$(document).ready( function () {
    $('#table').DataTable();
} );