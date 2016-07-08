$(document).ready(function () {
    Metronic.init();
    Layout.init();
    QuickSidebar.init();
    check_login();
    init_widget();
    draw_figures();
});

function draw_figures() {
    $("#figure_container").html("");
    stat_figure_histogram("age", false, "Age", "Distribution of Customers' Age", {
        x: "Customers' Age",
        y: "Probabilistic Distribution Function"
    }, 1, 0, [15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100]);
    stat_figure_active("Active Customers", "Number of Active Customers", {
        x: "Year",
        y: "Number of Active Customers"
    });
    stat_figure_growth_rate_of_turnover("Growth Rate of Turnover (YTD vs. PYTD)", "Growth Rate of Turnover (YTD vs. PYTD)", {
            x: "Meeting ID",
            y: "Cumulative Growth Rate of Total Turnover (YTD vs. PYTD)",
            keys: ["Turnover (Previous Season)", "Turnover (This Season)", "Total Turnover (PYTD)", "Total Turnover (YTD)"]
        }, 0.05);
}

var tooltip = d3.select(".page-container").append("div").attr("class", "tooltip").style("opacity", 0);

function add_portlet(target, title, body, fig_id, md, redraw_callback) {
    var content = "<div class='col-md-" + md + "' id='figure-portlet-" + fig_id + "'>";
    content += '<div class="portlet purple box">';
    content += '<div class="portlet-title">';
    content += '<div class="caption"><i class="fa fa-cogs"></i>' + title + '</div>';
    content += '<div class="tools">';
    content += '<a href="javascript:void(0);" class="collapse"></a>';
    content += '<a href="javascript:void(0);" class="fullscreen"></a>';
    content += '<a href="javascript:void(0);" class="remove"></a>';
    content += '</div>';
    content += '</div>';
    content += '<div class="portlet-body">' + body + '</div>';
    content += '</div>';
    content += '</div>';
    if ($(target + ">.row").length <= 0) $(target).append('<div class="row"></div>');
    $(target + ">.row:last").append(content);
    if (redraw_callback) {
        $("#figure-portlet-" + fig_id + " .tools .fullscreen").click(redraw_callback);
        redraw_callback();
    }
}

function generate_portlet_meta(fig_id, title, label, label_type) {
    var html = "<div style='display:inline-block;text-align:center;'>";
    html += "<div id='figure-meta-" + fig_id + "'>";
    html += "<div id='figure-title-" + fig_id + "' class='font-purple bold limit-title'>" + title + "</div>";
    html += "<div class='limit-title'><span class='bold'>" + label_type["x"] + ":</span> " + label["x"] + "</div>";
    html += "<div class='limit-title'><span class='bold'>" + label_type["y"] + ":</span> " + label["y"] + "</div>";
    html += "<hr style='margin-bottom:0;'/></div>";
    html += "<div id='figure-div-" + fig_id + "'></div>";
    html += "</div>";
    return html;
}

function stat_figure_histogram(column, categorical, title, fig_title, label, data_digits, bins) {
    var fig_id = guid();
    add_portlet("#figure-container", title, generate_portlet_meta(fig_id, fig_title, label, {
        x: "X Axis",
        y: "Y Axis"
    }), fig_id, 4, function () {
        $.get(API_SERVER + "model/histogram/?field=" + column + "&categorical=" + categorical + (bins ? "&bins=" + bins.join() : ""), function (data) {
            var src = [];
            for (var i = 0; i < data["hist"].length; i++) {
                src.push({
                    y: data["hist"][i],
                    x: Number(data["bin_edges"][i + 1]) === data["bin_edges"][i + 1] ? data["bin_edges"][i].toFixed(data_digits) + "-" + data["bin_edges"][i + 1].toFixed(data_digits) : data["bin_edges"][i + 1]
                });
            }
            $("#figure-div-" + fig_id).html("");
            stat_figure_bar_chart_draw(fig_id, src, title, label);
        }).fail(function () {
            $("#figure-div-" + fig_id).html("<span class='font-red'>Loading schema '" + column + "' failed!</span>");
        });
    });
}

function stat_figure_active(title, fig_title, label) {
    var fig_id = guid();
    add_portlet("#figure-container", title, generate_portlet_meta(fig_id, fig_title, label, {
        x: "X Axis",
        y: "Y Axis"
    }), fig_id, 4, function () {
        $.get(API_SERVER + "model/active_count/", function (data) {
            var src = [];
            src.push({
                y: data["active_customers_pytd"][0],
                x: "active_customers_pytd"
            })
            src.push({
                y: data["active_customers_ytd"][0],
                x: "active_customers_ytd"
            })
            $("#figure-div-" + fig_id).html("");
            stat_figure_bar_chart_draw2(fig_id, src, title, label);
        }).fail(function () {
            $("#figure-div-" + fig_id).html("<span class='font-red'>Loading schema '" + column + "' failed!</span>");
        });
    });
}

function stat_figure_growth_rate_of_turnover(title, fig_title, label, kpi) {
    var fig_id = guid();
    add_portlet("#figure-container", title, generate_portlet_meta(fig_id, fig_title, label, {
        x: "X Axis",
        y: "Y Axis"
    }), fig_id, 8, function () {
        $.get(API_SERVER + "model/turnover_growth_rate/", function (data) {
            var src = [];
            for (var i = 0; i < data["meeting_id"].length; i++) {
                src.push({
                    y: data["cumulative_growth_rate_of_total_turnover"][i],
                    x: data["meeting_id"][i],
                    values: [data["turnover_previous_season"][i], data["turnover_this_season"][i], data["total_turnover_pytd"][i], data["total_turnover_ytd"][i]]
                });
            }
            $("#figure-div-" + fig_id).html("");
            stat_figure_growth_rate_of_turnover_draw(fig_id, src, title, label, kpi);
        }).fail(function () {
            $("#figure-div-" + fig_id).html("<span class='font-red'>Loading schema '" + column + "' failed!</span>");
        });
    });
}

function stat_figure_bar_chart_draw(fig_id, src, title, label) {
    var fig_title_container = $("#figure-title-" + fig_id);
    var fig_portlet_body_container = $("#figure-portlet-" + fig_id + ">div>.portlet-body");
    var fig_portlet_meta_container = $("#figure-meta-" + fig_id);
    fig_title_container.css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().next().css("width", fig_portlet_body_container.width() + "px");
    $(".tooltip").css("z-index", $("#figure-portlet-" + fig_id + " .portlet").css("z-index") + 1);
    var margin = {top: 20, right: 10, bottom: 50, left: 50};
    var width = fig_portlet_body_container.width() - 10 - margin.left - margin.right;
    var height = (fig_portlet_body_container.height() < 300 ? 300 : fig_portlet_body_container.height() - fig_portlet_meta_container.height()) - margin.top - margin.bottom;
    var x = d3.scale.ordinal().rangeRoundBands([0, width], .1);
    var y = d3.scale.linear().range([height, 0]);
    var xAxis = d3.svg.axis().scale(x).orient("bottom");
    var yAxis = d3.svg.axis().scale(y).orient("left").ticks(10, "%");
    var svg = d3.select("#figure-div-" + fig_id).append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    x.domain(src.map(function (d) {
        return d.x;
    }));
    y.domain([d3.min(src, function (d) {
        return d.y;
    }), d3.max(src, function (d) {
        return d.y;
    })]);
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
        .selectAll("text")
        .style("text-anchor", "end")
        .attr("dx", "-.8em")
        .attr("dy", "-.3em")
        .attr("transform", function (d) {
            return "rotate(-65)";
        });
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
        .append("text")
        .attr("transform", "rotate(-90)");
    svg.selectAll(".bar")
        .data(src)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function (d) {
            return x(d.x);
        })
        .attr("width", x.rangeBand())
        .attr("y", function (d) {
            return y(d.y);
        })
        .attr("height", function (d) {
            return height - y(d.y);
        })
        .on("mousemove", function (d) {
            tooltip.transition().duration(200).style("opacity", .9);
            tooltip.html((100.0 * d.y).toFixed(2) + "%").style("left", (d3.event.pageX + 15) + "px").style("top", (d3.event.pageY - 15) + "px");
        })
        .on("mouseout", function (d) {
            tooltip.transition().duration(200).style("opacity", 0);
        });
}

function stat_figure_bar_chart_draw2(fig_id, src, title, label) {
    var fig_title_container = $("#figure-title-" + fig_id);
    var fig_portlet_body_container = $("#figure-portlet-" + fig_id + ">div>.portlet-body");
    var fig_portlet_meta_container = $("#figure-meta-" + fig_id);
    fig_title_container.css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().next().css("width", fig_portlet_body_container.width() + "px");
    $(".tooltip").css("z-index", $("#figure-portlet-" + fig_id + " .portlet").css("z-index") + 1);
    var margin = {top: 20, right: 10, bottom: 50, left: 50};
    var width = fig_portlet_body_container.width() - 10 - margin.left - margin.right;
    var height = (fig_portlet_body_container.height() < 300 ? 300 : fig_portlet_body_container.height() - fig_portlet_meta_container.height()) - margin.top - margin.bottom;
    var x = d3.scale.ordinal().rangeRoundBands([0, width], .5);
    var y = d3.scale.linear().range([height, 0]);
    var xAxis = d3.svg.axis().scale(x).orient("bottom");
    var yAxis = d3.svg.axis().scale(y).orient("left");
    var svg = d3.select("#figure-div-" + fig_id).append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    x.domain(src.map(function (d) {
        return d.x;
    }));
    y_min = d3.min(src, function (d) {
        return d.y;
    })
    y_max = d3.max(src, function (d) {
        return d.y;
    })
    y.domain([y_min-(y_max-y_min)*0.5, y_max+(y_max-y_min)*0.5]);
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
        .selectAll("text")
        .style("text-anchor", "end")
        .attr("dx", "-.8em")
        .attr("dy", "-.3em")
        .attr("transform", function (d) {
            return "rotate(-65)";
        });
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
        .append("text")
        .attr("transform", "rotate(-90)");
    svg.selectAll(".bar")
        .data(src)
        .enter().append("rect")
        .attr("class", "bar")
        .attr("x", function (d) {
            return x(d.x);
        })
        .attr("width", x.rangeBand())
        .attr("y", function (d) {
            return y(d.y);
        })
        .attr("height", function (d) {
            return height - y(d.y);
        })
        .on("mousemove", function (d) {
            tooltip.transition().duration(200).style("opacity", .9);
            tooltip.html(d.y).style("left", (d3.event.pageX + 15) + "px").style("top", (d3.event.pageY - 15) + "px");
        })
        .on("mouseout", function (d) {
            tooltip.transition().duration(200).style("opacity", 0);
        });
}

function stat_figure_growth_rate_of_turnover_draw(fig_id, src, title, label, kpi) {
    var fig_title_container = $("#figure-title-" + fig_id);
    var fig_portlet_body_container = $("#figure-portlet-" + fig_id + ">div>.portlet-body");
    var fig_portlet_meta_container = $("#figure-meta-" + fig_id);
    fig_title_container.css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().next().css("width", fig_portlet_body_container.width() + "px");
    $(".tooltip").css("z-index", $("#figure-portlet-" + fig_id + " .portlet").css("z-index") + 1);
    var margin = {top: 20, right: 10, bottom: 50, left: 50};
    var width = fig_portlet_body_container.width() - 10 - margin.left - margin.right;
    var height = (fig_portlet_body_container.height() < 300 ? 300 : fig_portlet_body_container.height() - fig_portlet_meta_container.height()) - margin.top - margin.bottom;
    var x = d3.scale.linear().range([0, width]);
    var y = d3.scale.linear().range([height, 0]);
    var xAxis = d3.svg.axis().tickFormat(d3.format("d")).scale(x).orient("bottom");
    var yAxis = d3.svg.axis().scale(y).orient("left").ticks(10, "%");
    var svg = d3.select("#figure-div-" + fig_id).append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    x.domain(d3.extent(src, function (d) {
        return d.x;
    }));
    y.domain([d3.min(src, function (d) {
        return d.y;
    }), d3.max(src, function (d) {
        return d.y;
    })]);
    var v = d3.svg.line()
        .x(function (d) {
            return x(d.x);
        })
        .y(function (d) {
            return y(d.y);
        });
    svg.append("path")
        .attr("class", "line")
        .attr("d", v(src))
        .attr("transform", "translate(0,0)");
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis);
    svg.append("path")
        .attr("class", "dashed")
        .attr("d", v([{
            x: d3.min(src, function (d) {
                return d.x;
            }), y: kpi
        }, {
            x: d3.max(src, function (d) {
                return d.x;
            }), y: kpi
        }]))
        .attr("transform", "translate(0,0)");
    svg.selectAll(".dot")
        .data(src)
        .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 5)
        .attr("cx", function (d) {
            return x(d.x);
        })
        .attr("cy", function (d) {
            return y(d.y);
        })
        .style("fill", "orange")
        .on("mouseover", function (d) {
            var html = "";
            html += "<span class='bold'>" + label["x"] + ":</span> " + d.x + "<br/>";
            html += "<span class='bold'>" + label["y"] + ":</span> " + (100.0 * d.y).toFixed(2) + "%<br/>";
            for (var i = 0; i < label.keys.length; i++) {
                html += "<span class='bold'>" + label.keys[i] + ":</span> " + n_formatter(d.values[i]) + "<br/>";
            }
            tooltip.transition()
                .duration(200)
                .style("opacity", .9);
            tooltip.html(html)
                .style("left", (d3.event.pageX + 20) + "px")
                .style("top", (d3.event.pageY - 20) + "px");
        })
        .on("mouseout", function (d) {
            tooltip.transition()
                .duration(500)
                .style("opacity", 0);
        });
}
