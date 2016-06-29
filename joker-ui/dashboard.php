<html>
<head>
    <?php
    require_once "components/common.php";
    require_once "components/lib.php";
    require_once "components/css.php";
    require_once "components/menu.php";
    $page = basename($_SERVER["SCRIPT_FILENAME"]);
    echo "<title>SmartCube | " . find_title_by_url_from_array($menu, $page) . "</title>";
    ?>
</head>
<body class="page-header-fixed page-quick-sidebar-over-content">
<div class="page-header -i navbar navbar-fixed-top">
    <div class="page-header-inner">
        <?php require_once "components/logo.php"; ?>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <?php require_once "components/login.php"; ?>
            </ul>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <?php echo curl($PROTOCOL . $DOMAIN . '/joker2/components/sidebar.php?page=' . $page . '&user=' . $_COOKIE['joker_username']); ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php echo curl($PROTOCOL . $DOMAIN . '/joker2/components/breadcrumb.php?page=' . $page); ?>
            <!-- BEGIN PAGE -->
            <div class="row">
                <div class="col-md-12">
                    <h3>Updates</h3>
                    <span class="font-blue">v0.12.21</span>
                    <ul>
                        <li><span class='font-red'>Removed</span> maintenance menu when logged in as non-admin account</li>
                        <li><span class='font-red'>Removed</span> show edw data button when logged in as non-admin account</li>
                    </ul>
                    <span class="font-blue">v0.12.18</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> api system architecture</li>
                        <li><span class='font-purple'>Fixed</span> footer certificate link bug</li>
                        <li><span class='font-green'>Added</span> user management module</li>
                        <li><span class='font-red'>Removed</span> registration for cover page</li>
                    </ul>
                    <span class="font-blue">v0.12.7</span>
                    <ul>
                        <li><span class='font-green'>Added</span> status of modules for model management</li>
                        <li><span class='font-green'>Added</span> support of submitting jobs for model management</li>
                        <li><span class='font-green'>Added</span> extra information of job details for job management</li>
                        <li><span class='font-green'>Added</span> resetting job tracker for job management</li>
                        <li><span class='font-green'>Added</span> removing profile for model management</li>
                        <li><span class='font-green'>Added</span> creating new profile for model management</li>
                        <li><span class='font-yellow'>Modified</span> placement of buttons for job management</li>
                        <li><span class='font-green'>Added</span> ok button for customer details of predictions</li>
                        <li><span class='font-red'>Removed</span> command panel of job details for job management</li>
                        <li><span class='font-yellow'>Modified</span> layout of model management</li>
                        <li><span class='font-purple'>Fixed</span> display bug of html code within pre tag</li>
                        <li><span class='font-green'>Added</span> support of editing profiles for model management</li>
                        <li><span class='font-purple'>Fixed</span> permission bug when decompressing gzip files</li>
                        <li><span class='font-purple'>Added</span> installation and uninstallation of modules for model management</li>
                        <li><span class='font-yellow'>Modified</span> file upload mechanism to overwritten</li>
                        <li><span class='font-purple'>Added</span> view for EDW datasets</li>
                    </ul>
                    <span class="font-blue">v0.12.6</span>
                    <ul>
                        <li><span class='font-green'>Added</span> support of job monitor</li>
                        <li><span class='font-green'>Added</span> authentication for job management and job monitor</li>
                        <li><span class='font-yellow'>Modified</span> x axis label of the figure of customer details</li>
                    </ul>
                    <span class="font-blue">v0.12.5</span>
                    <ul>
                        <li><span class='font-green'>Added</span> support of job management</li>
                        <li><span class='font-purple'>Fixed</span> color bugs of dialogs</li>
                        <li><span class='font-yellow'>Modified</span> hint of data import</li>
                    </ul>
                    <span class="font-blue">v0.12.4</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> some chart titles and subtitles for model 1 and model 2</li>
                        <li><span class='font-purple'>Fixed</span> statistics table title too long bug</li>
                        <li><span class='font-green'>Added</span> dismiss response for compulsive password change request</li>
                    </ul>
                    <span class="font-blue">v0.11.28</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> button style for model validation</li>
                        <li><span class='font-yellow'>Modified</span> file structure of model validation from single file to ground truth and club model results together</li>
                        <li><span class='font-yellow'>Modified</span> file deletion process to make it faster</li>
                        <li><span class='font-green'>Added</span> file description for model validation</li>
                        <li><span class='font-red'>Removed</span> display of ground truth for model validation</li>
                        <li><span class='font-green'>Added</span> download file support for model validation</li>
                    </ul>
                    <span class="font-blue">v0.11.24</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> statistics table hint bug</li>
                        <li><span class='font-yellow'>Modified</span> interactive design of the manual input for data filters in customer set creation</li>
                    </ul>
                    <span class="font-blue">v0.11.23</span>
                    <ul>
                        <li><span class='font-green'>Added</span> manual input for data filters in customer set creation</li>
                        <li><span class='font-red'>Removed</span> table 2 of model 1</li>
                        <li><span class='font-green'>Added</span> 4 new tables for model 1</li>
                        <li><span class='font-green'>Added</span> support of removing upload button when user is not admin in data management</li>
                        <li><span class='font-green'>Added</span> confirming when changing password</li>
                    </ul>
                    <span class="font-blue">v0.11.17</span>
                    <ul>
                        <li><span class='font-red'>Removed</span> quintiles data from the growth table of model 1</li>
                        <li><span class='font-yellow'>Modified</span> format of static data</li>
                    </ul>
                    <span class="font-blue">v0.11.12</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> smartcube logo on login page</li>
                        <li><span class='font-green'>Added</span> support of password expire every 90 days</li>
                        <li><span class='font-green'>Added</span> support of enforced password change for new account at first login</li>
                        <li><span class='font-green'>Added</span> new figure in statistics for model 1</li>
                    </ul>
                    <span class="font-blue">v0.11.11</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> figures bug of customer details for model 4</li>
                        <li><span class='font-green'>Added</span> loading screen</li>
                    </ul>
                    <span class="font-blue">v0.11.10</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> user model to django user model</li>
                        <li><span class='font-green'>Added</span> support of changing password</li>
                        <li><span class='font-green'>Added</span> support of preventing re-using or cycling old passwords</li>
                        <li><span class='font-green'>Added</span> password check for registration and changing password</li>
                    </ul>
                    <span class="font-blue">v0.11.8</span>
                    <ul>
                        <li><span class='font-red'>Removed</span> the colons of the titles of the filters in predictions</li>
                        <li><span class='font-purple'>Fixed</span> array object none type bug</li>
                        <li><span class='font-purple'>Fixed</span> the bugs when reviewing customer set without clustering</li>
                        <li><span class='font-green'>Added</span> randomly selected from top 20% option for customer set creation</li>
                        <li><span class='font-red'>Removed</span> recent_growth_rate feature for model 1</li>
                        <li><span class='font-yellow'>Modified</span> feature of figure 2 from recent_growth_rate to to_recent_growth for model 1</li>
                        <li><span class='font-green'>Added</span> new order by options for customer set creation</li>
                        <li><span class='font-purple'>Fixed</span> y axis height bug for bar charts in customer details</li>
                        <li><span class='font-green'>Added</span> validation support for model 4</li>
                        <li><span class='font-purple'>Fixed</span> customer details not shown correctly bug for validation</li>
                        <li><span class='font-red'>Removed</span> figure 1 from statistics of model 4</li>
                        <li><span class='font-green'>Added</span> new figures for statistics of model 4</li>
                        <li><span class='font-red'>Removed</span> orange from color palette</li>
                        <li><span class='font-yellow'>Modified</span> hover color of pie charts to orange</li>
                        <li><span class='font-yellow'>Modified</span> the layout of some buttons in statistics to avoid button too long bug</li>
                        <li><span class='font-purple'>Fixed</span> display of columns too ugly and redundant bug</li>
                    </ul>
                    <span class="font-blue">v0.11.5</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> login checking bug</li>
                        <li><span class='font-yellow'>Modified</span> static statistics data</li>
                        <li><span class='font-green'>Added</span> statistics of customers over 0.6 active rate by joining season table for model 2</li>
                        <li><span class='font-green'>Added</span> active rate growth features for model 1</li>
                        <li><span class='font-green'>Added</span> new data for model 1</li>
                        <li><span class='font-yellow'>Modified</span> introduction of model 3</li>
                        <li><span class='font-green'>Added</span> hints for growth table of model 1</li>
                        <li><span class='font-green'>Added</span> prev. 83 & becoming over 0.6 table for model 2</li>
                        <li><span class='font-yellow'>Modified</span> data model structure of model 4</li>
                        <li><span class='font-purple'>Fixed</span> reason code too wide bug</li>
                        <li><span class='font-green'>Added</span> new features for model 4</li>
                        <li><span class='font-green'>Added</span> new figure for customer details of model 4</li>
                    </ul>
                    <span class="font-blue">v0.11.3</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> column width bug of validation page</li>
                        <li><span class='font-purple'>Fixed</span> customer details too long bug</li>
                        <li><span class='font-green'>Added</span> admin control for data management</li>
                        <li><span class='font-yellow'>Modified</span> user api system to another dedicated database</li>
                        <li><span class='font-yellow'>Modified</span> database system to support lower versions</li>
                    </ul>
                    <span class="font-blue">v0.10.30</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> truth to results for validation required headers</li>
                        <li><span class='font-red'>Removed</span> arrows from growth table of model 1</li>
                        <li><span class='font-yellow'>Modified</span> data structure of growth table of model 1</li>
                        <li><span class='font-green'>Added</span> loading modal for data management page</li>
                        <li><span class='font-yellow'>Modified</span> leading hints for all models</li>
                        <li><span class='font-purple'>Fixed</span> multiple filters stacking bug for clustering: select</li>
                        <li><span class='font-yellow'>Modified</span> filter operator color from blue to purple in clustering: select</li>
                    </ul>
                    <span class="font-blue">v0.10.29</span>
                    <ul>
                        <li><span class='font-green'>Added</span> new data for model 1</li>
                        <li><span class='font-yellow'>Modified</span> data structure of model 1</li>
                        <li><span class='font-yellow'>Modified</span> growth table data of model 1</li>
                        <li><span class='font-green'>Added</span> new features in both the clustering features and create set filter lists</li>
                        <li><span class='font-purple'>Fixed</span> axis selection width bug</li>
                        <li><span class='font-green'>Added</span> new options for create set / order by</li>
                        <li><span class='font-green'>Added</span> page descriptions for all pages of all models</li>
                    </ul>
                    <span class="font-blue">v0.10.27</span>
                    <ul>
                        <li><span class='font-green'>Added</span> arrows and colors for table 1 of model 1</li>
                        <li><span class='font-yellow'>Modified</span> vertical align of table cells to middle</li>
                    </ul>
                    <span class="font-blue">v0.10.26</span>
                    <ul>
                        <li><span class='font-green'>Added</span> statistics of inactive customers by joining season figure for model 2</li>
                        <li><span class='font-yellow'>Modified</span> data of table 1 of model 2</li>
                        <li><span class='font-yellow'>Modified</span> data of table 1 of model 1</li>
                    </ul>
                    <span class="font-blue">v0.10.25</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> YTD to PYTD vs. YTD for figure 1 of model 2</li>
                        <li><span class='font-green'>Added</span> new data for model 1</li>
                        <li><span class='font-yellow'>Modified</span> table 1 of model 1</li>
                        <li><span class='font-yellow'>Modified</span> x axis label of age figures of model 1 and model 2</li>
                        <li><span class='font-green'>Added</span> user does not exist hint for login</li>
                        <li><span class='font-green'>Added</span> progress bar for data uploading</li>
                        <li><span class='font-yellow'>Modified</span> x axis range of figure 2 for model 1</li>
                        <li><span class='font-green'>Added</span> responsive support for figures of statistics</li>
                        <li><span class='font-red'>Removed</span> figure of turnover of bet types from model 1</li>
                        <li><span class='font-green'>Added</span> figure of turnover of bet types for model 4</li>
                        <li><span class='font-yellow'>Modified</span> SmartCube logo</li>
                        <li><span class='font-yellow'>Modified</span> sidebar layout</li>
                        <li><span class='font-yellow'>Modified</span> breadcrumb layout</li>
                        <li><span class='font-purple'>Fixed</span> tooltip exceeding page height bug</li>
                        <li><span class='font-green'>Added</span> hint for new customer for model 2 statistics</li>
                        <li><span class='font-yellow'>Modified</span> titles of figures of statistics for model 1, 2, and 4</li>
                        <li><span class='font-purple'>Fixed</span> logo disappear bug when minimizing sidebar</li>
                        <li><span class='font-purple'>Fixed</span> sidebar icon height bug when minimizing sidebar</li>
                    </ul>
                    <span class="font-blue">v0.10.20</span>
                    <ul>
                        <li><span class='font-green'>Added</span> four columns of figure 1 for model 2</li>
                        <li><span class='font-yellow'>Modified</span> x axis ticks of figures of statistics to make them easy to read</li>
                        <li><span class='font-green'>Added</span> two tables for model 2</li>
                        <li><span class='font-purple'>Fixed</span> figure title width bug</li>
                        <li><span class='font-red'>Removed</span> all axis labels of figures of statistics</li>
                        <li><span class='font-yellow'>Modified</span> the scale of figure 2 of model 1</li>
                        <li><span class='font-yellow'>Modified</span> title and y axis label of figure 1 of model 1</li>
                        <li><span class='font-green'>Added</span> figure of distribution of active rate (YTD) of all customers for model 2</li>
                    </ul>
                    <span class="font-blue">v0.10.15</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> data management page design</li>
                        <li><span class='font-purple'>Fixed</span> prediction table tools display bug</li>
                        <li><span class='font-green'>Added</span> recent growth rate feature for model 1</li>
                        <li><span class='font-purple'>Fixed</span> the bug when importing files with missing features</li>
                        <li><span class='font-yellow'>Modified</span> figure 2 of model 1 to real data</li>
                        <li><span class='font-green'>Added</span> billion / million / k support for number in figure 1 of model 1 and model 2</li>
                        <li><span class='font-green'>Added</span> additional data for figure 1 of model 1</li>
                    </ul>
                    <span class="font-blue">v0.10.14</span>
                    <ul>
                        <li><span class='font-green'>Added</span> new data for model 1 and model 2</li>
                        <li><span class='font-yellow'>Modified</span> option 70 & 75 to 70 & 75 (MV >= 45 YO) for model 1 growth analysis table</li>
                        <li><span class='font-green'>Added</span> hint for headers of growth analysis table</li>
                        <li><span class='font-yellow'>Modified</span> design of growth analysis table to make it clear to read</li>
                        <li><span class='font-green'>Added</span> values to tooltips when hovering to pie charts</li>
                        <li><span class='font-yellow'>Modified</span> values of tooltips to two digits when hovering to charts</li>
                        <li><span class='font-red'>Removed</span> normal races and key races for model 1 growth analysis table</li>
                        <li><span class='font-red'>Removed</span> pie charts for model 2</li>
                        <li><span class='font-yellow'>Modified</span> y axis label and figure title of figure 1 of model 2</li>
                        <li><span class='font-purple'>Fixed</span> height bug of figure 1 for model 1 and model 2</li>
                        <li><span class='font-yellow'>Modified</span> static figure data of model 1 and model 2</li>
                        <li><span class='font-purple'>Fixed</span> figure 1 x axis label bug for model 1 and model 2</li>
                    </ul>
                    <span class="font-blue">v0.10.9</span>
                    <ul>
                        <li><span class='font-green'>Added</span> breakdown under the first row of the table in model 1</li>
                        <li><span class='font-green'>Added</span> segment selection for the table in model 1</li>
                        <li><span class='font-yellow'>Modified</span> PYTD to YTD for all figures in model 1 and model 2</li>
                        <li><span class='font-yellow'>Modified</span> the title of the table in model 1 to year-on-year growth analysis (ytd vs. pytd)</li>
                        <li><span class='font-yellow'>Modified</span> the title of figures for model 1 and model 2</li>
                        <li><span class='font-green'>Added</span> color change when hover the pie charts of model 1 and model 2</li>
                        <li><span class='font-green'>Added</span> hover hint for bar charts of model 1 and model 2</li>
                        <li><span class='font-yellow'>Modified</span> the width of y axis of the figure in customer details</li>
                    </ul>
                    <span class="font-blue">v0.10.6</span>
                    <ul>
                        <li><span class='font-green'>Added</span> growth of segment 70 & 75 table for model 1</li>
                        <li><span class='font-yellow'>Modified</span> model 4 data</li>
                        <li><span class='font-red'>Removed</span> figure of dist. of avg. active rate of new custs. of model 2</li>
                        <li><span class='font-yellow'>Modified</span> x axis labels of several figures of model 1 and model 2</li>
                        <li><span class='font-red'>Removed</span> figure of dist. of new custs.' active rate of model 2</li>
                        <li><span class='font-green'>Added</span> figure of dist. of new custs.' active rate (prev. 83 mtgs) of model 2</li>
                        <li><span class='font-green'>Added</span> active rate (prev. 83) filter for model 2 predictions</li>
                    </ul>
                    <span class="font-blue">v0.10.2</span>
                    <ul>
                        <li><span class='font-green'>Added</span> model 4 support pages</li>
                        <li><span class='font-green'>Added</span> model 4 data</li>
                        <li><span class='font-yellow'>Modified</span> turnover figure in customer details to exotic turnover figure for model 4</li>
                        <li><span class='font-purple'>Fixed</span> validation bug of model 2</li>
                        <li><span class='font-purple'>Fixed</span> validation figure display bug</li>
                    </ul>
                    <span class="font-blue">v0.10.1</span>
                    <ul>
                        <li><span class='font-green'>Added</span> changing metric for model 3 review set page</li>
                        <li><span class='font-purple'>Fixed</span> model 3 axis label display bug</li>
                    </ul>
                    <span class="font-blue">v0.9.30</span>
                    <ul>
                        <li><span class='font-green'>Added</span> new model 2 data</li>
                        <li><span class='font-purple'>Fixed</span> data import refreshing bug</li>
                        <li><span class='font-green'>Added</span> active rate of previous 83 races for model 2</li>
                        <li><span class='font-purple'>Fixed</span> model 2 badge display error in customer details</li>
                        <li><span class='font-purple'>Fixed</span> model 2 tag display error in customer details</li>
                        <li><span class='font-purple'>Fixed</span> y axis label display bug of customer turnover bar chart</li>
                        <li><span class='font-purple'>Fixed</span> model 2 column filter bug</li>
                    </ul>
                    <span class="font-blue">v0.9.22</span>
                    <ul>
                        <li><span class='font-green'>Added</span> clustering formulas for model 3</li>
                        <li><span class='font-purple'>Fixed</span> alert bug in clustering page</li>
                        <li><span class='font-green'>Added</span> cluster ids of customers for extracted csv file in model 3</li>
                    </ul>
                    <span class="font-blue">v0.9.21</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> hint of select all for creating customer sets</li>
                        <li><span class='font-green'>Added</span> random selection of model 3</li>
                        <li><span class='font-purple'>Fixed</span> reason code display bug in customer details</li>
                        <li><span class='font-red'>Removed</span> the figure of turnover per meeting</li>
                        <li><span class='font-yellow'>Modified</span> the figure of growth rate of turnover</li>
                    </ul>
                    <span class="font-blue">v0.9.17</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> source data</li>
                        <li><span class='font-yellow'>Modified</span> reason code with two digits</li>
                        <li><span class='font-green'>Added</span> select all for creating customer sets</li>
                        <li><span class='font-red'>Removed</span> timezone support for api subsystem</li>
                        <li><span class='font-red'>Removed</span> categorical variables from model 3 review, now numerical variables only</li>
                        <li><span class='font-yellow'>Modified</span> # of reason codes to 4</li>
                    </ul>
                    <span class="font-blue">v0.9.15</span>
                    <ul>
                        <li><span class='font-green'>Added</span> support of model 2</li>
                    </ul>
                    <span class="font-blue">v0.9.7</span>
                    <ul>
                        <li><span class='font-green'>Added</span> hints for customer table and details</li>
                        <li><span class='font-green'>Added</span> responsive design for review of customer sets</li>
                    </ul>
                    <span class="font-blue">v0.9.2</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> multiple badges bug on data management page</li>
                        <li><span class='font-red'>Removed</span> open sans font to increase performance</li>
                    </ul>
                    <span class="font-blue">v0.9.1</span>
                    <ul>
                        <li><span class='font-red'>Removed</span> withdraw / recharge options from column filters</li>
                        <li><span class='font-purple'>Fixed</span> reason code display bug</li>
                        <li><span class='font-purple'>Fixed</span> x axis too dense bug of turnover distribution figure</li>
                        <li><span class='font-purple'>Fixed</span> x axis order bug of turnover distribution figure</li>
                    </ul>
                    <span class="font-blue">v0.8.30</span>
                    <ul>
                        <li><span class='font-green'>Added</span> display of turnover and active rate trends</li>
                        <li><span class='font-green'>Added</span> auto-complete for customer set search</li>
                        <li><span class='font-red'>Removed</span> features list from dashboard</li>
                        <li><span class='font-green'>Added</span> responsive menu toggle on small screens (mobile version)</li>
                        <li><span class='font-yellow'>Modified</span> model 3 UI design</li>
                        <li><span class='font-yellow'>Modified</span> figures to be resized to maximized screen space</li>
                        <li><span class='font-green'>Added</span> zooming only on x / y axis</li>
                    </ul>
                    <span class="font-blue">v0.8.26</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> clear database bug</li>
                        <li><span class='font-yellow'>Modified</span> # of reason codes to 6</li>
                        <li><span class='font-yellow'>Modified</span> investment to turnover (TO)</li>
                        <li><span class='font-yellow'>Modified</span> meetings attended to active meetings</li>
                        <li><span class='font-red'>Removed</span> displays of recharge / withdrawal information</li>
                        <li><span class='font-green'>Added</span> links on dashboard</li>
                        <li><span class='font-green'>Added</span> colors to updates</li>
                        <li><span class='font-green'>Added</span> turnover parts</li>
                    </ul>
                    <span class="font-blue">v0.8.20</span>
                    <ul>
                        <li><span class='font-green'>Added</span> customer set model</li>
                        <li><span class='font-red'>Removed</span> data exploration page</li>
                        <li><span class='font-green'>Added</span> customer set management pages</li>
                        <li><span class='font-yellow'>Modified</span> clustering for customer sets</li>
                        <li><span class='font-yellow'>Modified</span> first time usage policy</li>
                        <li><span class='font-yellow'>Modified</span> certificates</li>
                    </ul>
                    <span class="font-blue">v0.8.16</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> API subsystem architecture</li>
                        <li><span class='font-green'>Added</span> user system</li>
                        <li><span class='font-green'>Added</span> source of data</li>
                        <li><span class='font-red'>Removed</span> upload page</li>
                        <li><span class='font-green'>Added</span> uploading in data management</li>
                        <li><span class='font-green'>Added</span> data source system</li>
                        <li><span class='font-yellow'>Modified</span> exporting file name as data source and configurations</li>
                    </ul>
                    <span class="font-blue">v0.8.7</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> exporting of large csv file bug</li>
                        <li><span class='font-red'>Removed</span> exporting to excel</li>
                        <li><span class='font-green'>Added</span> cleaning database before importing data</li>
                        <li><span class='font-green'>Added</span> current working data set indicator</li>
                        <li><span class='font-green'>Added</span> gzip support</li>
                        <li><span class='font-green'>Added</span> zoom in / out buttons</li>
                    </ul>
                    <span class="font-blue">v0.8.6</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> model 3 test page title to data exploration</li>
                        <li><span class='font-yellow'>Modified</span> data exploration axis to dotted grey</li>
                        <li><span class='font-green'>Added</span> data filter for data exploration</li>
                        <li><span class='font-purple'>Fixed</span> data filter or operation not working bug</li>
                        <li><span class='font-purple'>Fixed</span> data filter and operation bug (cannot combine same field)</li>
                    </ul>
                    <span class="font-blue">v0.7.30</span>
                    <ul>
                        <li><span class='font-green'>Added</span> updates log</li>
                        <li><span class='font-purple'>Fixed</span> overlapping bug of the x axis of figures</li>
                        <li><span class='font-green'>Added</span> plot test page</li>
                        <li><span class='font-green'>Added</span> figure zoom / pan features (non-categorical only)</li>
                    </ul>
                    <span class="font-blue">v0.7.25</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> model 3 api call bug</li>
                        <li><span class='font-yellow'>Modified</span> distance model to cosine distance for clustering</li>
                        <li><span class='font-green'>Added</span> categorical clustering support</li>
                    </ul>
                    <span class="font-blue">v0.7.15</span>
                    <ul>
                        <li><span class='font-green'>Added</span> https certificate at footer, please import to os before using the system</li>
                        <li><span class='font-yellow'>Modified</span> data model to model-oriented</li>
                        <li><span class='font-red'>Removed</span> model 2 data</li>
                    </ul>
                    <span class="font-blue">v0.7.13</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> model 2 figure 1 bug</li>
                        <li><span class='font-yellow'>Modified</span> api subsystem to nginx / gunicorn</li>
                        <li><span class='font-green'>Added</span> table column dragging</li>
                        <li><span class='font-green'>Added</span> table column hide / show</li>
                    </ul>
                    <span class="font-blue">v0.6.29</span>
                    <ul>
                        <li><span class='font-green'>Added</span> registration</li>
                        <li><span class='font-yellow'>Modified</span> model 1 data set</li>
                        <li><span class='font-green'>Added</span> uploading model validation files on-the-fly</li>
                        <li><span class='font-yellow'>Modified</span> separated pages of model validation</li>
                        <li><span class='font-green'>Added</span> enlarging model statistics figure</li>
                    </ul>
                    <span class="font-blue">v0.6.28</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> words of lapse to decline</li>
                        <li><span class='font-yellow'>Modified</span> predictions to the front of tables</li>
                        <li><span class='font-green'>Added</span> export all data (exporting large amount of data (>3000 records) is very slow)</li>
                        <li><span class='font-green'>Added</span> printing of current page</li>
                        <li><span class='font-green'>Added</span> portlet to statistical figures</li>
                        <li><span class='font-green'>Added</span> model validation</li>
                        <li><span class='font-green'>Added</span> fake login (username: smartcube, password: 1ac14128-4467-40f3-bf81-ebe0fad3f866)</li>
                        <li><span class='font-yellow'>Modified</span> clustering only on model 1</li>
                        <li><span class='font-purple'>Fixed</span> model 3 plotting bug</li>
                        <li><span class='font-yellow'>Modified</span> user profile page</li>
                        <li><span class='font-yellow'>Modified</span> demo url to: http://120.25.209.91</li>
                    </ul>
                    <span class="font-blue">v0.6.11</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> API system to Django</li>
                        <li><span class='font-yellow'>Modified</span> UI system to Bootstrap</li>
                        <li><span class='font-yellow'>Modified</span> default sorting mode to sync with query</li>
                        <li><span class='font-green'>Added</span> exporting feature</li>
                        <li><span class='font-green'>Added</span> show / hide column feature</li>
                        <li><span class='font-red'>Removed</span> prediction mode of model 1</li>
                        <li><span class='font-green'>Added</span> predictions in model tables</li>
                        <li><span class='font-green'>Added</span> separated customer page</li>
                    </ul>
                    <span class="font-blue">v0.5.16</span>
                    <ul>
                        <li><span class='font-yellow'>Modified</span> YTD to PYTD</li>
                        <li><span class='font-yellow'>Modified</span> prediction period list</li>
                        <li><span class='font-red'>Removed</span> options in detail window</li>
                        <li><span class='font-green'>Added</span> ranking in detail window</li>
                        <li><span class='font-purple'>Fixed</span> model 2 ordering bug</li>
                    </ul>
                    <span class="font-blue">v0.5.14</span>
                    <ul>
                        <li><span class='font-green'>Added</span> ordering function</li>
                        <li><span class='font-yellow'>Modified</span> yearly to annual in period selection of model 1</li>
                        <li><span class='font-yellow'>Modified</span> Fig 1.1 to Growth Rate of Turnover (YTD)</li>
                        <li><span class='font-green'>Added</span> KPI in Fig 1.1 & 2.1</li>
                        <li><span class='font-yellow'>Modified</span> Fig 1.2 to Turnover per Meeting</li>
                        <li><span class='font-yellow'>Modified</span> color palette for all piecharts</li>
                        <li><span class='font-yellow'>Modified</span> Fig 1.5 & 1.6 to Turnover of … (YTD)</li>
                        <li><span class='font-yellow'>Modified</span> the format of propensity in data table to percentage</li>
                        <li><span class='font-yellow'>Modified</span> Fig 2.1 to Avg. Act. Rate (YTD)</li>
                        <li><span class='font-yellow'>Modified</span> Fig 2.2 to # of Active Custs. per Meeting</li>
                        <li><span class='font-yellow'>Modified</span> the x axis of Fig 1.3, 2.3, and 2.4</li>
                        <li><span class='font-yellow'>Modified</span> Fig 2.6 & 2.7 to New Custs.' Turnover of … (YTD)</li>
                    </ul>
                    <span class="font-blue">v0.5.2</span>
                    <ul>
                        <li><span class='font-purple'>Fixed</span> removing data source</li>
                        <li><span class='font-purple'>Fixed</span> expression of prop.</li>
                        <li><span class='font-green'>Added</span> figures for model 1 and model 2</li>
                        <li><span class='font-purple'>Fixed</span> expression of growth 10%</li>
                        <li><span class='font-purple'>Fixed</span> sorting by LABEL_PROB</li>
                    </ul>
                </div>
            </div>
            <!-- END PAGE -->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<?php require_once "components/footer.php"; ?>
<?php require_once "components/js.php"; ?>
<script src="js/dashboard.js" type="text/javascript"></script>
</body>
</html>
