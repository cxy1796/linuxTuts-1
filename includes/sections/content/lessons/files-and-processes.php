<div class="container narrow">
	<h2>Files and Processes</h2>
	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>
	<h3>Lesson 2</h3>

	<div class="legible">
		<p>
			In UNIX, everything is either a file or a process. A file is a destination for or a source of a stream of data. Thus a printer, for example, is a file and so is the screen. A file can also be considered simply as a collection of data that can be referred to by name. 
		</p>
		<p>
		Example of files include:
		<ul>
			<li>a text document;</li>
			<li>the text of a program written in some high-level programming language; </li>
			<li>a jpeg;</li>
		</ul>
		</p>
		<p>
		A process is a program that is currently running. So a process may be associated with a file. The file stores the instructions that are executed for that process to run.
		</p>

		<h3>The Standard Input and Output and the Standard Error Stream</h3>
		<p>
			There two files that have somewhat opaque names, stdin and stdout. These names refer to default sources of and destinations for data. Consider the process initiated by the command ls. The default output of this process is a list of files in the current working directory and we have seen that the output is displayed on screen. This illustrates the default output stdout which is nothing but the screen. The standard input by contrast is the keyboard - thus also known as stdin.
		</p>
		<p>
			In shell programming it is often useful to prevent error messages from Unix commands from being displayed on screen but to either suppress them or send them to a file. This is done by redirecting the error messages to a filename or to /dev/null - the null device or destination. To use these streams (stdin, stdout, stderr) in the shell we don't refer to them by name but by the numerical descriptors:
		</p>
			<table>
			<tr>
				<td>Stream Name</td>
				<td>Descriptor</td>
			</tr>
			<tr>
				<td>stdin</td>
				<td>0</td>
			</tr>
			<tr>
				<td>stdout</td>
				<td>1</td>
			</tr>
			<tr>
				<td>stderr</td>
				<td>2</td>
			</tr>
		</table>
		<p>
			For the beginning user, the important thing to grasp is that commands effectively take their input from and direct their output to files, and by default the output file is the screen and the input file is the keyboard.
		</p>
	</div>
	<div class="sideNav">
		<h2>Lesson Plan</h2>
		<ul>
			<li><a href="#summary">Summary</a></li>
			<li><a href="#results">Standard Input/Output &amp; Error Stream</a></li>
			<li><a href="#results">Quiz</a></li>
		</ul>
	</div>

	<nav class="sequence breadcrumbs" style="clear: both;">
		<ul>
			<a href="<?php echo $this->getRootURL(); ?>/lessons/what-is-unix/"><li>Previous Lesson</li></a>
			<a href="#"><li>Next Lesson</li></a>
		</ul>
	</nav>

	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>

</div>