// variables for the switches
const todo = document.getElementById('todo');
const cal = document.getElementById('calendar');
const ppl = document.getElementById('people');

// 3 switches for navigation
function switchTodo() {
    todo.setAttribute('class', 'none');
    cal.setAttribute('class', 'inactive');
    ppl.setAttribute('class', 'inactive');
};

function switchCal() {
    todo.setAttribute('class', 'inactive');
    cal.setAttribute('class', 'none');
    ppl.setAttribute('class', 'inactive');
};

function switchPpl() {
    todo.setAttribute('class', 'inactive');
    cal.setAttribute('class', 'inactive');
    ppl.setAttribute('class', 'none');
};

// settings button function
function settingsButton() {
    const area = document.getElementById('settings_area');
    if (area.getAttribute('class') == 'settings_inactive') {
        area.setAttribute('class', 'settings');
    } else {
        area.setAttribute('class', 'settings_inactive');
    }
};

// hide marked todo items function
function hideMarked() {
    const inputs = document.querySelectorAll('input[type="checkbox"]');
    const scope = document.getElementById('todo_list');
    let listItems = scope.getElementsByTagName('li');

    for (let i = inputs.length - 1; i >= 0; i--) {
        if (inputs[i].checked) {
            listItems[i].style.display = 'none';
        }
    }
};

// show all todo items function
function showAll() {
    const scope = document.getElementById('todo_list');
    let listItems = scope.getElementsByTagName('li');

    for (let i = listItems.length - 1; i >= 0; i--) {
        if (listItems[i].style.display = 'none') {
            listItems[i].style.display = 'flex';
        }
    }
};

// $("#checkAll").on("change", function () {
//     $(':checkbox').not(this).prop('checked', this.checked);
// });
