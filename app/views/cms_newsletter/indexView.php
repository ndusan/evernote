<? if (!empty($participantCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="newslettersTable"> 
        <thead> 
            <tr> 
                <th>First name</th> 
                <th>Last name</th> 
                <th>Email</th> 
                <th>Created</th> 
                <th>Answers</th>
                <th>Location</th>
                <th>IP</th>
                <th style="width: 400px;">Client</th>
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($participantCollection as $participant): ?>
                <tr> 
                    <td><?= $participant['firstname']; ?></td> 
                    <td><?= $participant['lastname']; ?></td> 
                    <td><?= $participant['email']; ?></td> 
                    <td><?= $participant['created']; ?></td> 
                    <td><?= $participant['correct_amount']; ?>/10</td> 
                    <td><?= $participant['location']; ?></td>
                    <td><?= $participant['ip']; ?></td> 
                    <td><?= $participant['agent']; ?></td> 
                </tr> 
            <? endforeach; ?>
        </tbody> 
        <tfoot> 
            <tr> 
                <th>First name</th> 
                <th>Last name</th> 
                <th>Email</th> 
                <th>Created</th> 
                <th>Answers</th>
                <th>Location</th>
                <th>IP</th>
                <th>Client</th> 
            </tr> 
        </tfoot>
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif;?>
	
