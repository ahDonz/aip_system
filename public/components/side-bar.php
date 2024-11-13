<nav class="side-navbar">
    <div class="side-bar-header">
    <i class="fa-brands fa-slack"></i>
    <h1>AIP</h1>
    </div>
    <ul class="nav-links">
        <li class="nav-link">
            <i class="fa-solid fa-chart-simple"></i>
            <a href="router.php?page=home">Dashboard</a>
        </li>
        <li class="nav-link">
            <i class="fa-solid fa-users"></i>
            <a href="router.php?page=classification">Classification</a>
        </li>
        <li class="nav-link has-dropdown">
            <i class="fa-solid fa-diagram-project"></i>
            <a href="#" aria-disabled="true" readonly>AIP</a>
            <span class="dropdown-arrow"></span>
            <ul class="drop-down">
                <li><i class="fa-solid fa-plus"></i><a href="router.php?page=add-aip">Add Project</a></li>
                <li><i class="fa-solid fa-plus"></i><a href="router.php?page=add-plan">Add Plan</a></li>
                <li><i class="fa-solid fa-list"></i><a href="router.php?page=aip">AIP list</a></li>
            </ul>
        </li>
        <!-- <li class="nav-link services">
        <i class="fa-solid fa-person-chalkboard"></i>
            <a href="">Page 4</a>
        </li>
        <li class="nav-link has-dropdown">
        <i class="fa-solid fa-clipboard"></i>
          
            <a href="#" aria-disabled="true" readonly>Page 5</a>
            <span class="dropdown-arrow"></span>
            <ul class="drop-down">
                
                <li class="nav-link">
                <i class="fa-solid fa-list"></i>
                    <a href="">Sub Page 5</a>
                </li>
                <li class="nav-link">
                <i class="fa-solid fa-list"></i>
                    <a href="">Sub Page 5</a>
                </li>
               
            </ul>
        </li>
        <li class="nav-link has-dropdown ">
        <i class="fa-solid fa-paper-plane"></i>
            <a href="#" class="has-dropdown">Page 6</a>
            <span class="dropdown-arrow"></span>
            <ul class="drop-down">
            <li>
            <i class="fa-regular fa-file-lines"></i>
                <a href="" class="has-dropdown">Sub Page 6</a>
                </li>
                <li><i class="fa-solid fa-list"></i><a href="">Sub Page 6</a></li>
               
            </ul>
        </li> -->
        <div class="logout_container">
            <button type="button"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
        </div>
    </ul>
  
</nav>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggles = document.querySelectorAll('.nav-link.has-dropdown');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function () {
            // Close any open dropdowns
            dropdownToggles.forEach(item => {
                if (item !== this) {
                    item.classList.remove('active');
                }
            });

            // Toggle the clicked dropdown
            this.classList.toggle('active');
        });
    });
});
</script>
