// GLOBAL

    // delete checkboxes
const checkboxes = document.querySelectorAll(".delete-checkbox");


// PROCEDURE

    // event listener for mass delete form submit
document.querySelector("#mass-delete").addEventListener('submit',async function(e) {
    // prevent refresh
    e.preventDefault();

    // map checkboxes values into an array - filter unchecked ones
    let data = [];
    checkboxes.forEach(checkbox => {
        if(checkbox.checked) data.push(checkbox.value);
    });

    // make a call to the mass delete endpoint to delete checked products
    await postData('/mass-delete',{'checkboxes': data})

    // refresh
    location.reload();
});


// FUNCTIONS

    // function for sending data via POST
async function postData(url = '', data = {}) {
    // Default options are marked with *
    const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'same-origin', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    });
    return response;
}