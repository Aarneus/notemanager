<script type="text/javascript" src="www/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
            
    ],

    toolbar1: "bold italic underline strikethrough",
    
    menubar: false,
    toolbar_items_size: 'small'

    
});
</script>

<form method="post" action="index.php?app=tinymce&view=posted">
    <textarea name="content" style="width:100%"></textarea>
    <br />
    <input type="submit" value="SEND" />
</form>