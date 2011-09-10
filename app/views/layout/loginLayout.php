<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <link rel="shortcut icon" href="<?php echo IMAGE_PATH.'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        
        <!-- Include jQuery -->
        <?php echo $html->js('jquery-1.4.2.min'); ?>
        <!-- Default css file -->
        <?php echo $html->css('default'); ?>
        
        <!-- Default js file -->
        <?php echo $html->js('default'); ?>

        <?php
        //Custom calls for css
        echo $html->customCss($this->_css);
        //Custom calls for js
        echo $html->customJs($this->_js);
        ?>
    </head>
    <body>
        <!-- This is a content that will be included on page inside of this layout -->
        <?php if(file_exists(VIEW_PATH.$this->_controller.DS.$this->_action.'View.php')) include (VIEW_PATH.$this->_controller.DS.$this->_action.'View.php'); ?>
    </body>
</html>