import "./bootstrap";
import {
    Collapse,
    Ripple,
    initTE,
    Dropdown,
    Input,
    Modal,
    Carousel,
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
});

Alpine.plugin(focus);

Alpine.start();
