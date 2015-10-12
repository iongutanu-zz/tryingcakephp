<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<?php 
    if($question->total_answers !== 0) {
        $correct = ($question->total_correct_answers * 100)/$question->total_answers; 
        $incorrect = 100-$correct;
    }
    else {
        $correct = $incorrect = 0;
    }

?>
<div class="questions view large-9 medium-8 columns content">
    <h2><?= h($question->quize->title) ?></h2>
    <h4><?= h($question->quize->subtitle) ?></h4>
    <p style="text-align:right; margin:0 100px 0 0;">Acest chestionar este sponsorizat de catre <?= $this->Html->image($question->quize->sponsor_logo, [
    "alt" => "Nescafe"]) ?><p>

    <p class="quiz-progress" style="text-align: center; float:none;"><?= h($questionNumber) ?> | <?= h($toalQuestions) ?></p>
    <div style="text-align:center;"><?= $this->Html->image($question->logo) ?>
    </div>
    <div class="row" style="border: 3px gray solid; margin: 30px 0; padding: 50px 0; text-align:center; font-style: Italic;">
        <?= $this->Text->autoParagraph(h($question->question_text)) ?>
    </div>
    <form method="post" accept-charset="utf-8" action="/questions/passquiz/<?= $question->quize->id ?>/<?= $questionNumber+1 ?>">
    <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
    <div class="row" style="text-align:center; border: 2px black dashed; border-bottom: 0; padding-top:12px;">
        <div style="width:100px; height:auto; visibility: hidden;" id="rate_A">
            <?php if($question->correct_answer == false) echo "<span style='color:green;'>".$correct." % </span>"; else echo "<span style='color:red;'>".$incorrect." % </span>"; ?>
        </div>
        <div style="with:400px;"><?= $this->Text->autoParagraph(h($question->answer_a)) ?></div>
        <div id="checbox_A">
            <input type="checkbox" value="A" name="answer" />
        </div>
    </div>
    <div style="text-align:center; border: 2px black dashed; padding-top:12px;">
        <div style="width:100px; height:auto; visibility: hidden;" id="rate_B">
            <?php if($question->correct_answer == true) echo "<span style='color:green;'>".$correct." % </span>"; else echo "<span style='color:red;'>".$incorrect." % </span>"; ?>
        </div>
        <div><?= $this->Text->autoParagraph(h($question->answer_b)) ?></div>
        <div id="checbox_B">
            <input type="checkbox" value="B" name="answer" />
        </div>
    </div>
        <input type="submit" name="submit" value="Urmatorul" class="button" style="text-align:center; margin: 50px 0 50px 45%;" id="submitform" /></form>
</div>

<script type="text/javascript" language="JavaScript">
$(document).ready(function(){
    $('#submitform').attr('disabled', 'disabled');
    $('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false).prop('disabled', 'disabled');
   $('#rate_A,#rate_B').css("visibility", "visible");
   $('#submitform').attr('disabled', false);
});
})

</script>