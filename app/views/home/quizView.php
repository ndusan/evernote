<div class="quizWrapper">
    <div class="quizTop">
        <img alt="monograms" title="Monograms - Independent Travel"src="../public/images/monograms.png" />
    </div>
    <? if (!empty($answers) && !empty($question)): ?>
        <div class="quizSteps">
            <div class="stepsContent">
                <div class="stepCounter">
                    Question <span><?= $page; ?></span> of 10
                </div>

                <form action="/quiz" method="post">
                    <ul class="answers">
                        <? foreach ($answers as $answer): ?>
                            <li>
                                <input id="choice_<?= $answer['id']; ?>" type="radio" name="choice" value="<?= $answer['id']; ?>" />
                                <label for="choice_<?= $answer['id']; ?>"><?= $answer['text']; ?></label>
                            </li>
                        <? endforeach; ?>
                    </ul>
                    <!-- security information -->
                    <input type="hidden" name="token" value="<?= $token; ?>" />
                    <input type="hidden" name="page" value="<?= $page; ?>" />
                    <input type="hidden" name="q_id" value="<?= $question['id']; ?>" />
                    <input class="trigger" type="submit" name="submit" value="Next&raquo;" />
                    <div class="notificator">
                        please pick one answer
                    </div>
                </form>
                <div class="question">
                    <?= $question['text']; ?>
                </div>
            </div>
        <? else: ?>

            <div class="noContent">Sorry, no quiz for you at this time. Come back soon.</div>

        <? endif; ?>
        <div class="quizBottom">
            2 logos
        </div>
    </div>