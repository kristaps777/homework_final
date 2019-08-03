const todo = document.getElementById('todo');
const cal = document.getElementById('calendar');
const ppl = document.getElementById('people');

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
