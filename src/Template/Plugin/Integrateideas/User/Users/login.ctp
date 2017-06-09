<div class="ibox-content">
<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-5 text-center" style="margin: 4px 0 0 84px;">

            <h2 class="font-bold m-t-lg text-muted">CAPview</h2>
            <h6><strong>The capability viewing software</strong></h6>
            <div class="profile-img-container m-t-lg">
                <div class="m-b-md m-t-lg">
          
                    <?= $this->Html->image('2017-04-03_1312.png', ['style' => 'width:150px; height:150px;', 'alt'=>'image'])?>
                    </div>
            </div>
            <p class="primary-desc">
                   <strong> CAPview is a customisable, web-based employee performance management service. Our solution allows business owners to align individual goals to those of the business. </strong> 
                </p>

                <p>
                    This easy-to-use software allows you to drive higher engagement in the performance management process and use this data to produce key insights into how your teams and people work together. 
                </p>
        </div>
        <div class="col-md-5" >
            <br><br><br>
            <br><br><br>

            <div class="ibox-content">
                <?= $this->Form->create(null, ['class' => 'm-t']); ?>
                <div class="form-group">
                    <?= $this->Form->Input('username', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Username', 'required'=>'required']); ?>
                </div>
                <?= $this->Form->Input('password', ['type' => 'password', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Password', 'required'=>'required']) ?>
            <br>
            <?= $this->Form->button('Login', ['type' => 'submit', 'class' => 'btn btn-primary block full-width m-b col-sm-12']); ?>
            <br><br>
            <?= $this->Html->link('SignUp','/users/signUp',['type' => 'submit', 'class' => 'btn btn-info block full-width m-b col-sm-12']);?>
            <br><br>
            <div class="text-center">
            <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#forgotPassword">Forgot Password</button>
            <br>
            </div>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
<hr/>
            <div class="row">
                <div class="col-md-12 text-center">
                    &copy;<?php echo ' '.(date("Y")-1).'-'.date("Y").' '?>CAPview, LLC, All rights reserved.
                     <a href="mailto:hello@twinspark.co">Email Us For Help</a>
                </div>
            </div>
</div>
</div>

<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= $this->Form->create(null, ['class' => 'form-horizontal','data-toggle'=>"validator"]) ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?= __('FORGOT PASSWORD')?></h4>
        </div>

        <div class="modal-body">
          <div class="alert" id="rsp_msg" style=''></div>
          <div class="form-group">
            <?= $this->Form->label('forgotUsername', __('Please enter your username'), ['class' => ['col-sm-4', 'control-label']]); ?>
            <div class="col-sm-8">
              <?= $this->Form->input("forgotUsername", array(
                  "label" => false,
                  'required' => true,
                  'id'=>'forgotUsername',
                  "type"=>"text",
                  "class" => "form-control",'data-minlength'=>8,
                  'placeholder'=>"Enter Username"));
              ?>
            </div>
          </div>
        </div>
        <div class="modal-footer text-center">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
          <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary'], 'type' => 'button','id'=>"forgotUserPassword"]) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>