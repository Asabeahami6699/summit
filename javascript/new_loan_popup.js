document.addEventListener('DOMContentLoaded', function () {
    function openPopup(popupId) {
        document.getElementById(popupId).style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function closePopup(popupId) {
        document.getElementById(popupId).style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    const popupLinks = ['openLoanPopupNav', 'openLoanPopupLm', 'openLoanPopupHeaderBar', 'openClientPopupHeaderBar'];
    popupLinks.forEach(function (id) {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('click', function (event) {
                event.preventDefault();
                if (id.includes('Loan')) {
                    openPopup('loanPopup');
                } else if (id.includes('Client')) {
                    openPopup('clientPopup');
                }
            });
        }
    });

    document.querySelectorAll('.close').forEach(function (element) {
        element.addEventListener('click', function () {
            const popupId = element.getAttribute('data-popup-id');
            closePopup(popupId);
        });
    });

    document.getElementById('overlay').addEventListener('click', function () {
        document.querySelectorAll('.popup').forEach(function (popup) {
            popup.style.display = 'none';
        });
        document.getElementById('overlay').style.display = 'none';
    });
});
