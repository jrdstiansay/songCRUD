$(document).ready(function () {
    let id = 0;

    const mesModal = new bootstrap.Modal(document.getElementById("warningMdl"));
    const songMdl = new bootstrap.Modal(document.getElementById("songMdl"));

    const getFormData = (form) => {
        let unindexed_array = form.serializeArray();
        let indexed_array = {};

        $.map(unindexed_array, function (n, i) {
            indexed_array[n["name"]] = n["value"];
        });

        return indexed_array;
    };
    const ajaxRequest = async (data, action, url, type, dataType) => {
        $.ajax({
            url,
            dataType,
            type,
            data,
            success: function (d) {
                action(d);
            },
        });
    };
    const showMessage = (t, m, mm) => {
        $("#mesTitle").empty().append(t);
        $("#mesCont").empty().append(m);
        mesModal.show();
    };
    const table = $(".songs").DataTable({
        processing: true,
        serverSide: true,
        ajax: "/api/song",
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "title",
                name: "title",
            },
            {
                data: "artist",
                name: "artist",
            },
            {
                data: "lyrics",
                name: "lyrics",
            },
            {
                data: "created_at",
                name: "created_at",
            },
            {
                data: "action",
                name: "action",
            },
        ],
        columnDefs: [
            { width: "4%", targets: 0 },
            { width: "8%", targets: 4 },
            { width: "10%", targets: 5 },
            {
                targets: [5],
                orderable: false,
            },
            { className: "text-center", targets: [0, 1, 2, 4, 5] },
        ],
    });
    const addAct = (res) => {
        if (res == "true") {
            songMdl.hide();
            $("#songFrm")[0].reset();
            $("#songFrm").removeClass("was-validated");
            table.ajax.reload();
            if (id != 0) {
                id = 0;
                showMessage("Success", "Song Updated");
            } else {
                showMessage("Success", "Song Added");
            }
        } else {
            showMessage("Warning", res);
        }
    };
    const getAct = (res) => {
        $("#sngTitle").html("Update Song");
        $("#title").val(res.title);
        $("#artist").val(res.artist);
        $("#lyrics").html(res.lyrics);
        songMdl.show();
    };
    const delAct = (res) => {
        if (res == "true") {
            table.ajax.reload();
            showMessage("Success", "Song Deleted");
        } else {
            showMessage("Warning", res);
        }
    };
    $("#addBtn").click(function () {
        id = 0;
        $("#sngTitle").html("Add Song");
        songMdl.show();
    });
    $("#saveBtn").click(function () {
        $("#songFrm").submit();
    });
    $("#songFrm").submit(function (e) {
        e.preventDefault();
        $("#songFrm").addClass("was-validated");
        if (!this.checkValidity()) {
            e.stopPropagation();
        } else {
            const data = getFormData($(this));
            let meth = "post";
            let url = "/api/song";
            if (id != 0) {
                meth = "put";
                url = "/api/song/" + id;
            }
            ajaxRequest(data, addAct, url, meth, "text");
        }
    });
    $(document).on("click", ".edit", function () {
        const data = {};
        id = $(this).attr("id").replace("edit", "");
        ajaxRequest(data, getAct, "api/song/" + id, "get", "json");
    });
    $(document).on("click", ".del", function () {
        const data = getFormData($("#songFrm"));
        id = $(this).attr("id").replace("del", "");
        ajaxRequest(data, delAct, "api/song/" + id, "delete", "text");
    });
});
