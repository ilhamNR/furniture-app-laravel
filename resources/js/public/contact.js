import Swal from "sweetalert2";
// Get references to form elements
const submitbtn = document.getElementById("submit");
const form1 = document.getElementById("inquiry-form");
const inputFirstname = document.getElementById("firstname");
const inputLastname = document.getElementById("lastname");
const inputEmail = document.getElementById("email");
const inputPhone = document.getElementById("phone");
const inputMessage = document.getElementById("message");

// Initialize a variable to track form validation status
let valid = true;

// Add event listener for the submit button click
submitbtn.addEventListener("click", (e) => {
    e.preventDefault();

    // Set validation state for each input element based on 'valid' variable
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

    // Toggle the 'valid' variable for the next click event
    valid = !valid;
});

// Add event listener for successful form validation
form1.addEventListener("valid.te.validation", (e) => {
    // Create a FormData object from the form
    const formData = new FormData(form1);

    // Send a POST request with the form data
    fetch(form1.action, {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            // Handle the response data
            response.json().then((data) => {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: data.data,
                });
            });

            // Clear input values after successful submission
            form1.querySelectorAll("input, textarea").forEach((element) => {
                element.value = "";
            });
        })
        .catch((error) => {
            // Handle errors
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Something happened, please try again later",
            });
        });
});
