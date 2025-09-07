import "./bootstrap";
import $ from "jquery";

window.$ = window.JQuery = $;

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });
    $(".delete-btn").click(function () {
        if (confirm("Apakah anda yakin ingin menghapus?")) {
            let id = $(this).data("id");
            $.ajax({
                url: "/hospitals/" + id,
                type: "DELETE",
                success: function (response) {
                    if (response.success) {
                        $("#row-" + id).remove();
                    }
                },
                error: function (xhr) {
                    alert("Gagal menghapus! Error: " + xhr.status);
                },
            });
        }
    });
});
