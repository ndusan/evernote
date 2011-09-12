<div class="login">
    <form action="/login" method="post">
        <table cellpadding="0" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th colspan="3"><h2>Evernote Quiz Admin</h2></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="login_email">Email:</label>
                    </td>
                    <td>
                        <input id="login_email" type="text" name="login[email]" value="" />
                    </td>
                    <td>
                        <span>
                            Required
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="login_password">Password:</label>
                    </td>
                    <td>
                        <input id="login_password" type="password" name="login[password]" value="" />
                    </td>
                    <td>
                        <span>
                            Required
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input id="login_submit" type="submit" name="login[submit]" value="Login" />
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
    </form>
</div>