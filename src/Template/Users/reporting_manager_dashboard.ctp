<div class="row">
    <div class="hpanel">
        <div class="panel-body">
        	<div class="lead">
            	<p>Hi <strong> <?= $loggedInUser['first_name']." ".$loggedInUser['last_name'] ?></strong>,</p> 
	    		<p><small>So you're a Reporting Manager here at Twinspark.</small></p>
	    	</div>
	        <div class="col-lg-5">
				<?php echo '<a href="'.$urlHost.'users/reportingManagerSubordinates">'; ?>
					<div class="widget btn btn-outline btn-primary p-xl text-center" style="display: block;">
					<br><br>
						<h2>
							<strong>My Team</strong>
						</h2>
					<br><br>
					</div>
				</a>
			</div>
			<div class="col-lg-5">
				<?php echo '<a href="'.$urlHost.'users/employeeSurveys">'; ?>
					<div class="widget btn btn-outline btn-info p-xl text-center" style="display: block;">
					<br><br>
						<h2>
							<strong>Start Survey</strong>
						</h2>
					<br><br>
					</div>
				</a>
			</div>
		</div>
		</div>
    </div>   
</div>
<style type="text/css">
    a.disabled {
   pointer-events: none;
   cursor: default;
}
</style>