<?php

require "config.php";

use App\Pets;

$Pets = Pets::list();
?>

<h1>Pets</h1>

<table border="1" cellpadding="5">
<?php foreach ($Pets as $pet): ?>
<tr>
<td><?php echo $pet->getId(); ?></td>
<td><?php echo $pet->getName(); ?></td>
<td><?php echo $pet->getGender(); ?></td>
<td><?php echo $pet->getBirthdate(); ?></td>
<td><?php echo $pet->getOwner(); ?></td>
<td><?php echo $pet->getEmail(); ?></td>
<td><?php echo $pet->getAddress(); ?></td>
<td><?php echo $pet->getContact(); ?></td>
<td>
	<a href="edit-student.php?id=<?php echo $pet->getId(); ?>">EDIT</a>
</td>
<td>
	<a href="delete-student.php?id=<?php echo $pet->getId(); ?>">DELETE</a>
</td>
</tr>
<?php endforeach ?>
</table>