<div class="container" style="padding: 1em;">
	<h2>Command Reference</h2>
	<table id="commands">
		<thead>
	        <tr>
	            <th>Command Name</th>
	            <th>Description</th>
	            <th>Type</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php
	    		$types = array('Executable','Builtin','Shell Function','Alias');
	    		for($i=1; $i < 37; $i++) {
					echo '<tr>
						<td>Command Name '. $i .'</td>
						<td>Info</td>
						<td>' . $types[array_rand($types)].'</td>
					</tr>';
				}
				?>
		</tbody>
	</table>
</div>
