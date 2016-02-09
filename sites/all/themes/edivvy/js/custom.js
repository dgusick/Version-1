$(document).ready(function () {
    var recruiter_per_page = 8;
    
    $(window).load(function() {
        var count_visible_recruiters = $('.pd-top-content .row .col-lg-3').length;

        if(count_visible_recruiters<recruiter_per_page)
        {
            $('.btn-block.m-t').hide();
        }
    });
    
    $('.btn-block.m-t').click(function () {
        $('.pd-top-content .row .col-lg-3:hidden').slice(0, recruiter_per_page).show();
        if ($('.pd-top-content .row .col-lg-3').length == $('.pd-top-content .row .col-lg-3:visible').length) {
            $('.btn-block.m-t').hide();
        }
    });
    
    var item_perpage = 9;
    
    $(window).load(function() {
        var count_visible_items = $('.contact-box-content .row .col-lg-4').length;

        if(count_visible_items<item_perpage)
        {
            $('.btn-block.m-t.btn-read-more').hide();
        }
    });
    
    $('.btn-block.m-t.btn-read-more').click(function () {
        $('.contact-box-content .row .col-lg-4:hidden').slice(0, item_perpage).show();
        if ($('.contact-box-content .row .col-lg-4').length == $('.contact-box-content .row .col-lg-4:visible').length) {
            $('.btn-block.m-t.btn-read-more').hide();
        }
    });
    
    
    $('#side-menu .user-picture img').addClass('img-circle');
    
    //fix custom exposed filter
   
  //  $('#edit-field-zip-code').addClass('chosen-select form-control');
  //  $('#edit-field-zip-code').attr("tabindex","4");
    $('#edit-field-zip-code').attr("placeholder","Zip Code");
    
   
    $('#edit-field-city').addClass('chosen-select form-control');
    $('#edit-field-city').attr("tabindex","4");
    $('#edit-field-city').attr("data-placeholder","City");
    
    $('#edit-field-job-level-tid').addClass('chosen-select form-control');
    $('#edit-field-job-level-tid').attr("tabindex","4");
    $('#edit-field-job-level-tid').attr("data-placeholder","Choose a Job level...");
    
    $('#edit-field-role-department-tid').addClass('chosen-select form-control');
    $('#edit-field-role-department-tid').attr("tabindex","4");
    $('#edit-field-role-department-tid').attr("data-placeholder","Role / Department");
    
    
    $('#edit-field-skills-tid').addClass('chosen-select form-autocomplete');
    $('#edit-field-skills-tid').attr("tabindex","4");
    $('#edit-field-skills-tid').attr("data-placeholder","Choose a skill...");
    
    $('#edit-submit-candidate-search').addClass('btn  btn-primary');
    $('#edit-submit-candidate-search').attr("value",'Search');
    
    $('<a class="btn btn-link  " data-toggle="button" type="button" id="adv-search-btn"><i class="fa fa-plus"></i>&nbsp;Advance Search</a>').insertAfter("#edit-submit-candidate-search");
    
     $('<a class="btn btn-link  " data-toggle="button" type="button" id="adv-search-btn"><i class="fa fa-plus"></i>&nbsp;Advance Search</a>').insertAfter("#edit-submit-searchapi-candidate");
    
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
    
    $('#edit-field-role-department').addClass('chosen-select form-control');
    $('#edit-field-role-department').attr("tabindex","4");
    $('#edit-field-role-department').attr("data-placeholder","Role / Department");
    
    $('#edit-field-experience').addClass('chosen-select form-control');
    $('#edit-field-experience').attr("tabindex","4");
    $('#edit-field-experience').attr("data-placeholder","Years of Experience"); 
    
    $('#edit-field-job-level').addClass('chosen-select form-control');
    $('#edit-field-job-level').attr("tabindex","4");
    $('#edit-field-job-level').attr("data-placeholder","Choose a Job level..."); 
    
    $('#edit-field-degree-type').addClass('chosen-select form-control');
    $('#edit-field-degree-type').attr("tabindex","4");
    $('#edit-field-degree-type').attr("data-placeholder","Degree Type"); 
    
    $('#edit-field-company-size').addClass('chosen-select form-control');
    $('#edit-field-company-size').attr("tabindex","4");
    $('#edit-field-company-size').attr("data-placeholder","Company size");
    
    $('#edit-field-industry').addClass('chosen-select form-control');
    $('#edit-field-industry').attr("tabindex","4");
    $('#edit-field-industry').attr("data-placeholder","Industry ");
    
    $('#edit-profile-evaluation-field-skills-rating-field-skills').addClass('chosen-select form-control');
    $('#edit-profile-evaluation-field-skills-rating-field-skills').attr("tabindex","4");
    $('#edit-profile-evaluation-field-skills-rating-field-skills').attr("data-placeholder","Choose a skill...");
    
    $('#edit-field-job-title').addClass('form-control');
    $("#edit-field-job-title option:first").text("Job title");
    
    $('#edit-field-specialization').addClass('form-control');
    $("#edit-field-specialization option:first").text("Specialization");
    
    $('#edit-field-certification').addClass('form-control');
    $("#edit-field-certification option:first").text("Certification");
    
    $('#edit-field-expertise').addClass('form-control');
    $("#edit-field-expertise option:first").text("Expertise");
    
    $('#edit-field-technology').addClass('form-control');
    $("#edit-field-technology option:first").text("Technology");
    
    $('#edit-field-experience').addClass('form-control');
    $("#edit-field-experience option:first").text("Experience");
    
    $('#edit-submit-searchapi-candidate').addClass('btn  btn-primary');
    $('#edit-submit-searchapi-candidate').attr("value",'Search');
    
    //style paging
    $('.pager').replaceWith('<div class="pager1 btn-group">' + $('.pager').html() +'</div>');
    $('.pager1 li').wrap('<div class="btn btn-white"></div>');
    $('.pager-current').parent('div').addClass('active');
    
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

    $('.views-widget-filter-field_job_title').addClass("hide");
    $('.views-widget-filter-field_specialization').addClass("hide");
    $('.views-widget-filter-field_certification').addClass("hide");
    $('.views-widget-filter-field_expertise').addClass("hide");
    $('.views-widget-filter-field_technology').addClass("hide");
    $('.views-widget-filter-field_company_size').addClass("hide");
    $('.views-widget-filter-field_college_university').addClass("hide");
    $('.views-widget-filter-field_degree_type').addClass("hide");
    $('.views-widget-filter-field_company_past').addClass("hide");
    $('.views-widget-filter-field_company_present').addClass("hide"); 
    $('.views-widget-filter-field_interests').addClass("hide");        
    $('.views-widget-filter-field_city').addClass("hide"); 
    $('.views-widget-filter-field_industry').addClass("hide"); 
  //  $('.views-widget-filter-field_experience').addClass("hide"); 
    $('.views-widget-sort-by').addClass("hide");
    $('.views-widget-sort-order').addClass("hide");
    $('.views-widget-filter-profile_main').addClass("hide"); 
    $('.views-widget-filter-profile_main_field_skills_rating').addClass("hide"); 
    $('.views-widget-filter-field_role_department').addClass("hide"); 
    $('.views-widget-filter-field_certification').addClass("hide");
    $('.views-widget-filter-field_specialization').addClass("hide");
    $('.views-widget-filter-field_job_level').addClass("hide");
    
    
    $('#adv-search-btn').click(function(){
        //$('#adv-search').toggleClass('hide');
     //   $('.views-widget-filter-field_city').toggleClass("hide");
        $('.views-widget-filter-field_job_title').toggleClass("hide");
        $('.views-widget-filter-field_expertise').toggleClass("hide");
        $('.views-widget-filter-field_technology').toggleClass("hide");  
        $('.views-widget-filter-field_company_size').toggleClass("hide");
    	$('.views-widget-filter-field_college_university').toggleClass("hide");
        $('.views-widget-filter-field_degree_type').toggleClass("hide");
        $('.views-widget-filter-field_company_past').toggleClass("hide");
        $('.views-widget-filter-field_company_present').toggleClass("hide"); 
        $('.views-widget-filter-field_interests').toggleClass("hide");
        $('.views-widget-filter-field_city').toggleClass("hide");
         $('.views-widget-filter-field_industry').toggleClass("hide");
     //   $('.views-widget-filter-field_specialization').toggleClass("hide");
     //   $('.views-widget-filter-field_certification').toggleClass("hide");
     //	$('.views-widget-filter-field_experience').toggleClass("hide");
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
    
    //Styling checkbox
    $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            //$('.summernote').summernote();

        });
        var edit = function() {
            //$('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    
    //adding title suffix
    $(".page-recruiter-list #page-title").after('<span class="text-muted">You can follow recruiters to be notified of new profiles</span>');
    $(".page-candidate-search #page-title").after('<span class="text-muted">Choose a Title, A Skill, and Location</span>');
    $(".page-candidate-search-top #page-title").after('<span class="text-muted">Choose a Title, A Skill, and Location</span>');
    
    $(".page-searchapi-candidate #page-title").after('<span class="text-muted">Choose a Title, A Skill, and Location</span>');

    
    //Fix layout candidate register page
    $(".page-candidate-register").addClass("gray-bg");
    $(".page-candidate-login").addClass("gray-bg");
    
    //Fix change Login link of candidate register to candidate login
    $(".page-candidate-register .btn-white").attr('href',Drupal.settings.basePath+'candidate/login');
    
    //Fix Firefox issue of pagination button
    $(".page-candidate-search .pager1 button").removeClass("btn");
    
    //var follow_string = $('.follow-btn a').html();
    //$('.follow-btn a').text( "Follow" );
    //$('a .flagged').text( "Stop Follow" );
    //alert(follow_string);
    
});

