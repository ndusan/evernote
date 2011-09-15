<div class="addContent">

    <form action="/cms/user/<?= $user['formAction']; ?>" method="post">
        <table cellpadding="0" cellspacing="0" width="100%">

            <tr><td><h3>Add user :</h3>
                    <table >
                        <tbody>
                            <tr>
                                <th>First name</th>
                                <td>
                                    <input type="text" name="user[firstname]" value="<?= $user['firstname']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>Last name</th>
                                <td>
                                    <input type="text" name="user[lastname]" value="<?= $user['lastname']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <input type="text" name="user[email]" value="<?= $user['email']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>
                                    <input type="text" name="user[password]" value="" />
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center">
                                    <input type="hidden" name="user[id]" value="<?= $user['id']; ?>" />
                                    <input type="submit" value="Submit" name="submit" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>
