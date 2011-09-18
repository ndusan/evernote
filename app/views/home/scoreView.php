<div class="quizWrapper">
    <div class="quizTop">
        <img alt="monograms" title="Monograms - Independent Travel"src="../public/images/monograms.png" />
    </div>
    <div class="quizEnd">
        <div class="endContent">
            <div class="stepCounter">
                share
            </div>
            <div class="contentTitle">
                Thanks!
            </div>
            <div class="question">
                Your information has been successfuly submited.<br/>
                Challenge your friends to beat your score by sharing your result on:
            </div>
            <div class="paperContent">
                <table class="paperTable" cellspacing="0" cellpading="0">
                    <tr>
                        <td>
                            <div class="scoreShare">Your score:<br/><span><?= $result['sum']; ?>/10</span></div>
                        </td>
                        <td>
                            <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                            <a href="http://www.facebook.com/sharer.php?u=<?=BASE_PATH;?>&t=Evernote quiz" class="fb" target="_blank"></a>
                            <a href="https://twitter.com/share" class="tw"></a>
                        </td>
                    </tr>
                </table>
                <a href="<?= BASE_PATH; ?>" class="trigger">try again</a>
            </div>

        </div>
    </div>
    <div class="quizBottom">
        <img alt="visit europe" title="visit europe" src="../public/images/logoVisiteurope.png" />
        <img alt="evernote" title="evernote" src="../public/images/logoEvernote.png" />
        <a class="pin" href="http://itunes.apple.com/us/app/evernote-peek/id442151267?mt=8"><img alt="evernote" title="evernote" src="../public/images/pin-and-paper.png" /></a>
    </div>
</div>
