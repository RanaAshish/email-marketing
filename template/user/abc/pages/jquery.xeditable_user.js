
/**
 * Theme: Montran Admin Template
 * Author: Coderthemes
 * Demo: Editable (Inline editing)
 * 
 */


$(function() {

    //modify buttons style
    $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="md md-done"></i></button>' +
            '<button type="button" class="btn editable-cancel btn-sm waves-effect waves-light"><i class="md md-clear"></i></button>';


    // Myown editables controls


    //editables 

    $('#fname').editable({
        type: 'text',
        title: 'Enter First name',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'First Name is required';
            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeFname",
                    success: function(str)
                    {
                        if (str != "0")
                        {
                            if ($("#lname").html() != "Empty")
                            {
                                $("#pname").html(value + " " + $("#lname").html());
                            }
                            else
                            {
                                $("#pname").html(value);
                            }
                            swal("First Name updated");
                        }
                    }
                });
            }
        }
    });

    $('#lname').editable({
        type: 'text',
        title: 'Enter Last name',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Last Name is required';
            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeLname",
                    success: function(str)
                    {
                        if (str != "0")
                        {
                            if($("#fname").html() != "Empty")
                            {
                                $("#pname").html($("#fname").html() + " " + value);
                            }
                            else
                            {
                                $("#pname").html(value);
                            }
                            swal("Last Name updated");
                        }
                    }
                });
            }
        }
    });


    $('#workforce').editable({
        type: 'number',
        title: 'Enter Workforce of your organization',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {

            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeWorkforce",
                    success: function(str) {
                        swal("Workforce updated");
                    }
                });
            }
        }
    });

    $('#name_organization').editable({
        type: 'text',
        title: 'Enter Name of your organization',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {

            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeOrgName",
                    success: function(str) {
                        swal("Organization Name is updated");
                    }
                });
            }
        }
    });

    $('#age_Organization').editable({
        type: 'text',
        title: 'Specify how old your organization is',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {

            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeOrgAge",
                    success: function(str) {
                        swal("Organization Age is updated");
                    }
                });
            }
        }
    });

    $('#website').editable({
        type: 'text',
        title: 'Enter Your website',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {

            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeWebsite",
                    success: function(str) {
                        swal("website is updated");
                    }
                });
            }
        }
    });

    $('#address').editable({
        type: 'text',
        showbuttons: 'bottom',
        title: 'Enter Address of an organization',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeAddress",
                    success: function(str) {
                        swal("Address is updated");
                    }
                });
            }
        }
    });

    $('#type_organization').editable({
        type: 'text',
        title: 'select type of your organization',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {

            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeLname1",
                    success: function(str) {
                        swal("Last Name updated");
                    }
                });
            }
        }
    });

    $('#profile').editable({
        type: 'text',
        title: 'select profile picture',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeLname1",
                    success: function(str) {
                        swal("Last Name updated");
                    }
                });
            }
        }
    });

    $('#city').editable({
        type: 'text',
        title: 'select city',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Last Name is required';
            }
            else
            {
                $.ajax({
                    type: "post",
                    data: "value=" + value,
                    url: "./changeLname1",
                    success: function(str) {
                        swal("Last Name updated");
                    }
                });
            }
        }
    });

    //  $('#sex').editable({
    //    prepend: "not selected",
    //    source: [
    //    {value: 1, text: 'Male'},
    //    {value: 2, text: 'Female'}
    //    ],
    //    display: function(value, sourceData) {
    //     var colors = {"": "gray", 1: "green", 2: "blue"},
    //     elem = $.grep(sourceData, function(o){return o.value == value;});

    //     if(elem.length) {
    //       $(this).text(elem[0].text).css("color", colors[value]);
    //     } else {
    //       $(this).empty();
    //     }
    //   }
    // });

    //  $('#status').editable();

    //  $('#group').editable({
    //    showbuttons: false
    //  });

    //  $('#dob').editable();

    //  $('#comments').editable({
    //    showbuttons: 'bottom'
    //  });



    //inline


    // $('#inline-username').editable({
    //    type: 'text',
    //    pk: 1,
    //    name: 'username',
    //    title: 'Enter username',
    //    mode: 'inline'
    //  });

    //   $('#inline-firstname').editable({
    //     validate: function(value) {
    //      if($.trim(value) == '') return 'This field is required';
    //    },
    //    mode: 'inline'
    //  });

    //   $('#inline-sex').editable({
    //     prepend: "not selected",
    //     mode: 'inline',
    //     source: [
    //     {value: 1, text: 'Male'},
    //     {value: 2, text: 'Female'}
    //     ],
    //     display: function(value, sourceData) {
    //      var colors = {"": "gray", 1: "green", 2: "blue"},
    //      elem = $.grep(sourceData, function(o){return o.value == value;});

    //      if(elem.length) {
    //        $(this).text(elem[0].text).css("color", colors[value]);
    //      } else {
    //        $(this).empty();
    //      }
    //    }
    //  });

    //   $('#inline-status').editable({mode: 'inline'});

    //   $('#inline-group').editable({
    //     showbuttons: false,
    //     mode: 'inline'
    //   });

    //   $('#inline-dob').editable({mode: 'inline'});

    //   $('#inline-comments').editable({
    //     showbuttons: 'bottom',
    //     mode: 'inline'
    //   });



});