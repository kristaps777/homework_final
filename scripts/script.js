function move() {
    const moveForm = document.getElementById('moveable');
    const loginForm = document.getElementById('login_form');
    const regForm = document.getElementById('register_form');
    moveForm.style.transform = ('translateX(95%)')
    regForm.setAttribute('class', 'inactive');
    loginForm.setAttribute('class', 'form_data');
};

function moveBack() {
    const moveFormB = document.getElementById('moveable');
    const regForm = document.getElementById('register_form');
    const loginForm = document.getElementById('login_form');
    moveFormB.style.transform = ('translateX(5%)')
    regForm.setAttribute('class', 'form_data');
    loginForm.setAttribute('class', 'inactive');
};
