<div class="quizWrapper">
    <div class="quizTop">
        <img alt="monograms" title="Monograms - Independent Travel"src="../public/images/monograms.png" />
    </div>
    <div class="quizSteps">
        <div class="stepsContent">
            <div class="stepCounter">
                Question <span>1</span> of 10
            </div>
            <form action="/quiz" method="post">
                <ul class="answers">
                    <li>
                        <input id="choice_1" type="radio" name="choice" value="1" />
                        <label for="choice_1">Goulash</label>
                    </li>
                    <li>
                        <input id="choice_2" type="radio" name="choice" value="2" />
                        <label for="choice_2">Pizza</label>
                    </li>
                    <li>
                        <input id="choice_3" type="radio" name="choice" value="3" />
                        <label for="choice_3">Smoked salmon</label>
                    </li>
                </ul>
                <!-- security information -->
                <input type="hidden" name="token" value="<?= $token; ?>" />
                <input type="hidden" name="page" value="<?= $page; ?>" />

                <input class="trigger" type="submit" name="submit" value="Next&raquo;" />
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