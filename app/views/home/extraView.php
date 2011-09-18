



<div class="quizWrapper">
    <div class="quizTop">
        <img alt="monograms" title="Monograms - Independent Travel"src="../public/images/monograms.png" />
    </div>
    <div class="quizEnd">
        <div class="endContent">
            <div class="stepCounter">
                bonus question
            </div>
            <div class="contentTitle">
                We have one more question for you
            </div>
            <div class="question">
                <?= $question['text']; ?>
            </div>
            <div class="paperContent">
                <table class="paperTable" cellspacing="0" cellpading="0">
                    <tr>
                        <td>
                            <form action="/extra" method="post">
                                <span class="bonusInput">
                                <input type="text" id="open_choice" name="open_choice" />
                                </span>

                                <!-- security information -->
                                <input type="hidden" name="token" value="<?= $token; ?>" />
                                <input type="hidden" name="page" value="<?= $page; ?>" />

                                <input class="trigger" type="submit" name="submit" value="submit&raquo;" />
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="notificator">
                Please provide all requested info above.
            </div>
        </div>
    </div>
    <div class="quizBottom">
        2 logos
    </div>
</div>
