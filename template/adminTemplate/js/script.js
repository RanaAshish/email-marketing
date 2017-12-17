    $(document).ready(function () {
        $(".table").on("click",".delete",function (e) {
            var link = $(this).attr("href");
            //alert (link);
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    window.location.href = link;
                }
            });
        });
        $(".block").click(function (e) {
            var link = $(this).attr("href");
            //alert (link);
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You are going to Block this user",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Block it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                }
            });
        });
        $(".unblock").click(function (e) {
            var link = $(this).attr("href");
            //alert (link);
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You are going to unblock this user",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Unblock it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function (isConfirm) {
                if (isConfirm) {
                }
            });
        });

    })