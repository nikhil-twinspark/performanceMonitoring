<!-- <?= $this->Html->css(['plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css','plugins/iCheck/custom.css']) ?>
<?= $this->Html->script('plugins/iCheck/icheck.min.js') ?> -->
<div class="row">
  <div class="col-lg-12">
    <div class="hpanel">
    <?php foreach($surveyData as $key => $data):?>
      <div class="panel-body" <?= $key == '0' ? '': 'hidden' ?>  id= <?php echo 'competency'.$data['competency_id'] ?>>
        <h3 class="text-center"><?= $data['competency']['text']?></h3>
        <p class="text-center"><?= $data['competency']['description']?></p>

        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped">
            <tbody>
              <?php 
              $j = 0;
              foreach ($data['competency']['competency_questions'] as $linkedQuestions) { 
                $j++
                ?>
                <tr>
                  <td>
                    <span class="label label-success"><?= $j; ?></span>
                  </td>
                  <td class="issue-info">
                    <small>
                      <?= $linkedQuestions['question']['text']?>
                    <br><br>
                    </small>
                    <div class="questText" id="<?= 'questText'.$linkedQuestions['question']['id']?>">
                        <p style="color:green">Justification:
                            <input type="text" name="text1" id="<?= 'text'.$linkedQuestions['question']['id']?>" maxlength="130">
                        </p>
                    </div>
                  </td>
                  <td>
                    <input type="radio" onclick="showText(<?= $linkedQuestions['question']['id']?>)" name="yes.<?= $linkedQuestions['question']['id']?>" value="Yes" id="<?= 'r1'.$linkedQuestions['question']['id']?>" class="i-checks"> Yes
                    <input type="radio" name="yes.<?= $linkedQuestions['question']['id']?>" onclick = "hideText(<?= $linkedQuestions['question']['id']?>)" value="No" id="<?= 'r2'.$linkedQuestions['question']['id']?>"" class="i-checks"> No

                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="text-center">
          <?= $this->Form->button('Back', ['onclick'=>"backFunction(".$data['competency_id'].")",'type' => 'button', 'class' => 'btn btn-danger']); ?>
          <?php if(sizeof($surveyData)-1 == $key){ ?>
          <?= $this->Form->button('Submit', ['onclick'=>"myFunction(".$data['competency_id'].")",'type' => 'submit', 'class' => 'btn btn-primary']); ?>
           <?php }else{ ?>
            <?= $this->Form->button('Next', ['onclick'=>"myFunction(".$data['competency_id'].")",'type' => 'button', 'class' => 'btn btn-primary']); ?>
          <?php } ?>
          </div>      
        </div>

      <?php endforeach; ?>

    </div>
  </div>
</div>

<script type="text/javascript">
  function myFunction(id){
    var cId = '#competency'+id;
    var nextCId = '#competency'+(id+1);
    $(cId).hide();
    $(nextCId).show();
  }
  function backFunction(id){
    var cId = '#competency'+id;
    var backCId = '#competency'+(id-1);
    $(cId).hide();
    $(backCId).show();
  }

  $(document).ready(function () {
    $(".questText").hide();
  });
   function showText(id){
    $("#questText"+id).show();
   }

   function hideText(id){
    $("#questText"+id).hide();
   }

</script>
