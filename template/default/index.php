<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Note Manager</title>


<!--  JQuery, JQuery UI, TinyMCE and Selectize files -->
<script src="www/jquery/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="www/jquery/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="www/jquery/jquery-ui-1.10.4.custom/css/humanity/jquery-ui-1.10.4.custom.css" />
<script type="text/javascript" src="www/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="www/selectize/dist/js/standalone/selectize.min.js"></script>
<link rel="stylesheet" type="text/css" href="www/selectize/dist/css/selectize.css" />
<link rel="stylesheet" type="text/css" href="www/selectize/dist/css/selectize.default.css" />

<!-- Custom css file -->
<link rel="stylesheet" type="text/css" href="template/default/notemanager.css" />


</head>

<body>
    <div class="templatediv">       
        <h1>Note Manager</h1>
        
        <a href="index.php">Games</a>
        
        <?php if (SomeFactory::getUser()->getUserrole() === 'guest'): ?>
        <a href="index.php?app=users&view=login">Log in</a>
        <?php else: ?>
        <a href="index.php?app=users&view=account"><?php echo SomeFactory::getUser()->getUsername(); ?></a>
        <a href="index.php?app=users&view=logout">Log out</a>
        <?php endif; ?>
    </div>
    
    <br />

    <div class="templatediv">
    
        <some:content />
	
    </div>
	
    
    <br />
    
    <div class="templatediv">
        <span class="footer">(C) Aarne Uotila 2014</span>
    </div>
    
    
    
    
    
</body>
</html>