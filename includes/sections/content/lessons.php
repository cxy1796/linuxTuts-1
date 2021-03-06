<div class="container narrow">
	<h2>Lessons</h2>

	<div class="legible">
		<img style="float:left; margin:25px;" src="<?php echo $this->getRootURL(); ?>/static/images/icons/icon_31952.svg" alt="Lessons"/>
		<p>
			These lessons will get you started with Unix/Linux. This is the place to learn the basics.
			Each leson is sequential and builds on the previous.
		</p>

		These are coming from the DB:
		<ol style="clear:left;">
			<?php
			// Commence super fast, uber safe bound PDO queries!
			// Hooray! No mysql_query nonsense here! :)
			$db = $this->getDBHandler();
			$query = $db->prepare("SELECT id, webname, name, section, `order` FROM lessons ORDER BY section, `order`");
			$query->execute();
			$lessons = $query->fetchAll(PDO::FETCH_ASSOC);
			$lastSection = null;

			foreach($lessons as &$lesson) {

				// Start a new 'section' heading if this item's section is different than the previous items'
				if(!isset($lastSection) OR $lastSection !== $lesson['section']) {
				
					// End the previous ol if this is not the first section
					if(isset($lastSection)){
						echo '</ol>';
					}

					// Start the new section
					echo "<ol class=\"section\"><h3>Section " . $lesson['section'] . "</h3>\n";
				}

				// Output the lesson li as normal.
				echo '<li><a href="'.$this->getRootURL().'lessons/'.$lesson['webname'].'/">'.$lesson['name'].'</a></li>';
				$lastSection = $lesson['section'];
			}
			?>
		</ol>

		<br/><br/><br/><br/>
 		These are static HTML--- just for reference. Will be deleted later.
		<ol id="lessonList"style="clear:left;">
			<li><a href="<?php echo $this->getRootURL(); ?>lessons/what-is-unix/">What is UNIX?</li>
			<li><a href="<?php echo $this->getRootURL(); ?>lessons/files-and-processes/">Files and processes</li>
			<li><a href="#">The Directory Structure</li>
			<li><a href="#">Starting an UNIX terminal</li>
			<li><a href="#">Listing files and directories</li>
			<li><a href="#">Making Directories</li>
			<li><a href="#">Changing to a different Directory</li>
			<li><a href="#">The directories . and ..</li>
			<li><a href="#">Pathnames</li>
			<li><a href="#">More about home directories and pathnames</li>
			<li><a href="#">Copying Files</li>
			<li><a href="#">Moving Files</li>
			<li><a href="#">Removing Files and directories</li>
			<li><a href="#">Displaying the contents of a file on the screen</li>
			<li><a href="#">Searching the contents of a file</li>
			<li><a href="#">Redirection</li>
			<li><a href="#">Redirecting the Output</li>
			<li><a href="#">Redirecting the Input</li>
			<li><a href="#">Pipes</li>
			<li><a href="#">Wildcards</li>
			<li><a href="#">Filename Conventions</li>
			<li><a href="#">Getting Help</li>
			<li><a href="#">File system security (access rights)</li>
			<li><a href="#">Changing access rights</li>
			<li><a href="#">Processes and Jobs</li>
			<li><a href="#">Listing suspended and background processes</li>
			<li><a href="#">Killing a process</li>
			<li><a href="#">Other Useful UNIX commands</li>
			<li><a href="#">Compiling UNIX software packages</li>
			<li><a href="#">Download source code</li>
			<li><a href="#">Extracting source code</li>
			<li><a href="#">Configuring and creating the Makefile</li>
			<li><a href="#">Building the package</li>
			<li><a href="#">Running the software</li>
			<li><a href="#">Stripping unnecessary code</li>
			<li><a href="#">UNIX variables</li>
			<li><a href="#">Environment variables</li>
			<li><a href="#">Shell variables</li>
			<li><a href="#">Using and setting variables</li>
		</ol>
	</div>
</div>



