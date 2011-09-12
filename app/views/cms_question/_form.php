<form action="/cms/question/<?=$question['formAction']; ?>" method="post">
    <table >
        <tbody>
            <tr>
                <th>Title</th>
                <td>
                    <input type="text" name="question[title]" class="jr" value="<?=$question['title']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Text</th>
                <td>
                    <textarea  class="jr" name="question[text]" ><?=$question['text'];?></textarea>
                </td>
            </tr>
            <tr>
                <th>Level</th>
                <td>
                    <? if(!empty($levelCollection)):?>
                    <select name="question[level_id]">
                    <? foreach($levelCollection as $level):?>
                        <? if(isset($question['level_id']) && $level['id'] == $question['level_id']) $sel = 'selected="selected"';
                           else $sel = '';
                        ?>
                        <option value="<?=$level['id'];?>" <?=$sel;?>><?=$level['name'];?></option>
                    <? endforeach; ?>
                    </select>
                    <? else: ?>
                        No level set
                    <? endif;?>
                </td>
            </tr>
        </tbody>
    </table>
    
    <!-- Answers -->
    <? $answerCollection = !empty($answerCollection) ? $answerCollection : array(null, null, null);?>
    <table>
        <thead>
            <tr>
                <th>Status</th>
                <th>Text</th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($answerCollection as $answer):?>
            <tr>
                <td>
                    <select name="answer[status][]">
                        <option value="wrong" <?=($answer['status'] == 'wrong' ? 'selected="selected"' : '');?>>Wrong</value>
                        <option value="correct" <?=($answer['status'] == 'correct' ? 'selected="selected"' : '');?>>Correct</value>
                    </select>
                </td>
                <td>
                    <input  class="jr" type="text" name="answer[text][]" value="<?=$answer['text'];?>" />
                    <input type="hidden" name="answer[id][]" value="<?=$answer['id'];?>" />
                </td>
            </tr>
            <? endforeach;?>
        </tbody>
    </table>
    <input type="hidden" name="question[id]" value="<?=$question['id'];?>" />
    <input type="submit" name="submit" value="Submit" />
</form>