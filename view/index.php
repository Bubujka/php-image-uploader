<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-ru" xml:lang="ru-ru">
<head>
    <title><?php echo $title;?></title>
    <link href="/public/css/style.css" rel="stylesheet" type="text/css" media="screen, projection" />
    <SCRIPT LANGUAGE="JavaScript">
    <!--
    //http://www.webreference.com/js/tips/991125.html
    function highlight(field) {
      field.focus();
      field.select();
    }
    // -->
    </SCRIPT>
</head>
<body>
<div id='content'>
    <div id='wrapper'>
        <h1>Simple image hosting</h1>
        <?php echo $content;?>
    </div>

    <a href='http://bubujka.ru'><img id='bu_logo' src='/public/bu_logo.png'></a>
</div>
</body>
</html>
