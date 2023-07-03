// Add Button for create new task
let button = document.querySelector('.add-js');
let newTask = document.querySelector('.task-js');
button.addEventListener('click', function() {
    newTask.classList.toggle('_display-none');
})

// Closed popup
let popup = document.querySelector('.popup-js');
let documentBody = document.querySelector('body');

documentBody.addEventListener('click', function(event) {
    if (event.target.classList.contains('popup-js')) {
        popup.classList.add('_display-none');
    }
})

