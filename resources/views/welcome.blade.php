@include('layout.header')
<style>
.highcharts-candlestick-series .highcharts-point {
    stroke: #f05f70;
    fill: #f05f70;
}
.highcharts-candlestick-series .highcharts-point-up {
    stroke: #219155;
    fill: #219155;
}
</style>
<main>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
{{-- <div class="input-group-btn show">
<button data-toggle="dropdown" type="button" class="btn btn-white dropdown-toggle" aria-expanded="true">Action <span class="caret"></span></button>
<ul class="dropdown-menu show" x-placement="top-start" style="position: absolute; transform: translate3d(0px, -201px, 0px); top: 0px; left: 0px; will-change: transform;">
<li><a href="#">Action</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li>
<li class="divider"></li>
<li><a href="#">Separated link</a></li>
</ul>
</div> --}}
                    <div id="main-chart" class="main-chart block chart" style="height:800px;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="block">
                        test
                    </div>
                </div>
                <div class="col-lg-2 balance">
                    <div class="messages-block block">
                        <div class="title"><strong class="d-block">Available Balance</strong></div>
                        @foreach ($balance as $bal)
                            @if($bal['Balance'] > 0)
                            <div class="messages">
                                <a href="#" class="message d-flex align-items-center">
                                    <div class="profile text-danger">
                                        {{ $bal['Currency'] }}
                                    </div>
                                    <div class="content">
                                        <strong class="d-block">{{ formatCrypto($bal['Available']) }}</strong>
                                        <small class="date d-block">{{ formatCrypto($bal['Balance']) }}</small>
                                    </div>
                                </a>
                             </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layout.footer')

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/drag-panes.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script>
/**
 * Request data from the server, add it to the graph and set a timeout 
 * to request again
 */
function requestLatestData() {
    //$.ajax({
    $.getJSON('/chartLatestTick/BTC-XRP/thirtyMin', function(data) {
        //url: '/chartLatestTick/BTC-XRP/thirtyMin',
        //success: function(point) {
            var series = chart.series[0];
            var series2 = chart.series[1];

            series.addPoint([
                Date.parse(data[0].T),
                data[0].O, // open
                data[0].H, // high
                data[0].L, // low
                data[0].C // close
            ], true, true);
            
            series2.addPoint([Date.parse(data[0].T), Math.round(data[0].BV)], true, true);

            // call it again after ten second
            setTimeout(requestLatestData, 10000);    
        //},
        //cache: false
    });
}

$(document).ready(function(){
    $.getJSON('/chart/BTC-XRP/thirtyMin', function (data) {
        // split the data set into ohlc and volume
        var ohlc = [],
            volume = [],
            dataLength = data.length;

        for (i = 0; i < dataLength; i += 1) {

            ohlc.push([
                Date.parse(data[i].T), // the date
                data[i].O, // open
                data[i].H, // high
                data[i].L, // low
                data[i].C // close
            ]);

            volume.push([
                Date.parse(data[i].T), // the date
                Math.round(data[i].BV) // the volume
            ]);
        }
        // create the chart
        chart = Highcharts.stockChart('main-chart', {
            chart: {
                zoomType: 'x',
                events: {
                    load: requestLatestData
                }
            },
            rangeSelector: {
                selected: 1
            },

            title: {
                text: '{{ $currency['CurrencyLong'] }} - {{ $currency['Currency'] }}'
            },

            yAxis: [{
                labels: {
                    align: 'right',
                    x: -3
                },
                title: {
                    text: '{{ $currency['CurrencyLong'] }} - {{ $currency['Currency'] }}'
                },
                height: '80%',
                lineWidth: 2,
                resize: {
                    enabled: true
                }
            }, {
                labels: {
                    align: 'right',
                    x: -3
                },
                title: {
                    text: 'Volume'
                },
                top: '85%',
                height: '15%',
                offset: 0,
                lineWidth: 2
            }],

            tooltip: {
                split: true
            },

            series: [{
                type: 'candlestick',
                name: '{{ $currency['CurrencyLong'] }} - {{ $currency['Currency'] }}',
                data: ohlc
            }, {
                type: 'column',
                name: 'Volume',
                data: volume,
                yAxis: 1
            }]
        });
        if( !chart.resetZoomButton ) {
            chart.showResetZoom();
        }
    });
});
</script>