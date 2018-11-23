

$(function () {
    function getData(callback){
        var data;
        var year;

        // Start Process Filter
        $("#search-year").change(function(){
            year = $('#search-year').val();
                $.ajax({
                type: "POST",
                url: '/data-dashboard/chart-one',
                data: {},
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (response) {
                    data = response;
                    callback(data);
                },

                // error: function (XMLHttpRequest, textStatus, errorThrown) {
                //     // alert(errorThrown);
                //     alert('Data not found');
                // }

                tryCount : 0,
                retryLimit : 3,
                error : function(xhr, textStatus, errorThrown ) {
                    if (textStatus == 'timeout') {
                        this.tryCount++;
                        if (this.tryCount <= this.retryLimit) {
                            //try again
                            $.ajax(this);
                            return;
                        }            
                        return;
                    }
                    if (xhr.status == 500) {
                        //handle error
                        console.log(textStatus);
                    } else {
                        //handle error
                        console.log(textStatus);
                    }
                }
            });
        });

        $.ajax({
            type: "POST",
            url: '/data-dashboard/chart-one',
            data: {},
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                data = response;
                callback(data);
            },

            // error: function (XMLHttpRequest, textStatus, errorThrown) {
            //     // alert(errorThrown);
            //     alert('Data not found');
            // }

            tryCount : 0,
            retryLimit : 3,
            error : function(xhr, textStatus, errorThrown ) {
                if (textStatus == 'timeout') {
                    this.tryCount++;
                    if (this.tryCount <= this.retryLimit) {
                        //try again
                        $.ajax(this);
                        return;
                    }            
                    return;
                }
                if (xhr.status == 500) {
                    //handle error
                    console.log(textStatus);
                } else {
                    //handle error
                    console.log(textStatus);
                }
            }
        });
        return data;
           
    }

    getData(function(dt){
        // console.log(window.chart_key);
        $('#highchart_1').highcharts({
            chart: {
                zoomType: 'xy',
                // type: 'spline'
            },
             plotOptions: {
                series: {
                    pointWidth: 30
                }
            },
            // colors: ['#f63f3f','#0073b7'],
            title: {
                text: 'Statistik Nilai Karyawan',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: dt['NAMA']
            },
            yAxis:[ {
                title: {
                    text: 'Amount'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#80800'
                }]
            },{
                title: {
                    text: 'Total'
                },
                opposite: true,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#FFF'
                }]
            }],
             credits: {
                  enabled: false
              },
            tooltip: {
                shared: true,
                useHTML: true,
                headerFormat: '<small>{point.key}</small><table>',
                pointFormat: '<tr><td style="color: {series.color}"><b>Total Nilai : </b> </td>' +
                    '<td style="text-align: right;color: {series.color}"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                valueDecimals: 2
            },
            legend: {
                align: 'center',
                verticalAlign: 'bottom',
                layout: 'horizontal',
                // x: 90,
                // y: 20
            },
            series: [
            {
                name: 'Label Nilai',
                data: dt['NILAI'],
                yAxis: 0,
                type: 'column',
                color: '#5E738B'
            }]
        });
    });
});
