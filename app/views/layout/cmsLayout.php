<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <link rel="shortcut icon" href="<?php echo IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />

        <?= $html->assetsJs('jquery-1.6.3.min'); ?>
        <?= $html->assetsJs('jquery.dataTables.min'); ?>
        <?= $html->assetsJs('app'); ?>
        <?= $html->customJs(); ?>
        <?= $html->assetsCss('demo_table'); ?>
        <?= $html->css('default'); ?>
        <?= $html->customCss($this->_css); ?>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <ul class="cmsMenu">
            <li>
                <a href="/logout">Logout</a>
            </li>
            <li>
                <a href="/cms/users">Users</a>
            </li>
            <li>
                <a href="/cms/user/add">Add new user</a>
            </li>
            <li>
                <a href="/cms/questions">Questions</a>
            </li>
            <li>
                <a href="/cms/question/add">Add new question</a>
            </li>
            <li>
                <a href="/cms">Participants</a>
            </li>

        </ul>
        <div class="cmsContent">
            <!-- This is a content that will be included on page inside of this layout -->
            <?php if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
        </div>
    </body>
</html>