$(document).ready(function () {
    Metronic.init();
    Layout.init();
    QuickSidebar.init();
    check_login();
    init_column_filter("select_segments", "cust_id");
    init_widget();
    draw_figures();
});

function draw_figures() {
    $("#figure_container").html("");
    stat_figure_histogram("age", false, "Age", "Distribution of Customers' Age", {
        x: "Customers' Age",
        y: "Probabilistic Distribution Function"
    }, 0, null, [15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100]);
    stat_figure_active("Active Customers", "Number of Active Customers", {
        x: "Year",
        y: "Number of Active Customers"
    });
    stat_figure_growth_rate_of_turnover("Growth Rate of Turnover (YTD vs. PYTD)", "Growth Rate of Turnover (YTD vs. PYTD)", {
        x: "Meeting ID",
        y: "Cumulative Growth Rate of Total Turnover (YTD vs. PYTD)",
        keys: ["Turnover (Previous Season)", "Turnover (This Season)", "Total Turnover (PYTD)", "Total Turnover (YTD)"]
    }, 0.05);
    stat_figure_growth_rate_of_standard_and_exotic_turnover("Grwoth Rate of Standard/Exotic Turnover (YTD vs PYTD)", "Grwoth Rate of Standard/Exotic Turnover (YTD vs PYTD)", {
        x: "Meeting ID",
        y: "Cumulative Growth Rate of Total Turnover (YTD vs. PYTD)",
        keys: ["Turnover (Previous Season)", "Turnover (This Season)", "Total Turnover (PYTD)", "Total Turnover (YTD)"]
    }, 0.05);
}

var tooltip = d3.select(".page-container").append("div").attr("class", "tooltip").style("opacity", 0);

function init_column_filter(fid, field) {
    var column_values = []
    $.ajax({
        type: "GET",
        url: API_SERVER + "model/retrieve_field_values/?field=" + field,
        async: false,
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                column_values.push({id: data[i].toString(), text: data[i].toString()});
            }
        }
    });
    $("#" + fid).select2({
        tags: column_values
    });
}

function stat_figure_bar_chart_draw(fig_id, src, title, label, params) {
    var fig_title_container = $("#figure-title-" + fig_id);
    var fig_portlet_body_container = $("#figure-portlet-" + fig_id + ">div>.portlet-body");
    var fig_portlet_meta_container = $("#figure-meta-" + fig_id);
    fig_title_container.css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().css("width", fig_portlet_body_container.width() + "px");
    fig_title_container.next().next().css("width", fig_portlet_body_container.width() + "px");
    $(".tooltip").css("z-index", $("#figure-portlet-" + fig_id + " .portlet").css("z-index") + 1);
    var margin = (("margin" in params) ? params["margin"] : {top: 20, right: 20, bottom: 50, left: 50});
    var width = fig_portlet_body_container.width() - margin.left - margin.right;
    var height = (fig_portlet_body_container.height() < 300 ? 300 : fig_portlet_body_container.height() - fig_portlet_meta_container.height()) - margin.top - margin.bottom;
    var x = d3.scale.ordinal().rangeRoundBands([0, width], (("gap" in params) ? params["gap"] : .1));
    var y = d3.scale.linear().range([height, 0]);
    var xAxis = d3.svg.axis().scale(x).orient("bottom");
    var yAxis = d3.svg.axis().scale(y).orient("left").ticks((("y_segment" in params) ? params["y_segment"] : 10), (("y_format" in params) ? params["y_format"] : ""));
    var svg = d3.select("#figure-div-" + fig_id).append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    x.domain(src.map(function (d) {
        return d.x;
    }));
    y_min_stat = d3.min(src, function (d) {
        return d.y;
    })
    y_max_stat = d3.max(src, function (d) {
        return d.y;
    })
    y.domain([(("y_min" in params) ? params["y_min"] : (y_min - (y_max - y_min) * 0.5)), (("y_max" in params) ? params["y_max"] : (y_max + (y_max - y_min) * 0.5))]);
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
            tooltip.html(("y_digit" in params) ? (("y_format" in params && params["y_format"] == "%") ? ((100.0 * d.y).toFixed(params["y_digit"]) + "%") : d.y.toFixed(params["y_digit"])) : d.y).style("left", (d3.event.pageX + 15) + "px").style("top", (d3.event.pageY - 15) + "px");
        })
        .on("mouseout", function (d) {
            tooltip.transition().duration(200).style("opacity", 0);
        });
}
