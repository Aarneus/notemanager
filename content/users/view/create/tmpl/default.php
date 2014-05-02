
<!-- A message pops up when created successfully -->
<?php if (property_exists($this, 'notification')): ?>
<div class="notification">
    Account created!
    
</div>
<?php endif; ?>

<h2>Create a new account</h2>


<form name="accountform" action="index.php?app=users&view=createaccount" method="post">
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
            <td>Email:</td>
            <td><input class="field" type="text" name="email" /></td>
        </tr>
        
        <tr>
            <td>Homepage:</td>
            <td><input class="field" type="text" name="homepage" /></td>
        </tr>
        
        <tr>
            <td colspan="2"><input class="submit" type="submit" value="Create" /></td>
            
        </tr>
        
    </table>
    
    
    
</form>