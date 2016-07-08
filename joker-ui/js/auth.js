function check_login(callback) {
    if (Cookies.get('joker_id') == undefined || Cookies.get('joker_id') == null) {
        window.location.href = "/joker2/login.php";
    } else {
        $.get(API_SERVER + "auth/verify/?id=" + Cookies.get('joker_id') + "&ticket=" + Cookies.get('joker_ticket'), function (r) {
            if (callback) callback();
            else {
                $(".username").html(Cookies.get('joker_username'));
                var previous_change_date = new Date(r["last_change_of_password"]);
                var current_change_date = new Date();
                var expire_date = 90 * 24 * 3600 * 1000;
                console.info("Your password will expire in " + (90 - (current_change_date - previous_change_date) / 3600 / 1000 / 24).toFixed(0) + " days.");
                if (Cookies.get('joker_change_password') == null) {
                    if (r["last_change_of_password"] == null) {
                        bootbox.alert(warning_message("You have not changed your password since your first log in, please change immediately."), function () {
                            Cookies.set('joker_change_password', true);
                            bootbox.hideAll();
                            change_password();
                        });
                    } else if (current_change_date - previous_change_date > expire_date) {
                        bootbox.alert(warning_message("Your password has not been changed for 90 days, please change immediately."), function () {
                            Cookies.set('joker_change_password', true);
                            bootbox.hideAll();
                            change_password();
                        });
                    }
                }
            }
        }).fail(function () {
            window.location.href = "/joker2/login.php";
        });
    }
}

function logout() {
    Cookies.remove("joker_id");
    Cookies.remove("joker_username");
    Cookies.remove("joker_ticket");
    window.location.href = "/joker2/login.php";
}

function change_password() {
    var html = "<p><input type='password' id='change_password_old' class='form-control select2' placeholder='Current Password'/></p>";
    html += "<p><input type='password' id='change_password_new' class='form-control select2' placeholder='New Password'/></p>";
    html += "<p><input type='password' id='change_password_new_repeat' class='form-control select2' placeholder='Repeat New Password'/></p>";
    bootbox.dialog({
        title: "Change Password",
        message: html,
        buttons: {
            Proceed: function () {
                if ($("#change_password_new").val() != $("#change_password_new_repeat").val()) {
                    bootbox.alert(error_message("Failed to change password: the new password and the password you repeated are not the same."), function () {
                        change_password();
                    });
                } else if (!check_password($("#change_password_new").val())) {
                    bootbox.alert(error_message("Failed to change password: password should contain at least one number, one lowercase and one uppercase letter, and has at least six characters."), function () {
                        change_password();
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: API_SERVER + "auth/change-password/",
                        data: {
                            id: Cookies.get('joker_id'),
                            old: CryptoJS.MD5($("#change_password_old").val()).toString(),
                            new: CryptoJS.MD5($("#change_password_new").val()).toString()
                        },
                        success: function (data) {
                            bootbox.hideAll();
                            bootbox.alert(success_message("Password has been successfully changed. Please log in again."), function () {
                                window.location.href = "login.php";
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            var error_msg = "authentication server is not responding.";
                            switch (xhr.status) {
                                case 406:
                                    error_msg = "the new password you provided is same as your previous one.";
                                    break;
                                case 401:
                                    error_msg = "the current password you provided is not correct.";
                                    break;
                            }
                            bootbox.hideAll();
                            bootbox.alert(error_message("Failed to change password: " + error_msg), function () {
                                change_password();
                            });
                        },
                        dataType: "json"
                    });
                }
            }
        }
    });
}
