// API Call

// Add Button to create new task
let button = document.querySelector('.add-js');
let newTask = document.querySelector('.task-js');
button.addEventListener('click', function () {
    newTask.classList.toggle('_display-none');
});


// Closed popup
let popup = document.querySelector('.popup-js');
let documentHtml = document.querySelector('html');

documentHtml.addEventListener('click', function (event) {
    if (event.target.classList.contains('popup-js')) {
        popup.classList.add('_display-none');
    }
});

// Modifying button displays form 
const form = document.querySelector('.modify-js');
const modifiers = document.querySelectorAll('.modifier-js');
const listItems = document.querySelectorAll('.list-js');
const inputId = document.querySelector('.input-js');
const ttlsTask = document.querySelectorAll('.text-task-js');
const inputTtl = document.querySelector('.input-ttl-js');


modifiers.forEach((modifier) => {
    modifier.addEventListener('click', function () {
        form.classList.toggle('_display-none');
        inputId.setAttribute('value', this.parentElement.parentElement.dataset.id);
        inputTtl.setAttribute('value', this.parentElement.parentElement.querySelector('.text-task-js').innerHTML);
        console.log(inputTtl);
    });
});

// ranking tasks

const buttons = document.querySelectorAll('.js-btn');
const ulParent = document.querySelector('.js-ul');
buttons.forEach((button) => {
    button.addEventListener('click', e => {
        let object = {
            id: button.dataset.id,
            ranking: button.dataset.ranking,
            prior: button.dataset.prior
        };
        moveTask(object)
            .then(apiResponse => {
                let liChild = document.querySelector(`[data-id="${apiResponse.id}"]`)
                if (apiResponse.prior === "up") {
                    ulParent.insertBefore(liChild, liChild.previousElementSibling);
                    // console.log(liChild, liChild.previousElementSibling);
                }
                else {
                    ulParent.insertBefore(liChild.nextElementSibling, liChild);
                    // console.log(liChild.nextElementSibling, liChild);
                }

            });
    });
});

async function moveTask(data) {
    try {
        const response = await fetch("api.php", {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return response.json();
    }
    catch (error) {
        console.error("Unable to load data from the server: " + error);
    }
}
