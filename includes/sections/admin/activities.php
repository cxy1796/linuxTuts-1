<div class="container" style="padding: 0 1em;">
	<h1>Existing Activities</h1>
	<P>Sorted by Name</p>
	<a href="#new">Add a new activity</a>
	<table class="admin">
		<thead>
			<tr>
				<td>ID</td>
				<td>Webname</td>
				<td>Name</td>
				<td>Difficulty</td>
				<td>Content</td>
				<td>Created</td>
			</tr>
		</thead>
	<?php
		$contentLengthMax = 20; // Truncate content in table to this number of characters, followed by ... if greater
		
		// Commence super fast, uber safe bound PDO queries!
		// Hooray! No mysql_query nonsense here! :)
		$db = $this->getDBHandler();
		$query = $db->prepare("SELECT id, webname, name, difficulty, length(content) contentLength, substring(`content`, 1, :contentLengthMax) content, created FROM activities ORDER BY name");
		$query->bindParam(':contentLengthMax', $contentLengthMax);
		$query->execute();
		$lessons = $query->fetchAll(PDO::FETCH_ASSOC);
		foreach($lessons as $lesson) {
			$ellipsis = $lesson['contentLength'] > $contentLengthMax ? '...' : '';
			echo '<tr>
			<td>'.$lesson['id'].'</td>
			<td>'.$lesson['webname'].'</td>
			<td>'.$lesson['name'].'</td>
			<td>'.$lesson['difficulty'].'</td>
			<td>'.$lesson['content'] . $ellipsis . '</td>
			<td>'.$lesson['created'].'</td>
			</tr>';
		}
	?>
	</table>

	<a name="new"></a>
	<form class="adminForm" action="<?php echo $this->getRootURL(); ?>admin_backend/activityAdd.php" method="post" accept-charset="utf-8" name="addActivity">
		<h3>Add New Activity</h3>
		<p>Please enter data carefully, because the database is immutable for now (add and read only, no edits/deletes)</p>
		<label for="webname">
			Webname
			<span>(Short version of name, no spaces or special chars)</span>
		</label>
		<input type="text" name="webname"/>
		<label for="name">
			Name
			<span>Full name</span>
		</label>
		<input type="text" name="name"/>
		<label for="difficulty">
			Difficulty
			<span>Integer 1-5</span>
		</label>
		<input type="text" name="difficulty"/>
		<label for="content">
			Content
			<span>The content! No need to include navigation.</span>
			<span>HTML is allowed. Surround command names in *** like ***pwd*** to make it auto-link to a command page.</span>
			<span>H3 tags will be automatically scraped for the page-level table of contents.</span>
		</label>
		<textarea name="content" rows="30"></textarea>
		<input type="submit" name="submit"/>
	</form>
</div>