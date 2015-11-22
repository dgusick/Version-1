(function ($) {
Drupal.behaviors.citilights = {
	attach: function () {
			$('#edit-logo').appendTo($('#edit-favicon-webclip > .fieldset-wrapper'));
			$('#edit-favicon').appendTo($('#edit-favicon-webclip > .fieldset-wrapper'));
			$('.form-item-css3-textarea').before($('#edit-theme-settings'));
			$('#edit-skins, #edit-choose-ft-pattern, #edit-Backgroundop-blocks, #edit-sidebar-position, #edit-bottom-blocks, #edit-node-article-display, #edit-node-photo-display, #edit-node-video-display').removeClass('form-select');
	}
};
Drupal.behaviors.myBehavior = {
    attach: function (context, settings) {
        //code starts


        //code ends
    }
};
})(jQuery);

jQuery(function($){
    var tabCookieName = "maintabs";
    var subTab1CookieName = "subtabs1";
    var subTab2CookieName = "subtabs2";
    $(function() {
        // Save cookie for each tab group, each tab group need unique cookie name
        $("#md-tabs").tabs({
            active : ($.cookie(tabCookieName) || 0),
            activate : function( event, ui ) {
                var newIndex = ui.newTab.parent().children().index(ui.newTab);
                $.cookie(tabCookieName, newIndex, { expires: 1 });
            }
        });
        $( "#md-general-settings, #md-design, #md-text-typography, #md-pages, #md-nodes, #md-display, #md-custom-code, #md-config").tabs({
            active : ($.cookie(subTab1CookieName) || 0),
            activate : function( event, ui ) {
                var newIndex = ui.newTab.parent().children().index(ui.newTab);
                $.cookie(subTab1CookieName, newIndex, { expires: 1 });
            }
        });
        $("#md-subtabs").tabs({
            active : ($.cookie(subTab2CookieName) || 0),
            activate : function( event, ui ) {
                var newIndex = ui.newTab.parent().children().index(ui.newTab);
                $.cookie(subTab2CookieName, newIndex, { expires: 1 });
            }
        })
    });
    /*--------------------------- Header -----------------------------------*/

    var headerBackgroundType = $("#edit-design-header .header-background-type").find("option:selected").val();

    changeHeaderBgType($("#edit-design-header"),headerBackgroundType);

    $(".header-background-type").click(function(){
        var headerBackgroundType = $(this).find("option:selected").val();
        var parentDiv = $(this).parent().parent();
        changeHeaderBgType(parentDiv,headerBackgroundType);
    })
    function changeHeaderBgType(obj,headerBackgroundType) {
        /*if(headerBackgroundType == 'md_fullscreen_slider') {
            obj.find("#header-video-wrapper").hide();
            obj.find("#header-image-wrapper").hide();
            obj.find("#header-content-wrapper").hide();
            obj.find("#header-pattern-wrapper").hide();

        }
        if(headerBackgroundType == 'custom') {
            obj.find("#header-video-wrapper").hide();
            obj.find("#header-image-wrapper").show();
            obj.find("#header-content-wrapper").show();
            obj.find("#header-pattern-wrapper").hide();
        }
        if (headerBackgroundType == 'video') {
            obj.find("#header-video-wrapper").show();
            obj.find("#header-image-wrapper").hide();
            obj.find("#header-content-wrapper").hide();
            obj.find("#header-pattern-wrapper").hide();
        }
        if (headerBackgroundType == 'pattern') {
            obj.find("#header-video-wrapper").hide();
            obj.find("#header-image-wrapper").hide();
            obj.find("#header-content-wrapper").hide();
            obj.find("#header-pattern-wrapper").show();
        }*/
    }


    /*--------------------------------------------- Parallax --------------------------------------------*/
    // Enable parallax
    $('.enable-parallax').bind('change', function() {
        if ($(this).is(':checked')) {
            $(this).parent().next().show();
        } else {
            $(this).parent().next().hide();
        }
    });
    $('.enable-parallax').trigger('change');
    // Parallax enable overlay
    $(".enable-overlay").bind('change',function(){
        if ($(this).is(':checked')) {
            $(this).parent().next().show();
        } else {
            $(this).parent().next().hide();
        }
    });
    $(".enable-overlay").trigger('change');
    // Parallax Over Opacity Change
    jQuery(document).ready(function($){
        for(var i=1;i<=7;i++){
            var defaultVal = Drupal.settings["pr"+i+"Opacity"];
            $("#pr-"+i+"-overlay-opacity").slider({
                range: "min",
                value: defaultVal,
                min: 1,
                max: 100,
                slide: function( event, ui ) {
                    $(this).find("input").val( ui.value );
                }
            })
        }
        $(".pr-type").each(function(){
            var value = $(this).val();
            changePrType($(this).parent().parent(),value);
        })
        $(".pr-type").click(function(){
            var value = $(this).find("option:selected").val();
            var parentDiv = $(this).parent().parent();
            changePrType(parentDiv,value);
        })
        function changePrType(obj,value){
            if(value == 'skills'){
                obj.find(".pr-skill-wrapper").show();
                obj.find(".pr-connect-wrapper").hide();
                obj.find(".pr-number-wrapper").hide();
                obj.find(".pr-button-wrapper").hide();
                obj.find(".pr-customer-wrapper").hide();
                obj.find(".pr-overview-wrapper").hide();
                obj.find(".pr-contact-wrapper").hide();
            }
            if(value == 'connect'){
                obj.find(".pr-skill-wrapper").hide();
                obj.find(".pr-connect-wrapper").show();
                obj.find(".pr-number-wrapper").hide();
                obj.find(".pr-button-wrapper").hide();
                obj.find(".pr-customer-wrapper").hide();
                obj.find(".pr-overview-wrapper").hide();
                obj.find(".pr-contact-wrapper").hide();
            }
            if(value == 'number'){
                obj.find(".pr-skill-wrapper").hide();
                obj.find(".pr-connect-wrapper").hide();
                obj.find(".pr-number-wrapper").show();
                obj.find(".pr-button-wrapper").hide();
                obj.find(".pr-customer-wrapper").hide();
                obj.find(".pr-overview-wrapper").hide();
                obj.find(".pr-contact-wrapper").hide();
            }
            if(value == 'button'){
                obj.find(".pr-skill-wrapper").hide();
                obj.find(".pr-connect-wrapper").hide();
                obj.find(".pr-number-wrapper").hide();
                obj.find(".pr-button-wrapper").show();
                obj.find(".pr-customer-wrapper").hide();
                obj.find(".pr-overview-wrapper").hide();
                obj.find(".pr-contact-wrapper").hide();
            }
            if(value == 'customer'){
                obj.find(".pr-skill-wrapper").hide();
                obj.find(".pr-connect-wrapper").hide();
                obj.find(".pr-number-wrapper").hide();
                obj.find(".pr-button-wrapper").hide();
                obj.find(".pr-customer-wrapper").show();
                obj.find(".pr-overview-wrapper").hide();
                obj.find(".pr-contact-wrapper").hide();
            }
            if(value == 'overview'){
                obj.find(".pr-skill-wrapper").hide();
                obj.find(".pr-connect-wrapper").hide();
                obj.find(".pr-number-wrapper").hide();
                obj.find(".pr-button-wrapper").hide();
                obj.find(".pr-customer-wrapper").hide();
                obj.find(".pr-overview-wrapper").show();
                obj.find(".pr-contact-wrapper").hide();
            }
            if(value == 'contact'){
                obj.find(".pr-skill-wrapper").hide();
                obj.find(".pr-connect-wrapper").hide();
                obj.find(".pr-number-wrapper").hide();
                obj.find(".pr-button-wrapper").hide();
                obj.find(".pr-customer-wrapper").hide();
                obj.find(".pr-overview-wrapper").hide();
                obj.find(".pr-contact-wrapper").show();
            }

        }
        $(".opacity-value").each(function () {
            var sliderID = $(this).parent().attr("id");
            $(this).val($("#"+sliderID).slider("value"));
        });
    });

    /*-------------------------- 404 Page -----------------------------*/


    jQuery(document).ready(function($){
        if($('#edit-enable-team-header').is(':checked')) {
            $('#team-header').show();
        } else {
            $('#team-header').hide();
        };
        if($('#edit-preloader-enable-logo').is(':checked')) {
            $('.form-item-preloader-logo-path').show();
        } else {
            $('.form-item-preloader-logo-path').hide();
        };
        $('#edit-enable-team-header').bind('change', function() {
            if ($(this).is(':checked')) {
                $('#team-header').show();
            } else {
                $('#team-header').hide();
            }
        });
        $('#edit-preloader-enable-logo').bind('change', function() {
            if ($(this).is(':checked')) {
                $('.form-item-preloader-logo-path').show();
            } else {
                $('.form-item-preloader-logo-path').hide();
            }
        });
        $('#edit-enable-team-header','#edit-preloader-enable-logo').trigger('change');
    })


    // Color picker
	var colorpickerHTML = '<span class="colorSelect"><span></span></span>';


	$(".md-listleft a").click(function(){
		$(this).parent().parent().find("a").removeClass("border-white");
		$(this).parent().prev().find("a").addClass("border-white")
	});
	
	// Fonts
	$(".choosefont").choosefont();
	// Cookies Tabs
	$("#md-general-settings, #md-design, #md-text-typography, #md-pages, #md-nodes, #md-display, #md-custom-code, #md-tabs, #md-subtabs, #md-config").tabs({
		cookie: {
				expires: 1
		}
	});
	
	$(".md-listleft li.ui-state-active").each(function(){
		$(this).prev().find("a").addClass("border-white");
	});

	// Color picker
	$('.form-colorpicker').before(colorpickerHTML);
	$('.colorSelect').each(function(){
		tmpbackground = $(this).next().val();
		$(this).css({'background-color':"#"+tmpbackground});
	});
	$('span.colorSelect').ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).css({'background-color':"#"+hex});
				$(el).next().val(hex);
				$(el).ColorPickerHide();
			},
			onBeforeShow: function () {
				current_obj = this;
				$(this).ColorPickerSetColor($(this).next().val());
			},
			onChange: function (hsb, hex, rgb) {
				$(current_obj).css({'background-color':"#"+hex});
				$(current_obj).next().val(hex);
			}
		});

	listBackgroundw = $(".md-wrap").width() - 300;
	$(".md-listBackground").width(listBackgroundw);
	
	$('.md-listBackground legend').each(function(){
		tmphtml = $(this).find('span').html();
		$(this).replaceWith('<h3>' + tmphtml + '</h3>');
	});

    // Preloader Background color picker
    $('input#edit-preloader-bg-color').before('<span id="backgroundcolorselect" class="colorSelect2"><span></span></span>');
    // End Preloader Settings

    // Menu Settings
    $('input#edit-menu-bg-color').before('<span id="backgroundcolorselect" class="colorSelect2"><span></span></span>');
    $('input#edit-menu-link-color').before('<span id="backgroundcolorselect" class="colorSelect2"><span></span></span>');
    $('input#edit-menu-link-hover-color').before('<span id="backgroundcolorselect" class="colorSelect2"><span></span></span>');
    // End Menu settings

    // 404 Pattern Select
    fakeselect('#edit-choose-nf-pattern', 'nf', 21);
    fakeselect('#edit-choose-header-pt-pattern', 'hd', 21);

    // background pattern
    if ($('#edit-ft-bg-color').val()) {
        $('.ptwrap div').css({'background-color': '#' + $('#edit-ft-bg-color').val()})
    }
    $('.colorSelect2').each(function(){
        tmpbackground = $(this).next().val();
        $(this).css({'background-color':"#"+tmpbackground});
        $('.ptwrap div').css({'background-color':"#"+tmpbackground});
    });
    $('span.colorSelect2').ColorPicker({
        onSubmit: function(hsb, hex, rgb, el) {
            $(el).css({'background-color':"#"+hex});
            $('.ptwrap div').css({'background-color':"#"+hex});
            $(el).next().val(hex);
            $(el).ColorPickerHide();
        },
        onBeforeShow: function () {
            current_obj = this;
            $(this).ColorPickerSetColor($(this).next().val());
        },
        onChange: function (hsb, hex, rgb) {
            $(current_obj).css({'background-color':"#"+hex});
            $('.ptwrap div').css({'background-color':"#"+hex});
            $(current_obj).next().val(hex);
        }
    });

    fakeselect('#edit-skins', 'sk', 8);
	fakeselect('#edit-layout-bg', 'la', 8);
    fakeselect('#edit-parallax-1-size', 'pr1s', 3);
    fakeselect('#edit-parallax-2-size', 'pr2s', 3);
    fakeselect('#edit-parallax-3-size', 'pr3s', 3);
    fakeselect('#edit-header-content-display', 'hdct', 2);
    fakeselect('#edit-header-size', 'hds', 2);
    fakeselect('#edit-sidebar-position', 'sbp', 2);
    fakeselect('#edit-bottom-blocks', 'bb', 6);
    fakeselect('#edit-node-article-display', 'nbd', 6);
    fakeselect('#edit-node-photo-display', 'npd', 4);
    fakeselect('#edit-node-video-display', 'nvd', 4);
	
	// Design: Header
	changetopbl($('#dk_container_edit-ht-type .dk_option_current a').attr('data-dk-dropdown-value'));
	$('#dk_container_edit-ht-type .dk_options_inner a').click(function(){
		changetopbl($(this).attr('data-dk-dropdown-value'));
	});

    // Design: Footer
    inputtoslide("#edit-footer-bo-size", 1, 20);
    // Design: Block
    inputtoslide("#edit-block-title-Background-space", 0, 20);
    inputtoslide("#edit-block-bo-size", 1, 20);

    // Border type:
	$('.form-bordertype label').each(function(){
        $(this).after('<div class="border-type border-type-'+$(this).text()+'"></div>')
    })

    jQuery(document).ready(function($){
        $('.form-item-files-logo-upload').hide();
        $('.form-item-logo-path').hide();
        $('.form-item-files-favicon-upload').hide();
        $('.form-item-favicon-path').hide();
        $('.form-item-css3-textarea').hide();
    });
	filestyle("#edit-logo-normal-upload", '.form-item-files-logo-normal-upload', '.form-item-logo-normal-path');
	filestyle("#edit-fvicon-upload", '.form-item-files-fvicon-upload', '.form-item-fvicon-path');
	filestyle("#edit-webclip-upload", '.form-item-files-webclip-upload', '.form-item-webclip-path');
	filestyle("#edit-bg-upload", '.form-item-files-bg-upload', '.form-item-bg-path');
    filestyle("#edit-restore-file-upload", '.form-item-files-restore-file-upload', '.form-item-restore-file-path');
    filestyle("#edit-logo-retina-upload", '.form-item-files-logo-retina-upload', '.form-item-logo-retina-path');
    filestyle("#edit-footer-logo-upload", '.form-item-files-footer-logo-upload', '.form-item-footer-logo-path');
    filestyle("#edit-preloader-logo-upload", '.form-item-files-preloader-logo-upload', '.form-item-preloader-logo-path');
    filestyle("#edit-sd1-image-upload-1", '.form-item-files-sd1-image-upload-1', '.form-item-sd1-image-path-1');
    filestyle("#edit-sd2-image-upload-1", '.form-item-files-sd2-image-upload-1', '.form-item-sd2-image-path-1');
    filestyle("#edit-sd3-image-upload-1", '.form-item-files-sd3-image-upload-1', '.form-item-sd3-image-path-1');
    filestyle("#edit-nm4-image-upload", '.form-item-files-nm4-image-upload', '.form-item-nm4-image-path');
    filestyle("#edit-nm3-image-upload", '.form-item-files-nm3-image-upload', '.form-item-nm3-image-path');
    filestyle("#edit-nm2-image-upload", '.form-item-files-nm2-image-upload', '.form-item-nm2-image-path');
    filestyle("#edit-nm1-image-upload", '.form-item-files-nm1-image-upload', '.form-item-nm1-image-path');
    filestyle("#edit-header-video-image-fallback-upload", '.form-item-files-header-video-image-fallback-upload', '.form-item-header-video-image-fallback');
    filestyle("#edit-nf-video-image-fallback-upload", '.form-item-files-nf-video-image-fallback-upload', '.form-item-nf-video-image-fallback');
    filestyle("#edit-header-slide-image-fallback-upload", '.form-item-files-header-slide-image-fallback-upload', '.form-item-header-slide-image-fallback');
    filestyle("#edit-nf-slide-image-fallback-upload", '.form-item-files-nf-slide-image-fallback-upload', '.form-item-nf-slide-image-fallback');
    filestyle("#edit-team-image-upload", '.form-item-files-team-image-upload', '.form-item-team-image-path');
	filestyle("#edit-footer-static-bg-upload", '.form-item-files-footer-static-bg-upload', '.form-item-footer-static-bg-path');
	filestyle("#edit-footer-logo-upload", '.form-item-files-footer-logo-upload', '.form-item-footer-logo-path');
    for(var i=1;i<=7;i++) {
        filestyle("#edit-pr-"+i+"-bg-image-upload", '.form-item-files-pr-'+i+'-bg-image-upload', '.form-item-pr-'+i+'-bg-image-path');
        //filestyle("#edit-pr-"+i+"-customer-image-upload-no1", '.form-item-files-pr-'+i+'-customer-image-upload-no1', '.form-item-pr-'+i+'-customer-image-path-no1');
    }
	$(document).bind('keydown', function (e) {
		var
			$open1    = $('#dk_container_edit-choose-bg.dk_open'),
			$focused1 = $('#dk_container_edit-choose-bg.dk_focus'),
			$dk1 = null;

		if ($open1.length) {
			$dk1 = $open1;
		} else if ($focused1.length && !$open1.length) {
			$dk1 = $focused1;
		}
		
		if ((e.keyCode == 13) && $dk1) {
			changebackground($('#dk_container_edit-choose-bg .dk_option_current a').attr('data-dk-dropdown-value'));
		}
		
		var
			$open2    = $('#dk_container_edit-ht-type.dk_open'),
			$focused2 = $('#dk_container_edit-ht-type.dk_focus'),
			$dk2 = null;

		if ($open2.length) {
			$dk2 = $open2;
		} else if ($focused2.length && !$open2.length) {
			$dk2 = $focused2;
		}
		
		if ((e.keyCode == 13) && $dk2) {
			changetopbl($('#dk_container_edit-ht-type .dk_option_current a').attr('data-dk-dropdown-value'));
		}
	});
	
	/* Custom node display */
	shareEnable();
	$('#edit-node-enable').bind('change', function() {
			if ($(this).is(':checked')) {
				$('#md-nodes .md-listleft li').show();
			} else {
				$('#md-nodes .md-listleft li:not(:first)').hide();
			}
	});
	$('#edit-nodetitle-enable').bind('change', function() {
			if ($(this).is(':checked')) {
				$('#node-custom-typo').show();
			} else {
				$('#node-custom-typo').hide();
			}
	});
    $('#edit-typo-view-title-enable').bind('change', function() {
        if ($(this).is(':checked')) {
            $('#typo-view-title-custom-typo').show();
        } else {
            $('#typo-view-title-custom-typo').hide();
        }
    });
    $('#edit-typo-view-description-enable').bind('change', function() {
        if ($(this).is(':checked')) {
            $('#typo-view-description-custom-typo').show();
        } else {
            $('#typo-view-description-custom-typo').hide();
        }
    });
    $('#edit-typo-heading-style-enable').bind('change',function(){
        if ($(this).is(':checked')) {
            $('#typo-heading-style-custom-typo').show();
        } else {
            $('#typo-heading-style-custom-typo').hide();
        }
    });
	$('#edit-typo-heading-style-enable,#edit-node-enable, #edit-nodetitle-enable, #edit-typo-view-title-enable, #edit-typo-view-description-enable,#edit-parallax-1-enabled,#edit-parallax-2-enabled,#edit-parallax-3-enabled,#edit-parallax-4-enabled').trigger('change');



	/* Functions
	--------------------------------------------------------------------------*/
	function toggleBounce() {

		if (marker.getAnimation() != null) {
			marker.setAnimation(null);
		} else {
			marker.setAnimation(google.maps.Animation.BOUNCE);
		}
	}
	function changetopbl(bg) {
		switch (bg) {
			case '1':
				$('.form-item-ht-text').show();
				break;
			default:
				$('.form-item-ht-text').hide();
		}
	}
	
	function filestyle(file, filewrap, path, inputtext) {
		inputtext = typeof inputtext !== 'undefined' ? inputtext : 0;

		$(path).find('.form-text').after($(file));
		$(filewrap).remove();
		
		var self = $(file);
		var text = $('<div class="filetext"><span></span>Upload a file</div>');
								
		self.wrap('<div class="filewrapper btn-upload">').after(text).css({"opacity": "0"}).bind("change", function() {
			if (inputtext == 1) {
				$(path).find('.description').before('<div>File: ' + self.val().replace("C:\\fakepath\\", "") + ' selected</div>');
			} else {
				$(path).find('.form-text').val(self.val().replace("C:\\fakepath\\", ""));
			}
		});
	}
	
	function fakeselect($select, $block, $optionnumber){
		var $block_html = '<div class="'+$block+'wrap clearfix"><ul>';
		var $tmpval = 0;
		for ($i = 0; $i <= $optionnumber; $i++) {
			$tmpval = $($select + " option:eq("+$i+")").val();
			if ($tmpval) {
				$block_html += '<li><div id="'+$block+$tmpval+'" class="slitem"></div></li>';
			}
		}
		$block_html += '</ul></div>';
		
		$($select).parent().append($block_html);
		
		var $tmpselect = $($select + " option[selected]").val();
		$('#' + $block+$tmpselect).parent().addClass('selected');
		
		$('.'+$block+'wrap li').each(function() {
			$(this).click(function(){
				$('.'+$block+'wrap .selected').removeClass('selected');
				$(this).addClass('selected');
				$($select + " option[selected]").removeAttr("selected");
				tmpindex = $(this).find(".slitem").attr('id').replace($block, "")
				$($select + " option[value="+tmpindex+"]").attr("selected", "selected");
			});
		});
		$($select).hide();
	}
	
	function changeimgsize(id, maxw, maxh) {
		$(id + " .imgwidth").after('<div class="slider-width"></div>');
		$(id + " .imgheight").after('<div class="slider-height"></div>');
		$(id + " .constrain").after('<div class="button" style="width: 34px; margin: 5px 0 0">reset</div>');
		resetwidth = imgwidth = $(id + " .slider-img:first").width();
		resetheight = imgheight = $(id + " .slider-img:first").height();
		var ratio = 0;
		$(id + " .constrain").change(function() {
		  if ($(this).is (':checked')) {
				imgwidth = $(id + " .imgwidth").val();
				imgheight = $(id + " .imgheight").val();
			}
		});
		$(id + " .slider-width").slider({
			range: "min",
			value: imgwidth,
			min: 10,
			max: maxw,
			step: 1,
			slide: function( event, ui ) {
				if ($(id + " .constrain:checked").length > 0) {
					ratio = ui.value / imgwidth;
					newheight = jqROund(imgheight * ratio);
					if (newheight > maxh) {
						return false;
					} else {
						$(id + " .slider-height").slider("value", newheight);
						$(id + " .slider-img").height(newheight);
						$(id + " .imgheight").val(newheight);
					}
				}
				$(id + " .imgwidth").val(ui.value);
				$(id + " .slider-img" ).width( ui.value );
			}
		});
		
		$(id + " .slider-height").slider({
			range: "min",
			value: imgheight,
			min: 10,
			max: maxh,
			step: 1,
			slide: function( event, ui ) {
				if ($(id + " .constrain:checked").length > 0) {
					ratio = ui.value / imgheight;
					newwidth = jqROund(imgwidth * ratio);
					if (newwidth > maxw) {
						return false;
					} else {
						$(id + " .slider-width").slider("value", newwidth);
						$(id + " .slider-img").width(newwidth);
						$(id + " .imgwidth").val(newwidth);
					}
				}
				$(id + " .imgheight").val(ui.value);
				$(id + " .slider-img" ).height( ui.value );
			}
		});
		
		$(id + " .button").click(function(){
			imgwidth = resetwidth;
			imgheight = resetheight;
			$(id + " .imgwidth").val(resetwidth);
			$(id + " .slider-width").slider("value", resetwidth);
			$(id + " .imgheight").val(resetheight);
			$(id + " .slider-height").slider("value", resetheight);
			$(id + " .slider-img" ).css({
				'width': resetwidth,
				'height': resetheight
			});
			return false;
		})
	}
	
	function inputtoslide(id, minv, maxv) {
        sliderclass = id.replace("#", "")+'inputtoslide';
		$(id).before('<div class="'+ sliderclass +' inputtoslide"></div>').after(' px');
        $(id).parent().addClass('input-slide');
		$("." + sliderclass).slider({
			value: $(id).val(),
            range: "min",
			min: minv,
			max: maxv,
			step: 1,
			slide: function( event, ui ) {
				$(id).val(ui.value);
			}
		});
        $(id).focusout(function() {
            $(this).prev().slider('value',$(id).val());
        });
    }
	
	function perBackgroundType(item) {
		var custom_checkbox = $('#edit-' + item + '-enable');
		var div = $('#div-' + item + '-collapse');
	
		custom_checkbox.change(
			function() {
				if (custom_checkbox.attr('checked')) {
					div.slideDown();
				}
				else if (div.css('display') != 'none') {
					div.slideUp();
				}
			}
		);
		if (!custom_checkbox.attr('checked')) {
			div.hide();
		}
	}
	
	function shareEnable() {
		var custom_checkbox = $('.node-share-checkbox');
		custom_checkbox.change(
			function() {
				div = $(this).parent().next();
				if ($(this).attr('checked')) {
					div.slideDown();
				}
				else if (div.css('display') != 'none') {
					div.slideUp();
				}
			}
		);
		
		custom_checkbox.each(function() {
			div = $(this).parent().next();
			if (!$(this).attr('checked')) {
				div.hide();
			} else {
				div.show();
			}
		});
	}
	
	function jqROund(a) {
	 return Math.round(a);
	}
	
	$(window).resize(function() {
		listBackgroundw = $(".md-wrap").width() - 300;
		$(".md-listBackground").width(listBackgroundw);
	});

});