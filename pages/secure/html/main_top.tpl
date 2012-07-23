<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="?page=overview">DLP Secure</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li {{if isset($curHighlight) && $curHighlight == "overview"}} class="active" {{/if}}><a href="?page=overview">Overview</a></li>
				<li class="{{if isset($curHighlight) && $curHighlight == "servers"}} active {{/if}} dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Servers <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="?page=server&which=vdlp1">VDLP1</a></li>
					</ul>
				</li>
				<li class=""><a href="?page=logout">Logout</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container-fluid">
	{{foreach from=$alerts item=alert}}
	<div class="alert {$alert.type}">
		<button type="button" class="close" data-dismiss="alert">
			&times;
		</button>
		<strong>{{$alert.Title}}</strong> {{$alert.Message}}
	</div>
	{{/foreach}}
</div>