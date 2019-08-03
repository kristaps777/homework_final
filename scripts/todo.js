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

function deleteTodo() {
    let allSpans = document.querySelectorAll('span');

    for(let span of allSpans) {
        span.addEventListener('click', function() { span.parentElement.remove(); event.stopPropagation(); });
    }
};

deleteTodo();
