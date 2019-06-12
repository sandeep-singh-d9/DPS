<!doctype html>
<html dir="ltr">
<head>
<meta charset="utf-8">
<title>@lang('language.appName')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- start css -->
    <!-- Custom CSS -->
	<link href="{{ \App\Http\Controllers\HomeController::fileVersion('dps_asset/css/style.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Acme|Alegreya|Alegreya+Sans|Anton|Archivo|Archivo+Black|Archivo+Narrow|Arimo|Arvo|Asap|Asap+Condensed|Bitter|Bowlby+One+SC|Bree+Serif|Cabin|Cairo|Catamaran|Crete+Round|Crimson+Text|Cuprum|Dancing+Script|Dosis|Droid+Sans|Droid+Serif|EB+Garamond|Exo|Exo+2|Faustina|Fira+Sans|Fjalla+One|Francois+One|Gloria+Hallelujah|Hind|Inconsolata|Indie+Flower|Josefin+Sans|Julee|Karla|Lato|Libre+Baskerville|Libre+Franklin|Lobster|Lora|Mada|Manuale|Maven+Pro|Merriweather|Merriweather+Sans|Montserrat|Montserrat+Subrayada|Mukta+Vaani|Muli|Noto+Sans|Noto+Serif|Nunito|Open+Sans|Open+Sans+Condensed:300|Oswald|Oxygen|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Pacifico|Passion+One|Pathway+Gothic+One|Play|Playfair+Display|Poppins|Questrial|Quicksand|Raleway|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Ropa+Sans|Rubik|Saira|Saira+Condensed|Saira+Extra+Condensed|Saira+Semi+Condensed|Sedgwick+Ave|Sedgwick+Ave+Display|Shadows+Into+Light|Signika|Slabo+27px|Source+Code+Pro|Source+Sans+Pro|Spectral|Titillium+Web|Ubuntu|Ubuntu+Condensed|Varela+Round|Vollkorn|Work+Sans|Yanone+Kaffeesatz|Zilla+Slab|Zilla+Slab+Highlight" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style>
	 img{
		 width:30%;
		 height:auto;
	 }
	.cell:hover{
		border: 1px solid #737373;
		cursor: pointer;
	}
	.overlayeditor {
		display:block;
	}
	.overlayeditor{
		display: none;
		width: 100px;
		height: 20px;
		background-color: black;
	}
	.editor_open{
		position:relative;
	}
 .editor_open:hover  .overlayeditor {
		display:block;
	}
	.overlayeditor{
		position:absolute;
		top: -18px;
		height: auto;
	left: 25%;
	width: auto;
	}
	.inner_editor{
		display:inline-block;
		color:#fff;
		margin: 0 7px;
	}
	.overlay_btn{
		background: no-repeat;
		color: #fff;
		border: none;
	
	}
	</style>
</head>

<body>
	<div id="app">
		<router-view></router-view>
	</div>
	
	<script src="{{ \App\Http\Controllers\HomeController::fileVersion('/js/app.js') }}"></script>
</body>
</html>
