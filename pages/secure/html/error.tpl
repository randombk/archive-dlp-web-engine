{{block name="title" prepend}}{{"Info"}}{{/block}}
{{block name="content"}}
<hr class="featurette-divider">
<div class="featurette">
	<img class="featurette-image pull-left" alt="" src="resources/images/error.png">
	{{if $mes eq 'Requested Page not Found'}}
		<h2 class="featurette-heading">Error</h2>
		<p class="lead">The page you are trying to access <em class="muted">Does Not Exist</em>.</p>
	{{else}}
		<h2 class="featurette-heading">{{$mes}}</h2>
	{{/if}}
	<p class="lead">Please <a href="javascript:window.history.back()">return to the previous page</a>, or 
		<a href="/">go to the homepage</a>
	</p>
</div>
{{/block}}