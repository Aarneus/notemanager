<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Note Manager</title>

<!-- TODO: replace with own code -->

<!--  jquery, jquery ui and ui css files -->
<script src="www/jquery/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="www/jquery/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="www/jquery/jquery-ui-1.10.4.custom/css/humanity/jquery-ui-1.10.4.custom.css" />
<script type="text/javascript" src="www/tinymce/js/tinymce/tinymce.min.js"></script>


<style type="text/css"> 
    
    
    
    body {
        font-family: Tahoma;
        background-color: #130c05;
        background-image: url(./template/default/leather.png);
    }
    
    a {
        color: #c11;
        text-decoration: none;
        font-weight: bold;
        font-style: normal;
    }
    
    
    h2 {
        margin-left: 6%;
        margin-bottom: 2px;
    }
    
    
    input {
        width: 100%;
    }
    
    table {
        border: 0px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        position: relative;
    }
    
    table.note_editor {
        width: 60%;
    }
    
    .panel {
        width: 50%;
        padding: 10px;
        vertical-align: top;
        border-width: 4px;
        border-image: url(./template/default/borders.png) 6 repeat;
    }
    
    .templatediv {
        padding: 6px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        width: 70%;
        vertical-align: central;
        background-color: #e3d09d;
        background-image: url(./template/default/paper.png);
    }
    
    .notification {
        color: #000;
        padding: 5px;
        background-color: rgba(255, 186, 0, 0.4);
        font-weight: bold;
    }
    
    .tags {
        font-size: 80%;
        font-style: italic;
    }
    
    .ui-accordion {
        font-family: Tahoma;
    }
    
    .ui-accordion-header {
        border-width: 3px;
        background-image: url(./template/default/paper.png);
        border-image: url(./template/default/borders.png) 6 stretch;
    }
    
    .ui-accordion-content {
        border: 1px solid #da6;
        background-image: url(./template/default/paper.png);
    }
    
    .field {
        width: 100%;
    }
    
    .submit {
        width: 100%;
        height: 32px;
    }
    
    .icon {
        border: 0px;
        width: 24px;
        height: 24px;
        margin-left: 2px;
        float: right;
    }
    
    .note_image {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    
    .thumbnail {
        display: block;
        float: top;
        float: right;
        margin-left: 6px;
        
    }
    
    .backlink {
        margin-left: 7%;
        margin-top: 2px;
        margin-bottom: 12px;
    }
    
    
    
</style>



</head>

<body>
    <div class="templatediv">       
        <h1>Note Manager</h1>
        
        <a href="index.php">Games</a>
        <a href="index.php?app=users">Log in</a>
    </div>
    
    <br />

    <div class="templatediv">
    
        <some:content />
	
    </div>
	
    
    <br />
    
    <div class="templatediv">
        <span class="tags">(C) Aarne Uotila 2014</span>
    </div>
    
    
    
    
    
</body>
</html>