<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    <?php
        $data = getDaysInMonth($month,$data);
    ?>
    $(document).ready(function(){

        var orders = <?php echo json_encode($data['data'])?>;
        var dates = <?php echo json_encode($data['dates'])?>;
        draw(orders,dates);
    });

    // $(document).ready(function(){
    //     $(document).on('click','.select-month a', function(event){
    //         event.preventDefault();
    //         var month = $(this).attr('href');
    //         $.ajax({
    //             url: "/admin/statistic/" + month,
    //             type: "GET",
    //             cache: false,
    //             data: {
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: 
    //         });

    //     });
    // });
    function draw(orders,dates){
        Highcharts.chart('chart-container', {
        chart: {
            type: 'line'
        },
        title: {
            text: '{{__("lang.growth-orders")}} , {{$month}}' 
        },
        xAxis: {
           categories: dates
        },
        yAxis: {
            title: {
                text: '{{__("lang.number-of-orders")}}'
            },
            tickInterval: 1
        },
        series: [{
            name: '{{__("lang.order")}}',
            data: orders,
            color: '#FF0000' 
        }],
    });
    }

</script>