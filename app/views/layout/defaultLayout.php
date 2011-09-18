<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <?= @$html->assetsJs('jquery-1.6.3.min'); ?>
        <?= @$html->assetsJs('app'); ?>
        <?= @$html->customJs(); ?>
        <?= @$html->css('default'); ?>
        <?= @$html->customCss($this->_css); ?>
        <link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <!-- This is a content that will be included on page inside of this layout -->
        
        <div class="quizWrapper">
            <div class="quizTop">
                <a target="_blank" href="http://www.monograms.com"><img alt="monograms" title="Monograms - Independent Travel"src="../public/images/monograms.png" /></a>
            </div> 
            <div id="jquiz">
            <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
            </div>
            <div class="quizBottom">
                <a target="_blank" href="http://www.visiteurope.com"><img alt="visit europe" title="visit europe" src="../public/images/logoVisiteurope.png" /></a>
                <a target="_blank" href="http://www.evernote.com"><img alt="evernote" title="evernote" src="../public/images/logoEvernote.png" /></a>
                <a class="pin" target="_blank" href="http://itunes.apple.com/us/app/evernote-peek/id442151267?mt=8"><img alt="evernote" title="evernote" src="../public/images/pin-and-paper.png" /></a>
            </div>
        </div>
        <div id="jquiz_loader"></div>
    </body>
</html>