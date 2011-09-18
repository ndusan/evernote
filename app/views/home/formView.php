<div class="quizWrapper">
    <div class="quizTop">
        <img alt="monograms" title="Monograms - Independent Travel"src="../public/images/monograms.png" />
    </div>
    <div class="quizEnd">
        <div class="endContent">
            <div class="stepCounter">
                your details
            </div>
            <div class="contentTitle">
                Please fill in the form below
            </div>
            <div class="question">
                By submitting your information, you will be in a chance to WIN a trip to Europe.
            </div>
            <div class="paperContent">
                <table class="paperTable" cellspacing="0" cellpading="0">
                    <tr>
                        <td>
                            <form action="<?= BASE_PATH; ?>quiz/score" method="post">
                                <label for="firstname">First name</label>
                                <span class="input">
                                    <input id="firstname" class="r" type="text" name="participant[firstname]" value=""/>
                                </span>
                        </td>
                        <td>
                            <label for="location">Location</label>
                            <span class="input">
                                <select class="r" name="participant[location]" id="location">
                                    <option value="">Pick a state</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Canada (English)">Canada (English)</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Latin America">Latin America</option>
                                    <option value="USA">USA</option>
                                    <option value="Other">Other</option>
                                </select>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lastname">Last name</label>
                            <span class="input">
                                <input class="r" id="lastname" type="text" name="participant[lastname]" value=""/>
                            </span>
                        </td>
                        <td>
                            <input id="tac" type="checkbox" name="participant[tac]" value="1" /> I agree with <a href="http://visiteurope.lastexitlondon.com/Evernote-Peek-Campaign/Terms---Conditions">Terms & Conditions</a>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <label for="email">Email</label>
                            <span class="input">
                                <input class="r" id="email" type="text" name="participant[email]" value=""/>
                            </span>

                        </td>
                        <td>
                            <input type="checkbox" name="participant[newsletters]" value="1" checked="checked" /> I want to receive <a href="http://www.visiteurope.com">visiteurope.com</a> newsletter
                        </td>
                    </tr>

                </table>
                <!-- security information -->
                <input type="hidden" name="token" value="<?= $token; ?>" />
                <input class="trigger" type="submit" name="submit" value="submit&raquo;" />
                </form>
            </div>
            <div class="notificator" id="c1" style="display:none;">
                Please, provide personal info 
            </div>
            <div class="notificator" id="c2" style="display:none;">
                You need to accept Terms & Conditions  
            </div>
        </div>
    </div>
    <div class="quizBottom">
        <img alt="visit europe" title="visit europe" src="../public/images/logoVisiteurope.png" />
        <img alt="evernote" title="evernote" src="../public/images/logoEvernote.png" />
        <a class="pin" href="http://itunes.apple.com/us/app/evernote-peek/id442151267?mt=8"><img alt="evernote" title="evernote" src="../public/images/pin-and-paper.png" /></a>
    </div>
</div>
