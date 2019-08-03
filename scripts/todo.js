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

// ---------------------------------------------

// function for new todos
function newTodo() {
    const todoInput = document.querySelector('input');
    const todoList = document.getElementById('todo_list');
    
    todoInput.addEventListener('keydown', function(enterKey) {
        if (enterKey.keyCode === 13) {
            const li = document.createElement('li');
            const inp = document.createElement('input');
            const label = document.createElement('label');
            const span = document.createElement('span');
            const trash = document.createElement('i');

            inp.setAttribute('type', 'checkbox');
            inp.setAttribute('class', 'td_entry');


            trash.classList.add('fas', 'fa-trash-alt');
            span.classList.add('td_entry')
            span.append(trash);
            label.innerText = todoInput.value;
            li.append(inp);
            li.append(label);
            li.append(span);
            todoList.appendChild(li);

            deleteTodo();

            todoInput.value = '';
        }
    });
};

newTodo();

// ---------------------------------------------

// delete todo items function
function deleteTodo() {
    const todoList = document.getElementById('todo_list');
    let allSpans = todoList.querySelectorAll('span');

    for(let span of allSpans) {
        span.addEventListener('click', function() {
            span.parentElement.remove(); event.stopPropagation();
        });
    }
};

// delete all todo items function
function deleteAll() {
    const todoList = document.getElementById('todo_list');
    todoList.innerHTML = '';
};

// settings button function
function settingsButton() {
    const area = document.getElementById('settings_area');
    if (area.getAttribute('class') == 'settings') {
        area.setAttribute('class', 'settings_inactive');
    } else {
        area.setAttribute('class', 'settings');
    }
};

// delete marked todo items function
function deleteMarked() {
    const inputs = document.querySelectorAll('input[type="checkbox"]');

    for (let i = inputs.length -1; i >= 0; i--) {
        if (inputs[i].checked) {
         inputs[i].parentElement.remove();
        }
    }
};

// hide marked todo items function
function hideMarked() {
    const inputs = document.querySelectorAll('input[type="checkbox"]');
    const scope = document.getElementById('todo_list');
    let listItems = scope.getElementsByTagName('li');

    for (let i = inputs.length -1; i >= 0; i--) {
        if (inputs[i].checked) {
            listItems[i].style.display = 'none';
        }
    }
};

// show all todo items function
function showAll() {
    const scope = document.getElementById('todo_list');
    let listItems = scope.getElementsByTagName('li');

    for (let i = listItems.length -1; i >= 0; i--) {
        if (listItems[i].style.display = 'none') {
            listItems[i].style.display = 'flex';
        }
    }
};

// ---------------------------------------------
//save to local
const saveBtn = document.querySelector('#save_button');
const todoList = document.getElementById('todo_list');
saveBtn.addEventListener('click', function() {
    localStorage.setItem('todoList', todoList.innerHTML)
});

// ---------------------------------------------
//load from local on open
function loadTodo() {
    if (localStorage.getItem('todoList')) {
        todoList.innerHTML = localStorage.getItem('todoList');
        deleteTodo();
    }
};

loadTodo();