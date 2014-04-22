<div class="container narrow">
	<h2>Changing Permissions</h2>
	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>

	<div class="legible">

		<a name="summary"></a>
		<h3>Summary</h3>
		<p>Changing permissions for files is a very crucial skill in Linux.
			We wouldn’t want someone reading files that they shouldn’t have access to.
			This tutorial will cover how to change file permissions, and how to only let particular users access files.</p>


	<img src="<?php echo $this->getRootURL(); ?>/static/images/lessons/1-1/image00.gif" alt="ls"/>
	<img src="<?php echo $this->getRootURL(); ?>/static/images/lessons/1-1/image01.gif" alt="ls"/>

	<pre><code>% ls
core/ Documents/ mail/ Mail/</code></pre>

<pre><code>%ls -a 
./ Core/ Documents .login* mail/ .mailbox*
../ .cshrc* .hushlogin* .logout* Mail/
%</code></pre>

<pre><code>lrwxrwxrwx	1 root		root			9 Apr 18 02:03 dos -&gt; /root/dos
-rwxr-xr-x	1 root		root		       242  Apr 18 02:03 hello.c
</code></pre>

<pre><code>
lrwxrwxrwx	1 root		root		9	Apr 18 02:03 dos -&gt; /root/dos
-rw-r--r--	1 root		root		242	Apr 18 02:03 hello.c</code></pre>

<a name="results"></a>
<pre><code>lrwxrwxrwx	1 root		root		9	Apr 18 02:03 dos -&gt; /root/dos
-rwxr-xr-x	1 root		root		242	Apr 18 02:03 hello.c</code></pre>

	</div>
	<div class="sideNav">
		<h2>Sections</h2>
		<ul>
			<li><a href="#summary">Summary</a></li>
			<li><a href="#results">Results</a></li>
		</ul>
	</div>

	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>

</div>