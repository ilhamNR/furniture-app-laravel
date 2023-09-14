import "./bootstrap";
import {
    Collapse,
    Ripple,
    initTE,
    Dropdown,
    Input,
    Modal,
    Carousel,
    Validation,
} from "tw-elements";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

initTE({
    Collapse,
    Ripple,
    Dropdown,
    Input,
    Modal,
    Carousel,
    Validation,
});

Alpine.plugin(focus);

Alpine.start();

const submitbtn = document.getElementById("submit");
const form1 = document.getElementById("inquiry-form");
const inputFirstname = document.getElementById("firstname");
const inputLastname = document.getElementById("lastname");
const inputEmail = document.getElementById("email");
const inputPhone = document.getElementById("phone");
const inputMessage = document.getElementById("message");
// let formSubmitted = false;
let valid = true;
submitbtn.addEventListener("click", (e) => {
    e.preventDefault();
    inputFirstname.setAttribute(
        "data-te-validation-state",
        valid ? "valid" : "invalid"
    );
    inputLastname.setAttribute(
        "data-te-validation-state",
        valid ? "valid" : "invalid"
    );
    inputEmail.setAttribute(
        "data-te-validation-state",
        valid ? "valid" : "invalid"
    );
    inputPhone.setAttribute(
        "data-te-validation-state",
        valid ? "valid" : "invalid"
    );
    inputMessage.setAttribute(
        "data-te-validation-state",
        valid ? "valid" : "invalid"
    );
    // form1.setAttribute("data-te-validated", true);
    valid = !valid;
});

form1.addEventListener("valid.te.validation", (e) => {
    const formData = new FormData(form1);
    fetch(form1.action, {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            console.log(response);
        })
        .catch((error) => {
            // Handle errors (e.g., show an error message)
        });
});
