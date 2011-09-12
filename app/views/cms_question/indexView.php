<a href="/cms/question/add" >Add new question</a>

<? if(!empty($questionCollection)): ?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="questionsTable"> 
    <thead> 
        <tr> 
            <th>Title</th> 
            <th>Level</th> 
            <th>Rating</th> 
            <th>Created</th> 
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <? foreach($questionCollection as $question):?>
        <tr> 
            <td><?=$question['title'];?></td> 
            <td><?=$question['name'];?></td>
            <td><?=$question['rating'];?></td>
            <td><?=$question['created']?></td> 
            <td>
                <!--Edit-->
                <a href="/cms/question/edit/<?=$question['id']; ?>">Edit</a>
                <!--Edit-->
                <? $status = array ('0' => 'Inactive', '1' => 'Active');?>
                <a href="/cms/question/status/<?=$question['id']; ?>"><?=$status[1-$question['status']];?></a>
                <!--Delete-->
                <a href="/cms/question/delete/<?=$question['id']; ?>">Delete</a>
            </td> 
        </tr> 
        <? endforeach;?>
    </tbody> 
</table> 
<? else: ?>
<div class="noResults">
    There are no results on this page.
</div>
<? endif; ?>

