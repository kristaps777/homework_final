function move() {
    const moveForm = document.getElementById('moveable');
    const loginForm = document.getElementById('login_form');
    const regForm = document.getElementById('register_form');
    moveForm.style.left =('50%');
    regForm.setAttribute('class', 'inactive');
    loginForm.setAttribute('class', 'form_data');
};

function moveBack() {
    const moveFormB = document.getElementById('moveable');
    const regForm = document.getElementById('register_form');
    const loginForm = document.getElementById('login_form');
    moveFormB.style.left =('0%');
    regForm.setAttribute('class', 'form_data');
    loginForm.setAttribute('class', 'inactive');
};

function moveMobile() {
    const moveForm = document.getElementById('moveable_mobile');
    const loginForm = document.getElementById('login_form_mobile');
    const regForm = document.getElementById('register_form_mobile');
    moveForm.style.top =('50%');
    regForm.setAttribute('class', 'inactive');
    loginForm.setAttribute('class', 'form_data');
};

function moveBackMobile() {
    const moveFormB = document.getElementById('moveable_mobile');
    const regForm = document.getElementById('register_form_mobile');
    const loginForm = document.getElementById('login_form_mobile');
    moveFormB.style.top =('0%');
    regForm.setAttribute('class', 'form_data');
    loginForm.setAttribute('class', 'inactive');
};
