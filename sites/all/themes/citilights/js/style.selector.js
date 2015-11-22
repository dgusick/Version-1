;jQuery.cookie.defaults.path = '/';
(function($){
var demo_assets_url = 'images/';
var styleSelector = {
	filename: 'color1.css',
	primary_color: '#75b08a',
	secondary_color: '#f0e797',
	isChanging: false,
	cookieColor: 'noo-selector-color', 
	cookieColorSecondary: 'noo-selector-color-secondary', 
	cookieSkin: 'noo-selector-skin',
	cookieLayout: 'noo-selector-layout',
	cookiePattern: 'noo-selector-pattern',
	cookieOpened: 'noo-selector-opened',
	initialize: function() {
		iThis = this;
		iThis.build();
		iThis.events();
		// Color
		if( $.cookie( iThis.cookieColor ) != null ) {
			iThis.setColor($.cookie( iThis.cookieColor ));
			// $("#colorPickerHolder1").ColorPickerSetColor($.cookie( iThis.cookieColor ));
			// $("#colorPickerHolder2").ColorPickerSetColor($.cookie( iThis.cookieColorSecondary ));
		}

		// Skin
		if( $.cookie( iThis.cookieSkin ) != null ) {
			iThis.setSkin( $.cookie( iThis.cookieSkin ) );
		}

		// Layout
		if( $.cookie( iThis.cookieLayout ) != null ) {
			iThis.setLayout( $.cookie( iThis.cookieLayout ) );
		}

		// Pattern
		if( $.cookie( iThis.CookiePattern ) != null ) {
			iThis.setPattern( $.cookie( iThis.CookiePattern ) );
		}

		// open Style Selector the first it's loaded
		if( $.cookie( iThis.cookieOpened ) == null ) {
			//iThis.container.find(".selector-title a").click();
			$.cookie( iThis.cookieOpened, true );
		}
	},
	build: function() {
		var iThis = this;
		style_selector_div = $("<div />").attr("id", "styleSelector").addClass("style-selector visible-md visible-lg").append(
			$("<h4 />").addClass("selector-title").html("Style Selector")
				.append($("<a />").attr("href", "#")
					.append($("<div />").addClass("icon-wrap")
						.append(
							$("<i />").addClass("fa fa-spin fa-cog"),
							$("<i />").addClass("fa fa-spin fa-spin-reverse fa-cog"),
							$("<i />").addClass("fa fa-spin fa-cog")
							))),
			// $("<div />").addClass("style-selector-mode").append(
			// 	$("<div />").addClass("options-links mode").append(
			// 	$("<a />").attr("href", "#").attr("data-mode", "basic").addClass("active").html("Basic"),
			// 	$("<a />").attr("href", "#").attr("data-mode", "advanced").html("Advanced"))
			// ),
			$("<div />").addClass("style-selector-wrap").append(
				$("<h5 />").html("Colors"),
				$("<ul />").addClass("options colors").attr("data-type", "colors"),
				$("<h5 />").html("Site Skin"),
				$("<div />").addClass("options-links skin").append(
					$("<a />").attr("href", "#").attr("data-skin", "light").addClass("active").html("Light"),
					$("<a />").attr("href", "#").attr("data-skin", "dark").html("Dark")
				),
				$("<h5 />").html("Site Layout"),
				$("<div />").addClass("options-links layout").append(
					$("<a />").attr("href", "#").attr("data-layout", "fullwidth").addClass("active").html("Wide"),
					$("<a />").attr("href", "#").attr("data-layout", "boxed").html("Boxed")
				),
				$("<div />").hide().addClass("patterns").append(
					$("<h5 />").html("Background Patterns"),
					$("<ul />").addClass("options").attr("data-type", "patterns")
				),
				$("<hr />"),
				$("<div />").addClass("options-links").append($("<a />").addClass("reset").attr("href", "#").html("Reset"))
			)
		);

		$("body").append(style_selector_div);
		iThis.container = $("#styleSelector");
		iThis.container.find("div.options-links.mode a").click(function(e) {
			e.preventDefault();
			var style_selector_div = $(this).parents(".mode");
			style_selector_div.find("a.active").removeClass("active");
			$(this).addClass("active");
			if( "advanced" == $(this).attr("data-mode") ) {
				$("#styleSelector").addClass("advanced").removeClass("basic");
			} else {
				$("#styleSelector").addClass("basic").removeClass("advanced");
			}
		});
		var presetColors = [
			{
				Hex1: iThis.primary_color,
				colorName1: "Blue",
				Hex2: iThis.secondary_color,
				colorName2: "Blue",
				fileName:'color1.css'
			},
			{
				Hex1: "#39c1d8",
				colorName1: "Moderate Cyan",
				Hex2: "#f3c93a",
				colorName2: "Bright Yellow",
				fileName:'color2.css'
			},
			{
				Hex1: "#376da3",
				colorName1: "Dark Moderate Blue",
				Hex2: "#cccccc",
				colorName2: "Light Gray",
				fileName:'color3.css'
			},
			{
				Hex1: "#f3c93a",
				colorName1: "Bright Yellow",
				Hex2: "#d5e5f2",
				colorName2: "Light Grayish Blue",
				fileName:'color4.css'
			},
			{
				Hex1: "#4c4b4b",
				colorName1: "Very Dark Grayish Red",
				Hex2: "#e8e555",
				colorName2: "Soft Yellow",
				fileName:'color5.css'
			}
		];
		
		presetColorsEl = iThis.container.find("ul[data-type=colors]");
		$.each(presetColors, function(index) {
			var colorEl = $("<li />").append($("<a />").css("background-color", presetColors[index].Hex2).attr({
				"data-color-hex1": presetColors[index].Hex1,
				"data-color-name1": presetColors[index].colorName1,
				"data-color-hex2": presetColors[index].Hex2,
				"data-color-name2": presetColors[index].colorName2,
				"data-filename": presetColors[index].fileName,
				href: "#",
				title: presetColors[index].colorName1 + ' and ' + presetColors[index].colorName2
			}).append($("<div />").addClass("triangle-topleft")
						.css("border-top-color", presetColors[index].Hex1)));
			presetColorsEl.append(colorEl);
		});
		// var colorPicker1 = $("<div />").attr("id", "colorPickerHolder1").attr("data-color", iThis.primary_color).attr("data-color-format", "hex").addClass("color-picker");
		// var colorPicker2 = $("<div />").attr("id", "colorPickerHolder2").attr("data-color", iThis.secondary_color).attr("data-color-format", "hex").addClass("color-picker");
		// presetColorsEl.before(colorPicker1).before(colorPicker2);
		presetColorsEl.find("a").click(function(e) {
			e.preventDefault();
			iThis.setColor($(this).attr("data-filename"));
			// $("#colorPickerHolder1").ColorPickerSetColor($(this).attr("data-color-hex1"));
			// $("#colorPickerHolder2").ColorPickerSetColor($(this).attr("data-color-hex2"));
		});

		// $("#colorPickerHolder1").ColorPicker({
		// 	color: iThis.primary_color,
		// 	flat: true,
		// 	livePreview: false,
		// 	onChange: function(e, value) {
		// 		iThis.setColor("#" + value, iThis.secondary_color);
		// 	}
		// });

		// $("#colorPickerHolder1 .colorpicker_color, #colorPickerHolder1 .colorpicker_hue").on("mousedown", function(e) {
		// 	e.preventDefault();
		// 	iThis.isChanging = true;
		// }).on("mouseup", function(e) {
		// 	e.preventDefault();
		// 	iThis.isChanging = false;
		// 	setTimeout(function() {
		// 		iThis.setColor("#" + $("#colorPickerHolder1 .colorpicker_hex input").val(), iThis.secondary_color);
		// 	}, 100);
		// });

		// $("#colorPickerHolder2").ColorPicker({
		// 	color: iThis.secondary_color,
		// 	flat: true,
		// 	livePreview: false,
		// 	onChange: function(e, value) {
		// 		iThis.setColor(iThis.primary_color, "#" + value);
		// 	}
		// });

		// $("#colorPickerHolder2 .colorpicker_color, #colorPickerHolder2 .colorpicker_hue").on("mousedown", function(e) {
		// 	e.preventDefault();
		// 	iThis.isChanging = true;
		// }).on("mouseup", function(e) {
		// 	e.preventDefault();
		// 	iThis.isChanging = false;
		// 	setTimeout(function() {
		// 		iThis.setColor(iThis.primary_color, "#" + $("#colorPickerHolder2 .colorpicker_hex input").val());
		// 	}, 100);
		// });

		iThis.container.find("div.options-links.layout a").click(function(e) {
			e.preventDefault();
			iThis.setLayout($(this).attr("data-layout"));
		});

		iThis.container.find("div.options-links.skin a").click(function(e) {
			e.preventDefault();
			iThis.setSkin($(this).attr("data-skin"));
		});

		// Background patterns
		var patterns = ["bright_squares", "random_grey_variations", "wild_oliva", "denim", "subtle_grunge", "az_subtle", "straws", "textured_stripes"];
		var patternsOption = iThis.container.find("ul[data-type=patterns]");
		$.each(patterns, function(index, value) {
			var patternEl = $("<li />").append($("<a />").addClass("pattern").css("background-image", "url(" + demo_assets_url + "patterns/" + value + ".png)").attr({
				"data-pattern": value,
				href: "#",
				title: value.charAt(0).toUpperCase() + value.slice(1)
			}));
			patternsOption.append(patternEl);
		});
		patternsOption.find("a").click(function(e) {
			e.preventDefault();
			iThis.setPattern($(this).attr("data-pattern"));
		});

		iThis.container.find("a.reset").click(function(e) {
			e.preventDefault();
			iThis.reset();
		});
	},
	events: function() {
		var iThis = this;
		iThis.container.find(".selector-title a").click(function(e) {
			e.preventDefault();
			if( iThis.container.hasClass("active") ) {
				iThis.container.animate({
					left: "-" + iThis.container.width() + "px"
				}, 300).removeClass("active");
			} else {
				iThis.container.animate({
					left: "0"
				}, 300).addClass("active");
			}
		});
	},
	setColor: function( filename ) {
		var iThis = this;
		
		if( iThis.isChanging ) {
			return false;
		}

		$mainCSS = $('#style-main-color');
		cssHref = $mainCSS.attr( 'href');
		cssHref = cssHref.replace( iThis.filename, filename );
		iThis.filename = filename;
		$mainCSS.attr( 'href', cssHref );
		$.cookie( iThis.cookieColor, filename );
		// $.cookie( iThis.cookieColorSecondary, secondary_color );
		$(document).trigger('noo-color-changed');
	},
	setSkin: function(value) {
		var iThis = this;
		if(value !='dark')
			value = 'light'
		// Update buttons status
		var skinOptionEl = iThis.container.find("div.options-links.skin");
		skinOptionEl.find("a.active").removeClass("active");
		skinOptionEl.find("a[data-skin=" + value + "]").addClass("active");

		// Update Inline CSS
		//iThis.updateCSS();

		// Update Main External CSS
		// $mainCSS = $('#noo-main-style-css');
		// cssHref = $mainCSS.attr( 'href');

		// if( value === 'dark' ) {
		// 	oldHref = 'noo.css';
		// 	newHref = 'noo-dark.css';
		// } else {
		// 	oldHref = 'noo-dark.css';
		// 	newHref = 'noo.css';
		// }
		// cssHref = cssHref.replace( oldHref, newHref );
		// $mainCSS.attr( 'href', cssHref );

		// iThis.updateLogo();
		var cvalue = '';
		if(value == 'dark'){
			$('body').addClass('dark-style');
			cvalue = value;
		}else{
			cvalue = '';
			$('body').removeClass('dark-style');
		}
		// $(this).parent().find('.active').removeClass('active');
		// $(this).addClass('active');
		$.cookie( iThis.cookieSkin, cvalue );
	},
	updateLogo: function() {
		var skin = iThis.container.find("div.options-links.skin a.active").attr("data-skin");
		image_url = ( skin === 'dark' ) ? demo_assets_url + 'logo-dark.png' : demo_assets_url + "logo.png";
		image_floating_url = demo_assets_url + "logo-dark.png";

		if( image_url !== '') {
			$('.navbar-brand .noo-logo-img').remove();
			$('.navbar-brand .noo-logo-retina-img').remove();
			$('.navbar-brand').append('<img class="noo-logo-img noo-logo-normal" src="' + image_url + '">');
			$('.navbar-brand').append('<img class="noo-logo-retina-img noo-logo-normal" src="' + image_url + '">');
			$('.navbar-brand').append('<img class="noo-logo-img noo-logo-floating" src="' + image_floating_url + '">');
			$('.navbar-brand').append('<img class="noo-logo-retina-img noo-logo-floating" src="' + image_floating_url + '">');
		}
		$(document).trigger('noo-logo-changed');
	},
	setLayout: function( value ) {
		var iThis = this;

		// Update buttons status
		var layoutOptionEl = iThis.container.find("div.options-links.layout");
		var	patternsEl = iThis.container.find("div.patterns");
		layoutOptionEl.find("a.active").removeClass("active");
		layoutOptionEl.find("a[data-layout=" + value + "]").addClass("active");

		if( "fullwidth" == value ) {
			patternsEl.hide();
			$("body").removeClass('boxed-layout');
			$("body").css("background-image", "none");
			$.removeCookie("pattern");
		} else {
			patternsEl.show();
			$("body").addClass('boxed-layout');

			if( $.cookie(iThis.CookiePattern) === null ) {
				// Choose the first pattern
				iThis.container.find("ul[data-type=patterns] li:first a").click();
			}				
		}
		
		$.cookie(iThis.cookieLayout, value);
		//
		//$(document).trigger('noo-layout-changed');
		
	},
	setPattern: function( value ) {
		var iThis = this;
		if( $("body").hasClass("boxed-layout") ) {
			$("body").css("background-image", "url(" + demo_assets_url + "patterns/" + value + ".png)")
					.css("background-repeat", "repeat");
			$.cookie(iThis.CookiePattern, value);
		}
		$(document).trigger('noo-pattern-changed');
	},
	updateCSS: function () {
		iThis = this;
		var skin = iThis.container.find("div.options-links.skin a.active");
		var skin = iThis.container.find("div.options-links.skin a.active").attr("data-skin")
		//console.log($(skin));
		//$('#style-main-color').attr('href','css/'+ skin.data('filename'));
		// var skin = iThis.container.find("div.options-links.skin a.active").attr("data-skin");
		// var customized = {
		// 	// noo_site_skin:       skin,
		// 	noo_site_link_color: iThis.primary_color,
		// 	noo_site_secondary_color: iThis.secondary_color,
		// 	// noo_layout_bg_color:      ( skin === 'dark' ) ? '#000000' : '#FFFFFF',
		// 	// noo_typo_body_font_color: ( skin === 'dark' ) ? '#B8B8B8' : '#282828',
		// 	// default_headings_color:   ( skin === 'dark' ) ? '#333333' : '#FFFFFF',
		// };
		// jQuery.ajax( selectorL10n.ajax_url, {
		// 	type: 'POST',
		// 	data: {
		// 		'noo_customize_ajax': 'on',
		// 		'customized'        : JSON.stringify( customized ),
		// 		'action'            : 'noo_get_customizer_css_design',
		// 		'nonce'             : selectorL10n.customize_live_css,
		// 	},
		// 	success: function ( data ) {
		// 		// Place new css to customizer css
		// 		var $customizeCSS = jQuery( '#noo-customizer-css-design').length ? jQuery( '#noo-customizer-css-design') : jQuery('<style id="noo-customizer-css-design' + '" type="text/css" />').appendTo('head');
		// 		$customizeCSS.text( data );
		// 		jQuery('#noo-customizer-css-design').text( data );
		// 	}
		// } );
		// jQuery.ajax( selectorL10n.ajax_url, {
		// 	type: 'POST',
		// 	data: {
		// 		'noo_customize_ajax': 'on',
		// 		'customized'        : JSON.stringify( customized ),
		// 		'action'            : 'noo_get_customizer_css_header',
		// 	},
		// 	success: function ( data ) {
		// 		// Place new css to customizer css
		// 		jQuery('#noo-customizer-css-header').text( data );
		// 	}
		// } );
	},
	reset: function() {
		var iThis = this;
		$.removeCookie(iThis.cookieColor);
		$.removeCookie(iThis.cookieSkin);
		$.removeCookie(iThis.cookieLayout);
		$.removeCookie(iThis.CookiePattern);
		location.reload();
	},
};

// Don't run on Customize live preview
//if( ( typeof nooCustomizerL10n === 'undefined' ) || ( nooCustomizerL10n.is_preview !== "true" ) ) {
	
//}
	$(document).ready(function() {
		styleSelector.initialize();
	});
})(jQuery);