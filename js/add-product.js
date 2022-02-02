// GLOBAL

    // metadata div
const meta = document.querySelector("#meta");
    // templates for each product type
const templates = {
    DVD: document.querySelector("#template_dvd"),
    Furniture: document.querySelector("#template_furniture"),
    Book: document.querySelector("#template_book")
};


// PROCEDURE

    // event listener for type switcher
document.querySelector("#productType").addEventListener("change", function (e) {
    // get template markup by type
    let product_type = e.currentTarget.value;

    populateMeta(product_type);
});

    // populate meta container with default selected product type's respective fields
(function () {
    let selected = document.querySelector("#productType :first-child");

    populateMeta(selected.value);
})();


    // submit event for validation
(function() {
    document.querySelector("#product_form").addEventListener('submit',function(e) {
        // GLOBAL
        const inputs = e.currentTarget.querySelectorAll("input");

        // PROCEDURE

            // clear alert boxes
        inputs.forEach(input => clearAlert(input));

        let passed = validator(inputs,{
            sku: 'required|primary',
            name: 'required',
            price: 'required|numeric',
            size: 'required|numeric',
            weight: 'required|numeric',
            height: 'required|numeric',
            width: 'required|numeric',
            length: 'required|numeric',
        });

            // if validation failed, dont submit
        if(!passed)
            e.preventDefault();
    })
})();

    // set input event for every field to clear the alert box
(function () {
    document.querySelector("input").addEventListener('input',function(e) {
        clearAlert(e.currentTarget);
    });
})();



// FUNCTIONS

    // populates form meta container with passed product type's respective fields
function populateMeta(product_type) {
    let template = templates[product_type].cloneNode(true);

    // remove template markup invisibility
    template.classList.remove('d-none');

    // clear previous children
    meta.innerHTML = "";

    // add id
    const inputs = template.querySelectorAll("input");
    inputs.forEach(input => input.id = input.name);

    // append new meta children
    meta.append(template);
}

    // input validation system
function validator(inputs, config) {
    // GLOBAL
    const rules = {
        numeric: str => isNumeric(str),
        required: str => notEmpty(str),
        primary: str => isPrimary(str)
    }


    // FUNCTIONS

        // checks if string is numeric
    function isNumeric(str) {
        let bool = (function(str) {
            if (typeof str != "string") return false // we only process strings!
            return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
                !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
        })(str);
        return {pass:bool,error:'Please, provide the data of indicated type'}
    }

        // checks if string is empty
    function notEmpty(str) {
        let bool = str !== "";
        return {pass:bool,error:'Please, submit required data'};
    }

        // check if string can be used as a primary key
    function isPrimary(str) {
        let bool = str.match(/^[a-z\d]*$/i) !== null;
        return {pass:bool,error:'Please, provide the data of indicated type'};
    }

        // check if individual field passes its respective given rules
    function check(value,rule_string) {
        let rule_array = rule_string.split('|');

        // iterate over rules
        for(let rule of rule_array) {
            // if rule fails
            let response = rules[rule](value);
            console.log(value,rule,response);
            if(!response.pass)
                return response;
        }
        // if no rules failed
        return {pass:true,error:''};
    }

        // set alert message for an input
    function setAlert(input,message) {
        const alert = input.parentNode.querySelector(".alert");

        // set message
        alert.innerHTML = message;
        // make it visible
        if(alert.classList.contains('d-none'))
            alert.classList.remove('d-none');
    }

    // PROCEDURE

    // keep track of input failure
    let failed = false;

        // iterate over fields and validate
    inputs.forEach(input => {
        let value = input.value;

        if(config[input.id]) {
            let response = check(value,config[input.id]);
            if(!response.pass) {
                setAlert(input,response.error);
                failed = true;
            }
        }
    });

    // RESPONSE
    return !failed;
}

    // clears alert message for an input
function clearAlert(input) {
    const alert = input.parentNode.querySelector(".alert");

    // clear message
    alert.innerHTML = "";
    // make alert box invisible
    if(!alert.classList.contains('d-none'))
        alert.classList.add('d-none');
}
