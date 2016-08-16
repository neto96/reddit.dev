<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dice Roller</title>
</head>
<body>
<h1>The dice's roll was: <?php echo $randomDice; ?>!</h1>
<h1>Your guess was: <?php echo $guess; ?>!</h1>
<?php if ($randomDice == $guess) : ?>
<h2><?= 'Your guess was correct!!' ?></h2>
<?php else : ?>
	<h2><?= 'Your guess was WRONG!!!!!' ?></h2>
<?php endif ?>
</body>
</html>