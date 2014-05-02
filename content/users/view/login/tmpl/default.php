
<!-- A message pops up when logging out -->
<?php if (property_exists($this, 'notification')): ?>
<div class="notification">
    Logged out!
</div>
<?php endif; ?>



<h2>Log in</h2>

<form name="loginform" action="index.php?app=users&view=login" method="post">
    <table class="note_editor">
        <tr>
            <td>User name:</td>
            <td><input class="field" type="text" name="username" /></td>
        </tr>
        
        <tr>
            <td>Password:</td>
            <td><input class="field" type="password" name="password" /></td>
        </tr>
        
        <tr>
            <td colspan="2"><input class="submit" type="submit" value="Log in" /></td>
            
        </tr>
        
    </table>
    
    <br />
    Don't have an account yet? <a href='index.php?app=users&view=createaccount'>Create one.</a>
    
    
</form>