{{block name="title" prepend}}{{"Login"}}{{/block}}
{{block name="content"}}
	<br>
	<br>
	<section>
		<div class="pageBox" style="width: 300px;">
			<h1 style="font-size: 22px; color: red;">DLPSECURE</h1>
			<span style='color: red'>{{$message}}</span>

			<br>
			<br>
			<br>
			<input action="action" type="button" onclick="history.go(-1);" value="Go Back"/>
		</div>
	</section>
{{/block}}

