/**
 * Created by Cris on 3/4/14.
 */
(function($){
    // Define each preview wrapper
    var baseUrl = Drupal.settings.baseUrl,
        container,
        click,
        working,
        preview,
        multi = false,
        id,
        dataid,
        sortable,
        order,
        target,
        action,
        prepareWrap,
        dialog,
        popup,
        number,
        newnum,
        maxnum,
        str,
        newstr,
        hiddenOrder,
        hiddenNum,
        data = new Array(),
        wrapItem = $('<li class="draggable-item sortable-item toggle-item"></li>'),
        returnData;
    jQuery(document).ready(function(){
        // First Push number of each content to array
        for(var i=1;i<=7;i++){
            data["pr_"+i+"_skills_preview"] = [];
            $("#pr_"+i+"_skills_preview").find("li.sortable-item").each(function(){
                data["pr_"+i+"_skills_preview"].push(parseInt($(this).attr("data-num"),10));
            });
            if(data["pr_"+i+"_skills_preview"].length <=1 ) {
                $("#pr_"+i+"_skills_preview").find(".remove").hide();
            }
            data["pr_"+i+"_connect_preview"] = [];
            $("#pr_"+i+"_connect_preview").find("li.sortable-item").each(function(){
                data["pr_"+i+"_connect_preview"].push(parseInt($(this).attr("data-num"),10));
            });
            if(data["pr_"+i+"_connect_preview"].length <=1 ) {
                $("#pr_"+i+"_connect_preview").find(".remove").hide();
            }
            data["pr_"+i+"_number_preview"] = [];
            $("#pr_"+i+"_number_preview").find("li.sortable-item").each(function(){
                data["pr_"+i+"_number_preview"].push(parseInt($(this).attr("data-num"),10));
            });
            if(data["pr_"+i+"_number_preview"].length <=1 ) {
                $("#pr_"+i+"_number_preview").find(".remove").hide();
            }
            data["pr_"+i+"_customer_preview"] = [];
            $("#pr_"+i+"_customer_preview").find("li.sortable-item").each(function(){
                data["pr_"+i+"_customer_preview"].push(parseInt($(this).attr("data-num"),10));
            });
            if(data["pr_"+i+"_customer_preview"].length <=1 ) {
                $("#pr_"+i+"_customer_preview").find(".remove").hide();
            }
            data["pr_"+i+"_overview_preview"] = [];
            $("#pr_"+i+"_overview_preview").find("li.sortable-item").each(function(){
                data["pr_"+i+"_overview_preview"].push(parseInt($(this).attr("data-num"),10));
            });
            if(data["pr_"+i+"_overview_preview"].length <=1 ) {
                $("#pr_"+i+"_overview_preview").find(".remove").hide();
            }
        }
        data["hd_vd_slide_preview"] = [];
        $("#hd_vd_slide_preview").find("li.sortable-item").each(function(){
            data["hd_vd_slide_preview"].push(parseInt($(this).attr("data-num"),10));
        });
        if(data["hd_vd_slide_preview"].length <=1 ) {
            $("#hd_vd_slide_preview").find(".remove").hide();
        }
        data["hd_slide_preview"] = [];
        $("#hd_slide_preview").find("li.sortable-item").each(function(){
            data["hd_slide_preview"].push(parseInt($(this).attr("data-num"),10));
        });
        if(data["hd_slide_preview"].length <=1 ) {
            $("#hd_slide_preview").find(".remove").hide();
        }
        data["hd_pt_slide_preview"] = [];
        $("#hd_pt_slide_preview").find("li.sortable-item").each(function(){
            data["hd_pt_slide_preview"].push(parseInt($(this).attr("data-num"),10));
        });
        if(data["hd_pt_slide_preview"].length <=1 ) {
            $("#hd_pt_slide_preview").find(".remove").hide();
        }
        data["ft_social_preview"] = [];
        $("#ft_social_preview").find("li.sortable-item").each(function(){
            data["ft_social_preview"].push(parseInt($(this).attr("data-num"),10));
        });
        if(data["ft_social_preview"].length <=1 ) {
            $("#ft_social_preview").find(".remove").hide();
        }
		data["ft_detail_preview"] = [];
        $("#ft_detail_preview").find("li.sortable-item").each(function(){
            data["ft_detail_preview"].push(parseInt($(this).attr("data-num"),10));
        });
        if(data["ft_detail_preview"].length <=1 ) {
            $("#ft_detail_preview").find(".remove").hide();
        }
        // Sortable all element needed
        $(".sortable").each(function(){
            var $self = $(this);
            $(this).sortable({
                create: function() {
                    order = $(this).sortable('toArray');
                    $self.parent().parent().parent().parent().find(".hidden-order").val(order.join('|'));
                },
                update: function() {
                    order = $(this).sortable('toArray');
                    $self.parent().parent().parent().parent().find(".hidden-order").val(order.join('|'));
                },
                scrollSpeed: 100
            })
        });
        clickAdd();
        removeObj();
        /*---------------- Function Define ---------------------------------
         --------------------------------------------------------------------
         */
        function createPop() {
            $("#popup-"+id).dialog({
                title: action+" Dialog",
                modal:true,
                resizable: false,
                draggable: false,
                width: 800,
                height: 400,
                autoOpen:false,
                position: [($(window).width()-800)/2, ($(window).height()-400)/2],
                open: function() {
                    openPop();
                    $(this).find("input.form-submit").hide(); // Hide edit and remove button
                },
                close: function() {
                    closePop();
                },
                buttons: [{
                    text: "Done",
                    click: function() {
                        finishPop();
                        $(this).dialog( "close" ); // Close dialog
                        $(this).dialog("destroy").remove();
                    }
                }]
            });
        }
        function clickAdd() {
            // Add more object
            $('.add-more').unbind("click").click(function(event){
                action = 'add';
                container = $(this).parent().parent(); // Working object for this type action
                sortable = container.find(".sortable");
                working = $(this).parent().parent().find(".data-container").attr("id");
                hiddenOrder = container.find(".hidden-order"); // Hidden sort order data
                console.log(hiddenOrder);
                hiddenNum = container.find(".hidden-num");
                $(this).attr("data-max-num",Math.max.apply(Math, data[working])); // Push max number for get correct content
                number = parseInt($(this).attr("data-max-num"),10);
                newnum = number+1;
                click = $(this);
                target = $(this).attr("href");
                preview = $("#"+$(this).attr("data-preview"));
                popup = preview.find(".popup-wrapper");
                id = target.substr(1);
                str = new RegExp("no"+number,'g'); // Current number
                newstr = "no"+newnum; // New number
                prepareWrap = $("[data-id="+id+"]").clone(); // Get new html with new number
                prepareWrap.find("input.form-text").each(function(){
                    $(this)[0].setAttribute("value",""); // set current value
                });
                var html = prepareWrap.html().replace(str,newstr);
                prepareWrap.html('<li data-id="'+id.replace(str,newstr)+'" data-num="'+newnum+'" class="draggable-item sortable-item toggle-item">'+html+'</li>'); // Prepare new html
                filestyle();
                preview.find(".sortable").append($('<li id="'+id.replace(str,newstr)+'" data-id="'+id.replace(str,newstr)+'" data-num="'+newnum+'" class="draggable-item sortable-item toggle-item">'+html+'</li>')); // Append to preview
                data[working].push(newnum);
                click.attr('data-max-num',Math.max.apply(Math, data[working])); //  Change max num
                click.attr('href',target.replace(str,newstr)); // Change click target
                // Build new sort for new element
                var newSort = $(sortable);
                $(newSort).sortable({
                    update: function() {
                        order = $(this).sortable('toArray');
                        hiddenOrder.val(order.join('|'));
                    },
                    create: function( event, ui ) {
                        order = $(this).sortable('toArray');
                        hiddenOrder.val(order.join('|'));
                    }
                });
                order = $(newSort).sortable('toArray');

                hiddenOrder.val(order.join('|'));
                hiddenNum.val(Math.max.apply(Math, data[working]));

                $('a[rel*=leanModal]').leanModal({ top : 100, closeButton: ".fake-icon" });
                clickIcon();
                preview.find(".remove").show();
                removeObj();
                event.preventDefault();
            });
        }
        function removeObj() {
            $(".remove").unbind("click").click(function(event){
                // Need to remove from number data array
                container = $(this).parent().parent().parent().parent().parent().parent();
                sortable = container.find(".sortable");
                working = container.attr("id");
                click = container.parent().find('.add-more');
                hiddenOrder = container.find(".hidden-order"); // Hidden sort order data
                hiddenNum = container.find(".hidden-num");
                console.log(data[working]);
                var index = data[working].indexOf(parseInt($(this).parent().parent().attr("data-num"),10));
                if(index > -1){
                    data[working].splice(index,1);
                }
                var currId = $(this).parent().parent().attr("data-id");
                var newHref = currId.replace("no"+parseInt($(this).parent().parent().attr("data-num"),10),"no"+Math.max.apply(Math, data[working]));
                console.log(data[working]);
                if(data[working].length <=1) {
                    container.find(".remove").hide();
                }
                click.attr('data-max-num',Math.max.apply(Math, data[working])); // New max num for click object
                click.attr('href',"#"+newHref); // New click target

                $(this).parent().parent().remove(); // Remove object
                var newSort = $(sortable);
                $(newSort).sortable({
                    update: function() {
                        order = $(this).sortable('toArray');
                        hiddenOrder.val(order.join('|'));
                        console.log(order);
                    },
                    create: function( event, ui ) {
                        order = $(this).sortable('toArray');
                        hiddenOrder.val(order.join('|'));
                    }
                });
                order = $(newSort).sortable('toArray');
                console.log(order);
                hiddenOrder.val(order.join('|'));
                hiddenNum.val(Math.max.apply(Math, data[working]));
                event.preventDefault();
            });
        }
        function updateSortable(newSort) {
            $(newSort).sortable({
                update: function() {
                    order = $(this).sortable('toArray');
                },
                create: function( event, ui ) {
                    order = $(this).sortable('toArray');
                }
            });
            $(newSort).bind( "sortupdate", function( event, ui ) {
                order = $(this).sortable('toArray');
            } );

        }
        function openPop() {

        }
        function closePop(){
            $('.popup-overlay').hide();
            sortable.find("input.form-submit").show()
            popup.html('');
            $(this).dialog("destroy").remove();
        }
        function finishPop() {
            if(action == "add") {
                addObj();
            } else {
                editObj();
            }
            updateSortable();
            clickAdd();
            removeObj();
        }
        // Fake icon select
        jQuery(document).ready(function($){
            $('a[rel*=leanModal]').leanModal({ top : 100,overlay : 0.4, closeButton: ".fake-icon" });
            loadfakeIcon(null);
            clickIcon();
        });
        function loadfakeIcon (eventObj) {
            var iconFakeMarkUp = Drupal.settings.iconFakeMarkUp;
            if(eventObj == null) {
                $(".icon-select").each(function(){
                    var id = $(this).attr("id");
                    var fakeMarkup = '<div id="icon-wrapper">' +
                        '<span><h4>Choose Icon</h4></span>' +
                        '<span><a id="choose-icon" rel="leanModal" name="icon-markup" href="#'+id+'-icon"><div class="icon-preview"><i class="fontello icon-replace icon-plus"></i></div></a></span>' +
                        '</div><div id="'+id+'-icon" class="icon-markup">'+iconFakeMarkUp+'</div>';
                    $(this).after(fakeMarkup);
                    var optSelect = $(this).find(".form-select option:selected");
                    var arrIconValue = optSelect.val().split("|");
                    optSelect.parent().parent().parent().parent().parent().next().find(".icon-replace").replaceWith('<i class="'+arrIconValue[0]+' icon-replace '+arrIconValue[1]+'"></i>')
                });
                $('a[rel*=leanModal]').leanModal({ top : 100,overlay : 0.4, closeButton: ".fake-icon" });
                $(".icon-select").hide();
            } else {

                var id = eventObj.attr("id");
                console.log(id);
                var fakeMarkup = '<div id="icon-wrapper">' +
                    '<span><h4>Choose Button Icon</h4></span>' +
                    '<span><a id="choose-icon" rel="leanModal" name="icon-markup" href="#'+id+'-icon"><div class="icon-preview"><i class="fontello icon-replace icon-plus"></i></div></a></span>' +
                    '</div><div id="'+id+'-icon" class="icon-markup">'+iconFakeMarkUp+'</div>';
                eventObj.after(fakeMarkup);
                var optSelect = eventObj.find('.form-select option:selected');
                var arrIconValue = optSelect.val().split("|");
                optSelect.parent().parent().parent().parent().parent().next().find(".icon-replace").replaceWith('<i class="'+arrIconValue[0]+' icon-replace '+arrIconValue[1]+'"></i>');
                $('a[rel*=leanModal]').leanModal({ top : 100, closeButton: ".fake-icon" });
                eventObj.hide();
            }
            clickIcon();

        }
        function clickIcon() {
            $(".fake-icon").unbind("click").click(function(){
                var iconValue = $(this).attr("data-icon");
                var iconName = $(this).attr("icon-name");
                var newIcon = '<i class="fontello icon-replace '+iconName+'"></i>';
                $(this).parent().parent().parent().prev().find('.icon-preview .icon-replace').replaceWith(newIcon);
                $(this).parent().parent().parent().prev().prev().find('.form-select option[value="'+iconValue+'"]').attr('selected',true);
            })
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
    });
})(jQuery)
