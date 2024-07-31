document.addEventListener("DOMContentLoaded", function () {
    document.getElementsByClassName("indC-tablink")[0].click();
});

function openTab(tabName, element) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("indC-tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("indC-tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    if (element) {
        element.className += " active";
    }

    // Update progress bar width
    var tabLinks = document.querySelectorAll(".indC-tablink");
    var progress = (Array.from(tabLinks).indexOf(element) + 1) / tabLinks.length * 100;
    document.querySelector('.progress-bar').style.width = progress + '%';
}

function showPreview() {
    const form = document.getElementById('registrationForm');
    const previewContentDiv = document.getElementById('previewContent');

    let previewContent = '';

    // Iterate over form elements and generate preview content
    for (let i = 0; i < form.elements.length; i++) {
        const element = form.elements[i];
        if (element.tagName === 'INPUT' && element.type !== 'button' && element.type !== 'submit') {
            // Create a grid item for each input element's name and value
            previewContent += `<div class="preview-item"><strong>${element.name}:</strong> ${element.value}</div>`;
        }
    }

    previewContentDiv.innerHTML = `<div class="preview-grid">${previewContent}</div>`;
}

// Function to navigate to the next tab
function nextTab() {
    var currentTab = document.querySelector(".indC-tabcontent:not([style='display: none;'])");
    var nextTab = currentTab.nextElementSibling;
    while (nextTab && !nextTab.classList.contains('indC-tabcontent')) {
        nextTab = nextTab.nextElementSibling;
    }
    if (nextTab && nextTab.classList.contains('indC-tabcontent')) {
        var nextTabId = nextTab.id;
        var nextTabButton = document.querySelector(".indC-tablink[data-tab='" + nextTabId + "']");
        if (nextTabId === "indC-preview") {
            showPreview();
        }
        openTab(nextTabId, nextTabButton);
    }
}

// Function to navigate to the previous tab
function prevTab() {
    var currentTab = document.querySelector(".indC-tabcontent:not([style='display: none;'])");
    var prevTab = currentTab.previousElementSibling;
    while (prevTab && !prevTab.classList.contains('indC-tabcontent')) {
        prevTab = prevTab.previousElementSibling;
    }
    if (prevTab && prevTab.classList.contains('indC-tabcontent')) {
        var prevTabId = prevTab.id;
        var prevTabButton = document.querySelector(".indC-tablink[data-tab='" + prevTabId + "']");
        openTab(prevTabId, prevTabButton);
    }
}
