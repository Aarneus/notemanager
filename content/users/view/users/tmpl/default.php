

<h2><?php echo SomeText::_('USERS'); ?></h2>

<?php if (is_array($this->users)): ?>
<?php foreach ($this->users as $user): ?>

<a href="index.php?app=users&view=account&id=<?php echo $user->id; ?>">
<?php echo $user->username; ?>
</a>
<br />
<?php endforeach; ?>

<?php else: ?>
<?php echo SomeText::_('NONE'); ?>
<?php endif; ?>




