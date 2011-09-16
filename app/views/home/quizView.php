
<div class="quizWrapper">
    <div class="quizTop">
        main logo
    </div>
    <div class="quizStart">
        <div class="quizSteps">
            <div class="stepCounter">
                Question <span>1</span> of 10
            </div>
            <form action="/quiz" type="post">
                <ul class="answers">
                    <li><input id="choice_1" type="radio" name="choice" value="1" />
                        <label for="choice_1">Answer 1</label></li>
                    <li> <input id="choice_2" type="radio" name="choice" value="2" />
                        <label for="choice_2">Answer 2</label></li>
                    <li><input id="choice_3" type="radio" name="choice" value="" />
                        <label for="choice_3">Answer 3</label></li>
                </ul>
                <!-- security information -->
                <input type="hidden" name="token" value="<?= $token; ?>" />
                <input type="hidden" name="page" value="<?= $page; ?>" />

                <input class="trigger" type="submit" name="submit" value="Next" />
            </form>
            <div class="question">
                What is the capital city of Zergbia?
            </div>
        </div>
    </div>
    <div class="quizBottom">
        2 logos
    </div>
</div>