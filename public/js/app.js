jQuery(document).ready(function () {

    show();

    //Update Data
    jQuery(document).on("click", ".update", function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = jQuery(this).val();
        var fName = jQuery("#EfName").val();
        var lName = jQuery("#ElName").val();
        var address = jQuery("#Eaddress").val();
        var phone = jQuery("#Ephone").val();
        var email = jQuery("#Eemail").val();
        var status = jQuery("#Estatus").val();

        $.ajax({
            url: 'updateemployee/' + id,
            type: 'POST',
            datatype: 'JSON',
            data: {
                fName: fName,
                lName: lName,
                address: address,
                phone: phone,
                email: email,
                status: status
            },
            success: function (response) {
                if (response["status"] == "408") {
                    show();
                    Command: toastr["error"]("Data has not updated Successfully!")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    jQuery("#editModal").modal("hide");
                    jQuery('.msg').html('<div class="alert alert-danger">Data has Not Updated</div>');
                    jQuery('.alert').fadeOut(1000);

                } else if (response["status"] == "success") {
                    show();
                    Command: toastr["info"]("Data has updated Successfully!")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    jQuery("#editModal").modal("hide");
                    jQuery('.msg').html('<div class="alert alert-success">Data has Updated Saved</div>');
                    jQuery('.alert').fadeOut(1000);


                }
            }

        });
    });


    //Edit Data
    jQuery(document).on("click", ".edit", function (e) {
        var id = jQuery(this).val();
        jQuery(".update").val(id);

        $.ajax({
            url: "employeeEdit/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                if (response.status == "success") {
                    jQuery("#EfName").val(response.employee.fName);
                    jQuery("#ElName").val(response.employee.lName);
                    jQuery("#Eaddress").val(response.employee.address);
                    jQuery("#Ephone").val(response.employee.phone);
                    jQuery("#Eemail").val(response.employee.email);
                    jQuery("#Estatus").val(response.employee.status);
                } else {
                    alert("Error-407 : Data not found");
                }
            }
        });
    });


    //Delete Data
    jQuery(document).on("click", ".delete", function (e) {
        var id = jQuery(this).val();
        jQuery(".btnDelete").val(id);
    });

    jQuery(document).on("click", ".btnDelete", function (e) {
        var id = jQuery(this).val();
        $.ajax({
            url: "employeedelete/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (response) {
                if (response.status == "success") {
                    show();
                    Command: toastr["warning"]("Data has deleted Successfully!")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }

                    jQuery("#deleteModal").modal("hide");
                    jQuery('.msg').html('<div class="alert alert-success">Data has deleted</div>');
                    jQuery('.alert').fadeOut(1000);
                } else {
                    show();
                    Command: toastr["error"]("Data has not deleted Successfully!")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    jQuery("#deleteModal").modal("hide");
                    jQuery('.msg').html('<div class="alert alert-danger">Data has not deleted</div>');
                    jQuery('.alert').fadeOut(1000);
                }
            }
        });
    });


    //Show All Data
    function show() {
        $.ajax({
            url: 'showemployee',
            type: 'GET',
            datatype: 'JSON',
            success: function (response) {
                if (response.status == "success") {
                    var id = 1;
                    var allData = "";

                    $.each(response.alldata, function (key, item) {
                        var statusDisplay = item.status == 1
                            ? '<button id="btnStatus" value="' + item.id + '" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i></button>'
                            : '<button id="btnStatus" value="' + item.id + '" class="btn btn-danger btn-sm"><i class="fa-solid fa-check"></i></button>';

                        allData += '<tr>\
                            <td>'+ id + '</td>\
                            <td>'+ item.fName + ' ' + item.lName + '</td>\
                            <td>'+ item.address + '</td>\
                            <td>'+ item.phone + '</td>\
                            <td>'+ item.email + '</td>\
                            <td>'+ statusDisplay + '</td>\
                            <td><button class="edit btn btn-info btn-sm" value="'+ item.id + '" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></button>\
                                <button class="delete btn btn-danger btn-sm" value="'+ item.id + '" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></button>\
                            </td>\
                        </tr>';
                        id++;
                    });
                    jQuery(".alldata").html(allData);
                }
                else {
                    alert("Error-405 : Data not found");
                }
            }
        });
    }

    //Insert Data
    jQuery(".addemployee").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var fName = jQuery(".fName").val();
        var lName = jQuery(".lName").val();
        var address = jQuery(".address").val();
        var phone = jQuery(".phone").val();
        var email = jQuery(".email").val();
        var status = jQuery(".status").val();

        $.ajax({
            url: 'employeestore',
            type: 'POST',
            datatype: 'JSON',
            data: {
                fName: fName,
                lName: lName,
                address: address,
                phone: phone,
                email: email,
                status: status
            },
            success: function (response) {
                if (response["msg"] == "404") {
                    show();
                    Command: toastr["error"]("Data has not saved Successfully!")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    jQuery('.msg').html('<div class="alert alert-danger">Data Not Saved</div>');
                    jQuery('.alert').fadeOut(1000);
                    jQuery(".fName").val("");
                    jQuery(".lName").val("");
                    jQuery(".address").val("");
                    jQuery(".phone").val("");
                    jQuery(".email").val("");
                    jQuery(".status").html("<option selected>---Select--Status---</option>\
                    <option value='1'>Active</option>\
                    <option value='2'>Inactive</option>");
                    // alert("Data Not Saved");
                } else if (response.msg == "success") {
                    show();
                    Command: toastr["success"]("Data has saved Successfully!")

                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }
                    jQuery('.msg').html('<div class="alert alert-success">Data Saved</div>');
                    jQuery('.alert').fadeOut(1000);
                    jQuery(".fName").val("");
                    jQuery(".lName").val("");
                    jQuery(".address").val("");
                    jQuery(".phone").val("");
                    jQuery(".email").val("");
                    jQuery(".status").html("<option selected>---Select--Status---</option>\
                                            <option value='1'>Active</option>\
                                            <option value='2'>Inactive</option>");
                    // alert("Data Saved");
                }
            }
        });
    });

    //Change status
    jQuery(document).on("click", "#btnStatus", function(e){
        var id = jQuery(this).val();
        //console.log(id);

        $.ajax({
            url: "changestatus/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(response){
                if (response.status == "success") {
                    show();
                    Command: toastr["info"]("Status has changed Successfully!")

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    jQuery('.msg').html('<div class="alert alert-success">Status has Changed</div>');
                    jQuery('.alert').fadeOut(1000);
                }
            }
        });
    });
});
