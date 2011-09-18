<form action="/cms/question/<?= $question['formAction']; ?>" method="post">
<div class="addContent">
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr><td>
                <h3>Question :</h3>
                    <table >
                        <tbody>
                            <tr>
                                <th>Title</th>
                                <td>
                                    <input type="text" name="question[title]" class="jr" value="<?= $question['title']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>Text</th>
                                <td>
                                    <textarea name="question[text]" class="jr"><?= $question['text']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>
                                    <? $removeAnswers = false; ?>
                                    <? if (!empty($levelCollection)): ?>
                                        <select name="question[level_id]" id="level">
                                            <? foreach ($levelCollection as $level): ?>
                                                <?
                                                if (isset($question['level_id']) && $level['id'] == $question['level_id']){
                                                    $sel = 'selected="selected"';
                                                    $removeAnswers = ($level['rating'] > 5) ? true : false;
                                                }else $sel = '';
                                                
                                                
                                                ?>
                                            <option class="<?=$level['rating'];?>" value="<?= $level['id']; ?>" <?= $sel; ?>><?= $level['name']; ?></option>
                                            <? endforeach; ?>
                                        </select>
                                    <? else: ?>
                                        No level set
                                    <? endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </td>
            <td id="answerForm">
                <h3>Answers :</h3>
                <!-- Answers -->
                <? $answerCollection = !empty($answerCollection) ? $answerCollection : array(null, null, null); ?>
                <table>
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Text</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($answerCollection as $answer): ?>
                            <tr>
                                <td>
                                    <select name="answer[status][]">
                                        <option value="wrong" <?= ($answer['status'] == 'wrong' ? 'selected="selected"' : ''); ?>>Wrong</value>
                                        <option value="correct" <?= ($answer['status'] == 'correct' ? 'selected="selected"' : ''); ?>>Correct</value>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="answer[text][]" value="<?= $answer['text']; ?>" class="jr"/>
                                    <input type="hidden" name="answer[id][]" value="<?= $answer['id']; ?>"/>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"> 
                <input type="hidden" name="question[id]" value="<?= $question['id']; ?>" />
                <input type="submit" name="submit" value="Save" />
            </td>
        </tr>
    </table>
</div>
</form>
<? if($removeAnswers):?>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#answerForm').hide();
        $('#answerForm input').each(function(){
            $(this).removeClass('jr');
        });
    });
</script>
<? endif;?>