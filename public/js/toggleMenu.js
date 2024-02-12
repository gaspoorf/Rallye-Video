let menuClosed = true;
const headerMenuLayout = document.getElementById('header-menu-layout');
const headerMenuIcon = document.getElementById('header-menu-icon');
const APPEAR_CLASS = 'appear';
const DISAPPEAR_CLASS = 'disappear';

function toggleMenu() {
    if (menuClosed) {
        headerMenuLayout.classList.add(APPEAR_CLASS);
        headerMenuLayout.classList.remove(DISAPPEAR_CLASS);
        headerMenuIcon.attributes.src.value = 'public/images/icons/close.svg';
        headerMenuIcon.attributes.alt.value = 'close-menu-icon';
        menuClosed = false;
    } else {
        headerMenuLayout.classList.add(DISAPPEAR_CLASS);
        headerMenuLayout.classList.remove(APPEAR_CLASS);
        headerMenuIcon.attributes.src.value = 'public/images/icons/menu.svg';
        headerMenuIcon.attributes.alt.value = 'open-menu-icon';
        menuClosed = true;
    }
}