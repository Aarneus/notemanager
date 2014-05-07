

<h2>Users</h2>

<?php foreach ($this->users as $user): ?>

<a href="index.php?app=users&view=account&id=<?php echo $user->id; ?>">
<?php echo $user->username; ?>
</a>
<br />
<?php endforeach; ?>





