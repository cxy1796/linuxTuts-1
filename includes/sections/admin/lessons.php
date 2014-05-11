<div class="container" style="padding: 0 1em;">
	<h1>Existing Lessons</h1>
	<table class="admin">
		<thead>
			<tr>
				<td>ID</td>
				<td>Webname</td>
				<td>Name</td>
				<td>Section</td>
				<td>Order</td>
				<td>Content</td>
				<td>Created</td>
			</tr>
		</thead>
	<?php
		$db = $this->getDBHandler();
		$query = $db->prepare("select * from lessons");
		$query->execute();
		$lessons = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($lessons as $lesson) {
			echo '<tr>
			<td>'.$lesson['id'].'</td>
			<td>'.$lesson['webname'].'</td>
			<td>'.$lesson['name'].'</td>
			<td>'.$lesson['section'].'</td>
			<td>'.$lesson['order'].'</td>
			<td>'.$lesson['content'].'</td>
			<td>'.$lesson['created'].'</td>
			</tr>';
		}
	?>
	</table>
</div>