<form action="/cms/user/<?=$user['formAction']; ?>" method="post">
    <table >
        <tbody>
            <tr>
                <th>First name</th>
                <td>
                    <input class="jr" type="text" name="user[firstname]" value="<?=$user['firstname']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Last name</th>
                <td>
                    <input class="jr" type="text" name="user[lastname]" value="<?=$user['lastname']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <?if($this->_action == 'edit'):?>
                    <strong><?=$user['email']; ?></strong>
                    <input type="hidden" name="user[email]" value="<?=$user['email']; ?>" />
                    <? else:?>
                    <input class="jr email" type="text" name="user[email]" value=""/>
                    <?endif?>
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input <?=($this->_action == 'add' ? 'class="jr"' : '');?> type="text" name="user[password]" value="" />
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="user[id]" value="<?=$user['id'];?>" />
                    <input type="submit" value="Submit" name="submit" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>