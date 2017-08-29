google.charts.load('visualization', '1', {'packages':['corechart', 'controls']});

google.setOnLoadCallback(initialize);

function initialize () {
    $('#graph').click(function () {
        var pollutant   = $('#pollutant option:selected').val();
        var period      = $('#period option:selected').val();
        var year        = $('#year option:selected').val();
        var site        = $('#site option:selected').val();
        drawChart(pollutant,period,year,site);
    });
}

function drawChart(pollutant,period,year,site){
    if(pollutant === 'co'){
        var pollu = 'Carbonmonoxide';
    }else{
        var pollu = 'Particulate';
    }
    var jsonData = $.ajax({
        url: $('#base-url').val() + 'getGraph',
        type: 'POST',
        data:{pollutant:pollutant,period:period,year:year,site:site},
        dataType:"json",
        async: false,
        success: function(jsonData){
            var options = { title: pollu,legend: { position: 'bottom' },hAxis: { minValue: 0, maxValue: 9 },curveType: 'function'};
            var data = new google.visualization.arrayToDataTable(jsonData);
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
    }}).responseText;
}


$('#period').change(function () {
    var val   = $('#period option:selected').val();
    if(val === 'year'){
        $('#year-div').css('display','block');
    }else{
        $('#year-div').css('display','none');
    }
}); 




