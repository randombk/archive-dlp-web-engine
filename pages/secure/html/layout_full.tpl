<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="David J. W. Li">
		<title>{{block name="title"}}{{/block}}</title>
	{{include file="main_header.tpl" bodyclass="full"}}
	</head>

	<body>
		<style>
			body {
			  padding-top: 70px;
			  padding-bottom: 30px;
			}

			.theme-dropdown .dropdown-menu {
			  display: block;
			  position: static;
			  margin-bottom: 20px;
			}

			.theme-showcase > p > .btn {
			  margin: 5px 0;
			}
		</style>
		{{include file="main_top.tpl" nocache}}
		

		<div class="container theme-showcase">
			{{block name="content"}}{{/block}}
		</div>
		{{include file="main_footer.tpl" nocache}}
		
		{{include file="main_scripts.tpl" nocache}}
	</body>
</html>
