// Add Button for create new task
let button = document.querySelector('.add-js');
let newTask = document.querySelector('.task-js');
button.addEventListener('click', function() {
    newTask.classList.toggle('_display-none');
})

