if (document.getElementById('alert-popup')) {
    const alertPopUp = document.getElementById('alert-popup');

    alertPopUp.addEventListener('click', function() {
        alertPopUp.style.animation = 'disappear 0.5s forwards';
    });
}