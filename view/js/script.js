function send() {
    $("form[name='taskForm']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "/upload/submit",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
                location.reload();
            },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });
}

function preview() {
    $("form[name='taskForm']").submit(function(e) {
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: "/upload/preview",
            type: "POST",
            data: formData,
            async: false,
            success: function (msg) {
                $("#result").html(msg);
            },
            cache: false,
            contentType: false,
            processData: false
        });

        e.preventDefault();
    });
}