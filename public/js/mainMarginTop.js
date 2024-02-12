
const header = document.getElementsByTagName('header')[0];
const headerHeight = header.offsetHeight;

if (document.getElementById('sign-in')) {
    const signIn = document.getElementById('sign-in');
    signIn.style.paddingTop = `${headerHeight+50}px`;
}
if (document.getElementById('sign-up')) {
    const signUp = document.getElementById('sign-up');
    signUp.style.paddingTop = `${headerHeight+50}px`;
}
