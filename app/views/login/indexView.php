<form action="/login" method="post">
    <table>
        <thead>
            <tr>
                <th colspan="3">Login page</th>
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
                <td></td>
                <td>
                    <input id="login_submit" type="submit" name="login[submit]" value="Login" />
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</form>