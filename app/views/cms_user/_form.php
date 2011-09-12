<form action="/cms/user/<?=$user['formAction']; ?>" method="post">
    <table >
        <tbody>
            <tr>
                <th>First name</th>
                <td>
                    <input type="text" name="user[firstname]" value="<?=$user['firstname']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Last name</th>
                <td>
                    <input type="text" name="user[lastname]" value="<?=$user['lastname']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <input type="text" name="user[email]" value="<?=$user['email']; ?>" />
                </td>
            </tr>
            <tr>
                <th>Password</th>
                <td>
                    <input type="text" name="user[password]" value="" />
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