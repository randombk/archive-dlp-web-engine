{{block name="title" prepend}}{{"Login"}}{{/block}}
{{block name="content"}}
	<br>
	<br>
	<section>
		<div class="pageBox" style="width: 300px;">
			<h1 style="font-size: 22px; color: red;">{{$siteName}}</h1>
			{{if $code}}
				<span style='color: red'>{{$code}}</span>
			{{/if}}
			<form id="login" name="login" action="index.php?page=login" data-action="index.php?page=login" method="post">
				<div class="row">
					<label for="username">Username:</label>
					<input name="username" id="username" type="text">
				</div>
				<div class="row">
					<label for="password">Password:</label>
					<input name="password" id="password" type="password">
				</div>
				<div class="row">
					<input class="submitButton" type="submit" value="Enter">
				</div>
			</form>
			<br>
		</div>
	</section>
{{/block}}
