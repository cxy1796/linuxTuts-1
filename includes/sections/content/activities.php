<div class="container narrow">
	<h2>Applied Activities</h2>
	<div class="legible">
		<img style="float:left; margin:25px;" src="<?php echo $this->getRootURL(); ?>/static/images/icons/icon_21457.svg" alt="Activities"/>
		<p>
			These activities are not in any particular order. They will help you learn
			via achieving specific applied tasks and exercises. This is a good place to be
			if you already have a handle on the basics, and you want to learn how to do
			something hands&dash;on and useful.
		</p>
		<ul style="clear: left;">
			<?php
			// Commence super fast, uber safe bound PDO queries!
			// Hooray! No mysql_query nonsense here! :)
			$db = $this->getDBHandler();
			$query = $db->prepare("SELECT id, webname, name, difficulty FROM activities ORDER BY difficulty");
			$query->execute();
			$activities = $query->fetchAll(PDO::FETCH_ASSOC);

			foreach($activities as &$activity) {
				echo '<li>
					<a href="'.$this->getRootURL().'activities/'.$activity['webname'].'/">'.$activity['name'].'</a>
					<span class="diff">Difficulty: '.$activity['difficulty'].'</span>
				</li>';
			}
			?>
			<li><a href="./changing-permissions/">Changing Permissions</a></li>
			<li><a href="#">Creating an Apache Server</li>
			<li><a href="#">Virtualize an Operating System</li>
			<li><a href="#">Developing a Program in C</li>
			<li><a href="#">Testing Your RAM Integrity</li>
			<li><a href="#">Managing Applets</li>
			<li><a href="#">Changing Themes</li>
			<li><a href="#">Creating Your Own Cloud Server</li>
		</ul>
	</div>
</div>