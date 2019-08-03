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
            const span = document.createElement('span');
            const trash = document.createElement('i');


            trash.classList.add('fas', 'fa-trash-alt');
            span.append(trash);
            li.innerText = todoInput.value;
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
    let allSpans = document.querySelectorAll('span');

    for(let span of allSpans) {
        span.addEventListener('click', function() {
            span.parentElement.remove(); event.stopPropagation();
        });
    }
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