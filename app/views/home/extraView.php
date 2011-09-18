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
                            <form action="<?= BASE_PATH; ?>quiz/form" method="post">
                                <span class="bonusInput">
                                    <input type="text" id="open_choice" class="r" name="open_choice" />
                                </span>

                                <!-- security information -->
                                <input type="hidden" name="token" value="<?= $token; ?>" />
                                <input type="hidden" name="page" value="<?= $page; ?>" />
                                <input type="hidden" name="q_id" value="<?= $question['id']; ?>" />
                                <input class="trigger" type="submit" name="submit" value="submit&raquo;" />
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="notificator" id="c1" style="display: none;">
                Please provide all requested info above.
            </div>
        </div>
    </div>