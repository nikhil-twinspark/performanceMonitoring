<?= $this->Html->script('chartjs/Chart.min.js') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                Subordinate Result
            </div>
            <div class="panel-body">
                <div>
                    <canvas id="radarChart" width="600" height="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    <?php 
    echo "var data = JSON.parse('".json_encode($data)."');";

    ?>
    console.log(data);
    $(function(){
        var LegendOptions = ['Achieved Levels','Required Levels']
        var radarData = {
            labels: data.competencies,
            datasets: [
            {
                label: "Achieved Levels",
                fillColor: "rgba(98,203,49,0.2)",
                strokeColor: "rgba(98,203,49,1)",
                pointColor: "rgba(98,203,49,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#62cb31",
                data: data.achieved_levels
            },
            {
                label: "Required Levels",
                fillColor: "rgba(98,203,49,0.4)",
                strokeColor: "rgba(98,203,49,1)",
                pointColor: "rgba(98,203,49,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#62cb31",
                data: data.required_levels, 
            }
            ]
        };

        var radarOptions = {
            scaleShowLine : true,
            angleShowLineOut : true,
            scaleShowLabels : false,
            scaleBeginAtZero : true,
            angleLineColor : "rgba(0,0,0,.1)",
            angleLineWidth : 1,
            pointLabelFontFamily : "'Arial'",
            pointLabelFontStyle : "normal",
            pointLabelFontSize : 10,
            pointLabelFontColor : "#666",
            pointDot : true,
            pointDotRadius : 2,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 20,
            datasetStroke : true,
            datasetStrokeWidth : 1,
            datasetFill : true,
        };

        var ctx = document.getElementById("radarChart").getContext("2d");
        var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);
    });
</script>