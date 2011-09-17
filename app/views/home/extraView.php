<form action="/extra" method="post">
    
    <textares id="open_choice" name="open_choice"></textarea>
    <label for="open_choice">Answer</label>

    <!-- security information -->
    <input type="hidden" name="token" value="<?= $token; ?>" />
    <input type="hidden" name="page" value="<?= $page; ?>" />
    
    <input class="trigger" type="submit" name="submit" value="Next&raquo;" />
</form>

<div class="question">
    <?=$question['text'];?>
</div>
        