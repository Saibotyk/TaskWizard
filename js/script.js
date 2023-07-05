// API Call




// Add Button to create new task
let button = document.querySelector('.add-js');
let newTask = document.querySelector('.task-js');
button.addEventListener('click', function () {
    newTask.classList.toggle('_display-none');
})


// Closed popup
let popup = document.querySelector('.popup-js');
let documentHtml = document.querySelector('html');

documentHtml.addEventListener('click', function (event) {
    if (event.target.classList.contains('popup-js')) {
        popup.classList.add('_display-none');
    }
})

// Modifying button displays form 
const form = document.querySelector('.modify-js');
const modifiers = document.querySelectorAll('.modifier-js');
const listItems = document.querySelectorAll('.list-js');
const inputId = document.querySelector('.input-js');
const ttlsTask = document.querySelectorAll('.text-task-js');
const ttlTask = document.querySelector('.text-task-js');
const inputTtl = document.querySelector('.input-ttl-js');


modifiers.forEach((modifier) => {
    modifier.addEventListener('click', function () {
        form.classList.toggle('_display-none');
        inputId.value = this.parentElement.parentElement.dataset.id;
        inputTtl.value = this.parentElement.parentElement.querySelector('.text-task-js').innerText;
        console.log(this.parentElement.parentElement.querySelector('.text-task-js').innerText);
    });
});

//testing async

const formModify = document.querySelector('.js-form');


formModify.addEventListener('submit', e => {
    e.preventDefault();
    renameTask(inputId.value, inputTtl.value)
        .then(apiResponse => {
            if (!apiResponse.result) {
                console.error('Erreur lors du renommage');
                formModify.remove
                return;
            }
            updateTaskName(inputId.value, inputTtl.value);
            formModify.parentElement.classList.toggle('_display-none')
        })

}
)


async function callAPI(method, data) {
    try {
        const response = await fetch("api.php", {
            method: method,
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        return response.json();
    }
    catch (error) { console.error("Error ") }
    ;
}


function renameTask(idTask, taskName) {
    const data = {
        action: 'rename',
        idTask: idTask,
        taskName: taskName,
        token: 'dfsfqf'
    };

    return callAPI('PUT', data);
}

function updateTaskName(id, name){
    document.querySelector(`[data-id="${id}"] .text-task-js`).innerText = name;
}



// ranking tasks

const buttons = document.querySelectorAll('.js-btn');


buttons.forEach((button) => {
    button.addEventListener('click', e => {
        let object = {
            action: 'move',
            id: button.dataset.id,
            ranking: button.dataset.ranking,
            prior: button.dataset.prior
        }
        moveTask(object)
            .then(apiResponse => console.table(apiResponse));
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
        console.error("Unable to load datas from the server : " + error);
    }
}

// async test 