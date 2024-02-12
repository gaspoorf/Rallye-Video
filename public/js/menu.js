const menu = document.getElementById('menu');
const menuBlurBg = document.getElementById('menu-blur-bg');
const menuLinks = menu.querySelectorAll('a, button');


function toggleMenu() {
    if(menu.hasAttribute('open')) {
        document.getElementById('burger').setAttribute('aria-expanded', 'false');
        menu.removeAttribute('open');
        menuBlurBg.style.display = 'none';
    } else {
        document.getElementById('burger').setAttribute('aria-expanded', 'true');
        menu.setAttribute('open', '');
        menuBlurBg.style.display = 'block';
    }
}

menuLinks.forEach(link => {
    link.addEventListener('mouseover', () => {
        const span = document.createElement('span');
        span.classList.add('span-menu-hover');
        link.appendChild(span);
    });
    link.addEventListener('mouseout', () => {
        const span = link.querySelector('.span-menu-hover');
        if (span) {
            span.remove();
        }
    });
});