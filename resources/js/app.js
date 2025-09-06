import "./bootstrap";
import $ from "jquery";

window.$ = window.JQuery = $;

$(document).ready(function () {
    $("#btnKlik").click(function () {
        alert("jQuery bekerja di Laravel 12 ✅");
    });
    $("#btnSeret").mouseenter(function () {
        alert("jQuery bekerja di Laravel 12 ✅");
    });
});
