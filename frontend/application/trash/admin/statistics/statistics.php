<?php
/*

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://clix.pt");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
echo $output;

*/
?>




<div id="dashet">


    <div class="column" id="col1">
        <div class="portlet" id="list1">
            <div class="portlet-header">Conteudos</div>
            
            <div class="portlet-content">
                <div id="chart_div" class="stastgrafs"></div>
            </div>
        </div>
  
        <div class="portlet" id="list2">
            <div class="portlet-header">Conteudos</div>
            
            <div class="portlet-content">
                <div id="visualization" class="stastgrafs"></div>
            </div>
        </div>
    </div>
  
    <div class="column" id="col2">
        <div class="portlet" id="list3">
            <div class="portlet-header">Conteudos</div>
            
            <div class="portlet-content">
                <div id="chart_pages" class="stastgrafs"></div>
            </div>
        </div>


        <div class="portlet" id="list4">
            <div class="portlet-header">Conteudos</div>
            
            <div class="portlet-content">
                <div id="chart_pages_view" class="stastgrafs"></div>
            </div>
        </div>
    </div>
</div>

<style>

.stastgrafs{
    margin:auto;    
}
</style>


<script type="text/javascript" src="/static/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/static/js/admin/home.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

var jasonDate       = <?php echo $googleMonth ?>;
var jasonStatsDay   = <?php echo $stats_days ?>;
var jasonStatsPages = <?php echo $stats_page ?>;

var dateArray    = [];
var statsDayArray = [];
var statsPagesArray = [];
var statsPagesViewArray = [];

for (var key in jasonDate){
        dateArray.push([jasonDate[key].month, jasonDate[key].visitors]);
}


for (var key in jasonStatsPages){
        statsPagesArray.push([jasonStatsPages[key].date, jasonStatsPages[key].visitors]);
        statsPagesViewArray.push([jasonStatsPages[key].date, jasonStatsPages[key].pageviews]);

}






// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawMouseoverVisualization);
 var barsVisualization;

function drawMouseoverVisualization() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Mês');
    data.addColumn('number', 'Visitas');
    data.addRows(dateArray);

    barsVisualization = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    barsVisualization.draw(data, null);

    // Add our over/out handlers.
    google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
    google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);
    }

    function barMouseOver(e) {
    barsVisualization.setSelection([e]);
    }

    function barMouseOut(e) {
    barsVisualization.setSelection([{'row': null, 'column': null}]);
}


function drawMouseoverVisualization() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Paginas');
    data.addColumn('number', 'Visitas');
    data.addRows(dateArray);

    barsVisualization = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    barsVisualization.draw(data, {height: 300});

    // Add our over/out handlers.
    google.visualization.events.addListener(barsVisualization, 'onmouseover', barMouseOver);
    google.visualization.events.addListener(barsVisualization, 'onmouseout', barMouseOut);
    }

    function barMouseOver(e) {
    barsVisualization.setSelection([e]);
    }

    function barMouseOut(e) {
    barsVisualization.setSelection([{'row': null, 'column': null}]);
}


/**Days Staments*/
function drawVisualization() {
      // Create and populate the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'x');
    data.addColumn('number', 'visitors');
    data.addColumn('number', 'pageviews');

    for (var key in jasonStatsDay){
        data.addRow([jasonStatsDay[key].date, jasonStatsDay[key].visitors, jasonStatsDay[key].pageviews]);

    }

    // Create and draw the visualization.
    new google.visualization.LineChart(document.getElementById('visualization')).
    draw(data, {curveType: "function",
     height: 300,
    vAxis: {maxValue: 10}}
    );
}


google.setOnLoadCallback(drawVisualization);

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);
google.setOnLoadCallback(drawChartPageView);

function drawChart() {

// Create the data table.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Topping');
data.addColumn('number', 'Slices');
data.addRows(statsPagesArray);

// Set chart options
var options = {'title':'Paginas visualizadas por Visitas',
'width':'98%',
'height':300};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.PieChart(document.getElementById('chart_pages'));
chart.draw(data, options);
}


function drawChartPageView() {

// Create the data table.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Topping');
data.addColumn('number', 'Slices');
data.addRows(statsPagesViewArray);

// Set chart options
var options = {'title':'Paginas visualizadas por PageViews',
'width':'98%',
'height':300};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.PieChart(document.getElementById('chart_pages_view'));
chart.draw(data, options);
}

</script>

