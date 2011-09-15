<? if (!empty($participantCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="participantsTable"> 
        <thead> 
            <tr> 
                <th>First name</th> 
                <th>Last name</th> 
                <th>Email</th> 
                <th>Created</th> 
                <th>Answers</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($participantCollection as $participant): ?>
                <tr> 
                    <td><?= $participant['firstname']; ?></td> 
                    <td><?= $participant['lastname']; ?></td> 
                    <td><?= $participant['email']; ?></td> 
                    <td><?= $participant['created']; ?></td> 
                    <td><?= $participant['correct_answers']; ?>/10</td> 
                </tr> 
            <? endforeach; ?>
        </tbody> 
        <tfoot> 
            <tr> 
                <th>First name</th> 
                <th>Last name</th> 
                <th>Email</th 
                <th>Created</th> 
                <th>Answers</th> 
            </tr> 
        </tfoot>
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
	
