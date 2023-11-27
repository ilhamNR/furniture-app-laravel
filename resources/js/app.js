// Import Bootstrap and other dependencies
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
import Swal from "sweetalert2";

// Configure Alpine.js
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.start();

// Initialize tw-elements
initTE({
    Collapse,
    Ripple,
    Dropdown,
    Input,
    Modal,
    Carousel,
    Validation,
});

