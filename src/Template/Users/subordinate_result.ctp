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
                label: "Employee Self Rating",
                fillColor: "rgba(98,203,49,0.5)",
                strokeColor: "rgba(98,203,49,1)",
                pointColor: "rgba(98,203,49,0.5)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#62cb31",
                data: data.achieved_levels
            },
            {
                label: "Job Requirement",
                fillColor: "rgba(0,0,0, 0.5)",
                strokeColor: "rgba(98,203,49,1)",
                pointColor: "rgba(10,49,82, 0.5)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#62cb31",
                data: data.required_levels, 
            }
            ]
        };
        var radarOptions = {
           responsive: true,
           animation: true,
           barValueSpacing : 5,
           barDatasetSpacing : 1,
           tooltipFillColor: "rgba(0,0,0,0.8)",                
           multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
        };

        var ctx = document.getElementById("radarChart").getContext("2d");
        var myNewChart = new Chart(ctx).Radar(radarData, radarOptions);
    });
</script>