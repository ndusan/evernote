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
                            <form action="/form" method="post">
                                <label for="firstname">First name</label>
                                <span class="input">
                                    <input id="firstname" type="text" name="firstname" value=""/>
                                </span>
                        </td>
                        <td>
                            <label for="location">Location</label>
                            <span class="input">
                                <select name="location" id="location">
                                    <option value="Serbia">Pick a state</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Sweden">Other</option>
                                </select>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lastname">Last name</label>
                            <span class="input">
                                <input id="lastname" type="text" name="lastname" value=""/>
                            </span>
                        </td>
                        <td>
                            <input type="checkbox" name="tac" value="1" /> I agree with <a href="#">Terms & Conditions</a>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <label for="email">Email</label>
                            <span class="input">
                                <input id="email" type="text" name="email" value=""/>
                            </span>

                        </td>
                        <td>
                            <input type="checkbox" name="newsletters" value="1" checked="checked" /> I want to receive <a href="#">visiteurope.com</a> newsletter
                        </td>
                    </tr>

                </table>
                <!-- security information -->
                <input type="hidden" name="token" value="<?= $token; ?>" />
                <input class="trigger" type="submit" name="submit" value="submit&raquo;" />
                </form>
            </div>
            <div class="notificator">
                You need to accept Terms & Conditions  
            </div>
        </div>
    </div>
    <div class="quizBottom">
        2 logos
    </div>
</div>
