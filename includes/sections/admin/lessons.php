<div class="container" style="padding: 0 1em;">
	<h1>Existing Lessons</h1>
	<P>Sorted by Section, Order in Section</p>
	<table class="admin">
		<thead>
			<tr>
				<td>ID</td>
				<td>Webname</td>
				<td>Name</td>
				<td>Section</td>
				<td>Order In Section</td>
				<td>Content</td>
				<td>Created</td>
			</tr>
		</thead>
	<?php
		$contentLengthMax = 20; // Truncate content in table to this number of characters, followed by ... if greater
		
		// Commence super fast, uber safe bound PDO queries!
		// Hooray! No mysql_query nonsense here! :)
		$db = $this->getDBHandler();
		$query = $db->prepare("SELECT id, webname, name, section, `order`, length(content) contentLength, substring(`content`, 1, :contentLengthMax) content, created FROM lessons ORDER BY section, `order`");
		$query->bindParam(':contentLengthMax', $contentLengthMax);
		$query->execute();
		$lessons = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($lessons as $lesson) {
			$ellipsis = $lesson['contentLength'] > $contentLengthMax ? '...' : '';
			echo '<tr>
			<td>'.$lesson['id'].'</td>
			<td>'.$lesson['webname'].'</td>
			<td>'.$lesson['name'].'</td>
			<td>'.$lesson['section'].'</td>
			<td>'.$lesson['order'].'</td>
			<td>'.$lesson['content'] . $ellipsis . '</td>
			<td>'.$lesson['created'].'</td>
			</tr>';
		}
	?>
	</table>

	<form action="/users/login" method="post" accept-charset="utf-8" 
</div>