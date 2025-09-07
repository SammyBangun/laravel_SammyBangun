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
    $(".delete-btn-hospital").click(function () {
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
    $(".delete-btn-patient").click(function () {
        if (confirm("Apakah anda yakin ingin menghapus?")) {
            let id = $(this).data("id");
            $.ajax({
                url: "/patients/" + id,
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
    // Filter pasien berdasarkan rumah sakit
    $("#hospitalFilter").change(function () {
        let id = $(this).val();
        $.ajax({
            url: "/patients/filter/" + id,
            type: "GET",
            success: function (patients) {
                let rows = "";
                patients.forEach((p) => {
                    rows += `
                            <tr id="row-${p.id}">
                                <td>${p.nama}</td>
                                <td>${p.alamat}</td>
                                <td>${p.no_telpon ?? "-"}</td>
                                <td>${p.hospital ? p.hospital.nama : "-"}</td>
                           <td>
                                <a href="/patients/${
                                    p.id
                                }" class="btn btn-info btn-sm">Detail</a>
                                <a href="/patients/${
                                    p.id
                                }/edit" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${
                                    p.id
                                }">Hapus</button>
                            </td>
                            </tr>`;
                });
                $("#patientsTable").html(rows);
            },
            error: function () {
                alert("Gagal memuat data pasien!");
            },
        });
    });
});
