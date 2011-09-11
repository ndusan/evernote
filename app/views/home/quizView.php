<form action="/quiz" type="post">
    <input id="choice_1" type="radio" name="choice" value="1" />
    <label for="choice_1">Answer 1</label>
    <input id="choice_2" type="radio" name="choice" value="2" />
    <label for="choice_2">Answer 2</label>
    <input id="choice_3" type="radio" name="choice" value="" />
    <label for="choice_3">Answer 3</label>

    <!-- security information -->
    <input type="hidden" name="token" value="<?=$token;?>" />
    <input type="hidden" name="page" value="<?=$page;?>" />

    <input type="submit" name="submit" value="Next" />
</form>