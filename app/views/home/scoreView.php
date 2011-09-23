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
                            <?
                            $fbArray = array('app_id'=>'173565499389909', 
                                             'link'=>'http://www.visiteurope.com/Peek',
                                             'picture'=>BASE_PATH.'public/images/logoVisiteurope.png', 
                                             'name'=>'Visit Europe Quiz',
                                             'caption'=>'I just got '.$result['sum'].'/10. Can you beat my score?', 
                                             'description'=>'Click http://visiteurope.lastexitlondon.com/peek to play the quiz and be in a chance to WIN a trip to Europe',
                                             'message'=>'WIN a trip to Europe', 
                                             'redirect_uri'=>'http://www.visiteurope.com/Peek');
                            ?>
                            </script>
                            <a href="http://www.facebook.com/dialog/feed?<?=http_build_query($fbArray);?>" class="fb" target="_blank"></a>
                            <script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
                            <a href="https://twitter.com/share" class="tw"></a>
                        </td>
                    </tr>
                </table>
                <a href="<?= BASE_PATH; ?>" class="trigger">try again</a>
            </div>
        </div>
    </div>
