$(document).ready(function () {
    $('.btn-block.m-t').click(function () {
        $('.pd-top-content .row .col-lg-3:hidden').slice(0, 8).show();
        if ($('.pd-top-content .row .col-lg-3').length == $('.pd-top-content .row .col-lg-3:visible').length) {
            $('.btn-block.m-t').hide();
        }
    });
    $('#side-menu .user-picture img').addClass('img-circle');
    
    //fix custom exposed filter
    $('#edit-field-job-level-tid').addClass('chosen-select form-control');
    $('#edit-field-job-level-tid').attr("tabindex","4");
    $('#edit-field-job-level-tid').attr("data-placeholder","Choose a Job level...");
    
    $('#edit-field-role-department-tid').addClass('chosen-select form-control');
    $('#edit-field-role-department-tid').attr("tabindex","4");
    $('#edit-field-role-department-tid').attr("data-placeholder","Role / Department");
    
    $('#edit-field-skills-tid').addClass('chosen-select form-control');
    $('#edit-field-skills-tid').attr("tabindex","4");
    $('#edit-field-skills-tid').attr("data-placeholder","Choose a skill...");
    
    $('#edit-submit-candidate-search').addClass('btn  btn-primary');
    $('#edit-submit-candidate-search').attr("value",'Search');
    $('<a class="btn btn-link  " data-toggle="button" type="button" id="adv-search-btn"><i class="fa fa-plus"></i>&nbsp;Advance Search</a>').insertAfter("#edit-submit-candidate-search");
    
    $('#edit-submit-candidate-search-top').addClass('btn  btn-primary');
    $('#edit-submit-candidate-search-top').attr("value",'Search');
    $('<a class="btn btn-link  " data-toggle="button" type="button" id="adv-search-btn"><i class="fa fa-plus"></i>&nbsp;Advance Search</a>').insertAfter("#edit-submit-candidate-search-top");
    
    $('#views-exposed-form-candidate-search-top-page').attr('action',Drupal.settings.basePath+'candidate-search');
    
    $('#edit-field-job-title-tid').addClass('form-control');
    $("#edit-field-job-title-tid option:first").text("Job title");
    
    $('#edit-field-specialization-tid').addClass('form-control');
    $("#edit-field-specialization-tid option:first").text("Specialization");
    
    $('#edit-field-certification-tid').addClass('form-control');
    $("#edit-field-certification-tid option:first").text("Certification");
    
    $('#edit-field-technology-tid').addClass('form-control');
    $("#edit-field-technology-tid option:first").text("Technology");
    
    $('#edit-field-experience-tid').addClass('form-control');
    $("#edit-field-experience-tid option:first").text("Experience");
    
    $('#edit-field-expertise-tid').addClass('form-control');
    $("#edit-field-expertise-tid option:first").text("Expertise");
    
    //style paging
    $('.pager').replaceWith('<div class="pager1 btn-group">' + $('.pager').html() +'</div>');
    $('.pager1 li').wrap('<button class="btn btn-white"></button>');
    $('.pager-current').parent('button').addClass('active');
    
    //set all advanced select to display none
    $('.grid-3').addClass("hide");
    $('.grid-4').addClass("hide");
    $('.grid-5').addClass("hide");
    $('.grid-6').addClass("hide");
    $('.grid-7').addClass("hide");
    $('.grid-8').addClass("hide");
    
    $('#adv-search-btn').click(function(){
        //$('#adv-search').toggleClass('hide');
        $('.grid-3').toggleClass("hide");
        $('.grid-4').toggleClass("hide");
        $('.grid-5').toggleClass("hide");
        $('.grid-6').toggleClass("hide");
        $('.grid-7').toggleClass("hide");
        $('.grid-8').toggleClass("hide");
    });

    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"100%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    $('.contact-btn').click(function(){
        swal({
            title: "Want to contact Nicki Smith? ",
//            text: "Write your message:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something to the candidate"
        },
        function(inputValue){
           if (inputValue === false) return false;
           if (inputValue === "") {     swal.showInputError("You need to write something!");
                return false
           }
            swal("Nice!", "Following message was sent to the candidate...\n " + inputValue , "success");
        });
    });
    $('.save-search-btn').click(function(){
        swal({
            title: "Want to save this search result? ",
//            text: "Write your message:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Give it a name here"
        },
        function(inputValue){
           if (inputValue === false) return false;
           if (inputValue === "") {     swal.showInputError("You need to give this search a name");
                return false
           }
            swal("Great!", "Your search " + inputValue + " was saved." , "success");
        });
    });

    $('.save-btn').click(function(){
        var $this = $(this);

        if($this.hasClass('active')){
                toastr.warning("removed from your wishlist...", "Nicki Smith");
        }else{
            toastr.success("added to your wishlist...", "Nicki Smith");
        }

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "1000",
            "timeOut": "7000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
    
    //var follow_string = $('.follow-btn a').html();
    //$('.follow-btn a').text( "Follow" );
    //$('a .flagged').text( "Stop Follow" );
    //alert(follow_string);
    
});

