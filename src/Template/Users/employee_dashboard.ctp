<div class="row">
		<div class="col-lg-6">
		    <div class="lead">
		  	  	<p>Hi <strong> <?= $loggedInUser['first_name']." ".$loggedInUser['last_name'] ?></strong>,</p> 
		    	<p><small>So you're a <?= $userJobDesignation?> here at Twinspark.</small></p>
		    </div>
		</div>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <?php if((!empty($employeeSurveyResult))){?>
            
			<div class="ibox-content">
            <br><br>
            <br><br>
    			<?= $this->Html->link('View your Survey Result', ['action' => 'employeeSurveyResults'], ['class' => 'btn btn-primary btn-block m-t']); ?>
			</div>
			<?php }else{ ?>
			<div class="ibox-title">
                <h3 class="text-center">Employee's Survey</h3>
                <p class="text-center">Take the following survey for the Performance Assessment.</p>
            </div>
            <div class="ibox-content">
            <br><br>
            <br><br>
            <strong><p class="text-center"><small>Please take the Survey and let us know how we can help improve.</small></p></strong>
    			<br>
    			<?= $this->Html->link('Take the Survey now!', ['action' => 'employeeSurveys'], ['class' => 'btn btn-primary btn-block m-t']); ?>
			</div>	
			<?php }?>
			<br><br>
			<br><br>
			<br><br>
		</div>
	</div>
</div>