// Add Button to create new task
let button = document.querySelector('.add-js');
let newTask = document.querySelector('.task-js');
button.addEventListener('click', function () {
    newTask.classList.toggle('_display-none');
})


// Modifying button displays form 
const form = document.querySelector('.modify-js');
const modifiers = document.querySelectorAll('.modifier-js');
const listItems = document.querySelectorAll('.list-js');
const inputId = document.querySelector('.input-js')

listItems.forEach((li) => {
    let id = li.dataset.id;
    inputId.setAttribute('data-id', id)
    console.log(inputId);
})


modifiers.forEach((modifier) => {
    modifier.addEventListener('click', function () {
        form.classList.toggle('_display-none')
    });

});

setAttribute 

// l'id de l'input doit être relié à celui de la task



