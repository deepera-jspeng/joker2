var WaitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId)  uniqueId = "Don't call this twice without a uniqueId";
        if (timers[uniqueId]) clearTimeout(timers[uniqueId]);
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

String.prototype.toTitleCase = function () {
    return this.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
};

String.prototype.splitMiddle = function () {
    var middle = Math.floor(this.length / 2);
    var before = this.lastIndexOf(' ', middle);
    var after = this.indexOf(' ', middle + 1);
    if (before == -1 || (after != -1 && middle - before >= after - middle)) {
        middle = after;
    } else {
        middle = before;
    }
    var s1 = this.substr(0, middle);
    var s2 = this.substr(middle + 1);
    return [s1, s2];
};

String.prototype.escapeHTML = function () {
    return this.replace(/>/g, '&gt;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
};

Array.prototype.findKeyValue = function (key_desc, key, value_desc) {
    for (var i = 0; i < this.length; i++) {
        if (this[i][key_desc] == key) return this[i][value_desc];
    }
};

Date.prototype.YYYYMMDDHHMMSS = function () {
    var year = "" + this.getFullYear();
    var month = "" + (this.getMonth() + 1);
    if (month.length == 1) {
        month = "0" + month;
    }
    var day = "" + this.getDate();
    if (day.length == 1) {
        day = "0" + day;
    }
    var hour = "" + this.getHours();
    if (hour.length == 1) {
        hour = "0" + hour;
    }
    var minute = "" + this.getMinutes();
    if (minute.length == 1) {
        minute = "0" + minute;
    }
    var second = "" + this.getSeconds();
    if (second.length == 1) {
        second = "0" + second;
    }
    return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
};

function success_message(msg) {
    return "<span class='text-success'><i class='fa fa-check-circle'></i> " + msg + "</span>";
}

function error_message(msg) {
    return "<span class='text-danger'><i class='fa fa-times-circle'></i> " + msg + "</span>";
}

function warning_message(msg) {
    return "<span class='text-warning'><i class='fa fa-exclamation-circle'></i> " + msg + "</span>";
}

function loading_message(msg) {
    return "<span class='text-info'><i class='fa fa-spinner'></i> " + msg + "</span>";
}

function guid() {
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000).toString(16).substring(1);
    }

    return s4() + s4() + '-' + s4() + '-' + s4() + '-' + s4() + '-' + s4() + s4() + s4();
}

function is_numeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function random_color() {
    return '#' + (0x1000000 + (Math.random()) * 0xffffff).toString(16).substr(1, 6);
}

function get_url_parameter(p) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == p) {
            return sParameterName[1];
        }
    }
}

function check_password(str) {
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test(str);
}

function init_widget() {
    $('[data-toggle="tooltip"]').tooltip();
    $("select").select2({
        dropdownAutoWidth: 'true',
        minimumResultsForSearch: Infinity
    });
}

function count_decimals(v) {
    var test = v, count = 0;
    while (test > 10) {
        test /= 10;
        count++;
    }
    return count;
}

function n_formatter(num) {
    if (num >= 1000000000) return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + ' billion';
    if (num >= 1000000) return (num / 1000000).toFixed(1).replace(/\.0$/, '') + ' million';
    if (num >= 1000) return (num / 1000).toFixed(1).replace(/\.0$/, '') + ' k';
    return num;
}

function delete_data_file(file) {
    bootbox.dialog({
        title: "Delete Data File",
        message: "<p>The following data file(s) will be deleted:</p><p class='font-red'>" + file + "</p>",
        buttons: {
            Proceed: function () {
                $.get("data/delete.php?f=" + file, function (r) {
                    if (r == "0") bootbox.alert(error_message("The requested file is not specified."));
                    else if (r == "1") location.reload();
                    else if (r == "-1") bootbox.alert(error_message("Failed to delete the requested file."));
                    else if (r == "-2") bootbox.alert(error_message("The extension of the requested file is not satisfied."));
                    else bootbox.alert(error_message("Unexpected error."));
                });
            }
        }
    });
}