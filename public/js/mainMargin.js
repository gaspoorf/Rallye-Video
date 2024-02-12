const header = document.getElementsByTagName('header')[0];
const headerHeight = header.offsetHeight;
let paddingBonus = 50;

if (window.innerWidth <= 390) {
    paddingBonus = 20;
} else if (window.innerWidth <= 550) {
    paddingBonus = 30;
} else if (window.innerWidth <= 768) {
    paddingBonus = 20;
} else if (window.innerWidth <= 1023) {
    paddingBonus = 10;
} else {
    paddingBonus = 50;
}

if (document.getElementsByTagName('main')[0]) {
    const main = document.getElementsByTagName('main')[0];
    main.style.paddingTop = `${headerHeight + paddingBonus}px`;
    main.style.paddingBottom = `${headerHeight + paddingBonus}px`;
}
