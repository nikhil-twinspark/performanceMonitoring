<div class="row">
	<div class="hpanel">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover dataTables">
					<thead>
						<tr>
							<th scope="col" ><?= $this->Paginator->sort('id') ?></th>
							<th scope="col" ><?= __('Subordinates') ?></th>
							<th scope="col" ><?= __('View Survey Responses') ?></th>
							<th scope="col" ><?= __('View Survey Result') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rmSubordinates as $key => $rmSubordinate):?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= h($rmSubordinate->subordinate->first_name. " ".$rmSubordinate->subordinate->last_name) ?></td>
							
							<?php if(!empty($rmSubordinate->subordinate->subordinate_survey_responses->employee_survey_responses)){?>
							<td><?= '<a href='.$this->Url->build(['action' => 'subordinateSurveyResponses', $rmSubordinate->subordinate->subordinate_survey_responses->id]).' class="btn btn-primary"">' 
							?>
							View Responses
							<i class="fa fa-eye fa-fw"></i>
                            </a>
							</td>
							<?php }else{ ?>
							<td><?= __('Survey Not Taken') ?></td>
							<?php } ?>
							<?php if(!empty($rmSubordinate->subordinate->subordinate_survey_results->employee_survey_results)){?>
							<td><?= '<a href='.$this->Url->build(['action' => 'subordinateResult', $rmSubordinate->subordinate->subordinate_survey_results->id]).' class="btn btn-primary"">' 
							?>
							View Result
							<i class="fa fa-eye fa-fw"></i>
                            </a>
							</td>
							<?php }else{ ?>
							<td><?= __('Survey Not Taken') ?></td>
							<?php } ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>