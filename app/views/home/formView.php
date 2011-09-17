<form action="/form" method="post">
    
    <input id="firstname" type="text" name="firstname" value=""/>
    <label for="firstname">First name</label>
    
    <input id="lastname" type="text" name="lastname" value=""/>
    <label for="lastname">Last name</label>
    
    <input id="email" type="text" name="email" value=""/>
    <label for="email">Email</label>
    
    <select name="location" id="location">
        <option value="Serbia">Serbia</option>
        <option value="Sweden">Sweden</option>
    </select>
    <label for="location">Location</label>
    
    <input type="checkbox" name="tac" value="1" />
    <input type="checkbox" name="newsletters" value="1" checked="checked" />
    
    <!-- security information -->
    <input type="hidden" name="token" value="<?= $token; ?>" />
    <input class="trigger" type="submit" name="submit" value="Submit&raquo;" />
</form>
            