document.addEventListener("DOMContentLoaded", function() {
    const submenuToggles = document.querySelectorAll(".nbf_submenu-toggle");

    submenuToggles.forEach(toggle => {
        toggle.addEventListener("click", function(event) {
            event.preventDefault();
            const submenu = this.nextElementSibling;

            if (submenu.style.display === "block") {
                submenu.style.display = "none";
            } else {
                submenu.style.display = "block";
            }
        });
    });

    document.addEventListener("click", function(event) {
        submenuToggles.forEach(toggle => {
            const submenu = toggle.nextElementSibling;
            if (!toggle.contains(event.target) && !submenu.contains(event.target)) {
                submenu.style.display = "none";
            }
        });
    });
});
