var app = new Vue({
  el: '#main',
  data: {
    typeOfBusiness:0,
    sizeOfMarketingTeam:0,
    type_of_business:'',
    size_of_marketing_team:'',
    website_url:'',
    ///////////////////////
    blogCost: 0,
    blogHour:0,
    blogSingleHour: 0,
    blogSingleCost: 0,
    blog_quantity:0,
    infoGraphCost: 0,
    infoGraphHour:0,
    contentHour:0,
    contentCost:0,
    how_many_blogs:'',
    number_of_words:'',
    infographic:'',
    ////////////////////////
    WebHour : 0,
    WebCost: 0,
    webManagentCost: 0,
    webManagentHour: 0,
    webDesignCost: 0,
    webDesignHour: 0,
    seoCost: 0,
    seoHour: 0,
    number_of_webpages:'',
    webpage_design:'',
    seo_ranking:'',
    //////////////////////
    smChannelHour:0,
    smChannelCost:0,
    smPostHour:0,
    smPostCost:0,
    templatedPostDecrease:0,
    smoCost: 0,
    smoHour: 0,
    social_media_channels:'',
    number_of_posts:'',
    smo_design_type:'',
    ////////
    emailNewsHour: 0,
    emailNewsCost: 0,
    emailAutomationHour: 0,
    emailAutomationCost: 0,
    emailCrmHour: 0,
    emailCrmCost: 0,
    emailCost:0,
    emailHour:0,
    email_newsletter:'',
    email_automation:'',
    crm:'',
    //////////
    fbAdcost:0,
    fbAddHour:0,
    googleAdcost:0,
    googleAdHour:0,
    linkedinAdcost:0,
    linkedinAdHour:0,
    msAdcost:0,
    msAdHour:0,
    adSpendPercent:0,
    adSpentOperator:0,
    adCampCost:0,
    adCampHour:0,
    ad_spend:'',
    facebookAds:'',
    google_ads:'',
    linkedin_ads:'',
    microsoft_ads:'',
    //////////
    lkdnOutreachHour:0,
    lkdnOutreachCost:0,
    salesOutreachCost:0,
    salesOutreachHour:0,
    linkedin_out_reach:'',
    //////////
    freequencyHour: 0,
    freequencyCost: 0,
    modeOfMeeting: 0,
    projectManagementCost:0,
    projectManagementhour:0,
    frequency:'',
    modeOfMeetings:'',

    //////
    partialTotalHour: 0,
    totalCost:0

  },
  computed: {
    caluculateHour: function () {
      this.partialTotalHour = this.contentHour + this.WebHour + this.smoHour + this.emailHour + this.adCampHour + this.salesOutreachHour + this.projectManagementhour
      return this.partialTotalHour;
    },
    caluculateCost: function () {
      this.totalCost = this.contentCost + this.WebCost + this.smoCost + this.emailCost + this.adCampCost + this.salesOutreachCost + this.projectManagementCost
      var increasePercentage = this.typeOfBusiness + this.sizeOfMarketingTeam;
      console.log(this.totalCost);
      var percents = this.totalCost * increasePercentage / 100;
      return this.totalCost + percents;
    },
    averageRate: function(){
      this.totalCost = this.contentCost + this.WebCost + this.smoCost + this.emailCost + this.adCampCost + this.salesOutreachCost + this.projectManagementCost
      var increasePercentage = this.typeOfBusiness + this.sizeOfMarketingTeam;
      console.log(this.totalCost);
      var percents = this.totalCost * increasePercentage / 100;
      var average = this.totalCost + percents;
      this.partialTotalHour = this.contentHour + this.WebHour + this.smoHour + this.emailHour + this.adCampHour + this.salesOutreachHour + this.projectManagementhour
      var totalhour = this.partialTotalHour;
      return (average / totalhour).toFixed(2);
    },
    savingRate: function(){
      return (this.partialTotalHour * 60) - this.totalCost;
    }
  },
  methods: {
    typeOfBusinessF: function (percent,value) {
      this.typeOfBusiness = percent;
      console.log(this.typeOfBusiness);
      this.type_of_business = value;
    },
    sizeOfMarketingTeamF: function (percent, value) {
      this.size_of_marketing_team = value;
      this.sizeOfMarketingTeam = percent;
      console.log(this.sizeOfMarketingTeam);
    },
    ////////////////////////////
    contentQty: function (val, value) {
      this.how_many_blogs = value;
      var this_hr = 0;
      this.blog_quantity = val;
      this_hr = this.blogSingleHour;
      this_cost = this.blogSingleCost;
      this.blogHour = this_hr * val;
      this.blogCost = this_cost * val;
      this.contentHour = this.blogHour + this.infoGraphHour;
      this.contentCost = this.blogCost + this.infoGraphCost;
    },
    contentWords: function (cost, hr, value) {
      this.number_of_words = value;
      var this_hr = 0;
      this.blogSingleHour = hr;
      this.blogSingleCost = cost;
      this.blogHour = this.blogSingleHour * this.blog_quantity;
      this.blogCost = this.blogSingleCost * this.blog_quantity;
      this.contentHour = this.blogHour + this.infoGraphHour;
      this.contentCost = this.blogCost + this.infoGraphCost;
    },
    infoGraph: function (cost, hr, qty) {
      this.infographic = qty;
      var this_hr = 0;
      this.infoGraphCost = cost * qty;
      this.infoGraphHour = hr * qty;
      this.contentHour = this.blogHour + this.infoGraphHour;
      this.contentCost = this.blogCost + this.infoGraphCost;
    },
    //////////////////////////
    webManagement: function (cost, hr, value) {
      this.number_of_webpages = value;
      this.webManagentCost = cost;
      this.webManagentHour = hr;
      this.WebHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      this.WebCost = this.webManagentCost + this.webDesignCost + this.seoCost;
    },
    webDesign: function (cost, hr, qty, value) {
      this.webpage_design = value;
      this.webDesignCost = cost * qty;
      this.webDesignHour = hr * qty;
      this.WebHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      this.WebCost = this.webManagentCost + this.webDesignCost + this.seoCost;
    },
    seo: function (cost, hr, value) {
      this.seo_ranking = value;
      this.seoCost = cost;
      this.seoHour = hr;
      this.WebHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      this.WebCost = this.webManagentCost + this.webDesignCost + this.seoCost;
    },
    /////////////////////////
    smoChannels: function (hr, cost, value) {
      this.social_media_channels = value;
      this.smChannelCost = cost;
      this.smChannelHour = hr;
      // this.smoHour = this.smChannelHour + this.smPostHour;
      var totalCost = this.smChannelCost + this.smPostCost;
      var totalPercent = totalCost * this.templatedPostDecrease / 100;
      this.smoCost = totalCost - totalPercent;

      var percentHour = this.smChannelHour + this.smPostHour;
      var totalPercentHour = percentHour * this.templatedPostDecrease / 100;
      this.smoHour = Math.round(percentHour - totalPercentHour);
    },
    smoPosts: function (hr, cost, value) {
      this.number_of_posts = value;
      this.smPostCost = cost;
      this.smPostHour = hr;
      // this.smoHour = this.smChannelHour + this.smPostHour;
      var totalCost = this.smChannelCost + this.smPostCost;
      var totalPercent = totalCost * this.templatedPostDecrease / 100;
      this.smoCost = totalCost - totalPercent;

      var percentHour = this.smChannelHour + this.smPostHour;
      var totalPercentHour = percentHour * this.templatedPostDecrease / 100;
      this.smoHour = Math.round(percentHour - totalPercentHour);
    },
    smoTemplate: function (percent, value) {
      this.smo_design_type = value;
      this.templatedPostDecrease = percent;
      // this.smoHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      var totalCost = this.smChannelCost + this.smPostCost;
      var totalPercent = totalCost * this.templatedPostDecrease / 100;
      this.smoCost = totalCost - totalPercent;

      var percentHour = this.smChannelHour + this.smPostHour;
      var totalPercentHour = percentHour * this.templatedPostDecrease / 100;
      this.smoHour = Math.round(percentHour - totalPercentHour);
    },
    ////////////////////////////////////
    newLetter: function (cost, hr, qty, value) {
      this.email_newsletter = value;
      this.emailNewsCost = cost * qty;
      this.emailNewsHour = hr * qty;
      this.emailHour = this.emailNewsHour + this.emailAutomationHour + this.emailCrmHour;
      this.emailCost = this.emailNewsCost + this.emailAutomationCost + this.emailCrmCost;
    },
    emailAutomation: function (cost, hr, value) {
      this.email_automation = value;
      this.emailAutomationCost = cost;
      this.emailAutomationHour = hr;
      this.emailHour = this.emailNewsHour + this.emailAutomationHour + this.emailCrmHour;
      this.emailCost = this.emailNewsCost + this.emailAutomationCost + this.emailCrmCost;
    },
    emailCrm: function (cost, hr, value) {
      this.crm = value;
      this.emailCrmCost = cost;
      this.emailCrmHour = hr;
      this.emailHour = this.emailNewsHour + this.emailAutomationHour + this.emailCrmHour;
      this.emailCost = this.emailNewsCost + this.emailAutomationCost + this.emailCrmCost;
    },
    ///////////////////////////////////
    fbAds: function (cost, hr, qty, value) {
      this.facebookAds = value;
      this.fbAdcost = cost * qty;
      this.fbAddHour = hr * qty;
      var totalCost = this.fbAdcost + this.googleAdcost + this.linkedinAdcost + this.msAdcost;
      var totalPercent = totalCost * this.adSpendPercent / 100;
      if(this.adSpentOperator == 0){
        this.adCampCost = totalCost - totalPercent;
      } else if(this.adSpentOperator == 1){
        this.adCampCost = totalCost + totalPercent;
      }
      this.adCampHour = this.fbAddHour + this.googleAdHour + this.linkedinAdHour + this.msAdHour;
    },
    googleAds: function (cost, hr, qty, value) {
      this.google_ads = value;
      this.googleAdcost = cost * qty;
      this.googleAdHour = hr * qty;
      var totalCost = this.fbAdcost + this.googleAdcost + this.linkedinAdcost + this.msAdcost;
      var totalPercent = totalCost * this.adSpendPercent / 100;
      if(this.adSpentOperator == 0){
        this.adCampCost = totalCost - totalPercent;
      } else if(this.adSpentOperator == 1){
        this.adCampCost = totalCost + totalPercent;
      }
      this.adCampHour = this.fbAddHour + this.googleAdHour + this.linkedinAdHour + this.msAdHour;
    },
    linkedinAds: function (cost, hr, qty, value) {
      this.linkedin_ads = value;
      this.linkedinAdcost = cost * qty;
      this.linkedinAdHour = hr * qty;
      var totalCost = this.fbAdcost + this.googleAdcost + this.linkedinAdcost + this.msAdcost;
      var totalPercent = totalCost * this.adSpendPercent / 100;
      if(this.adSpentOperator == 0){
        this.adCampCost = totalCost - totalPercent;
      } else if(this.adSpentOperator == 1){
        this.adCampCost = totalCost + totalPercent;
      }
      this.adCampHour = this.fbAddHour + this.googleAdHour + this.linkedinAdHour + this.msAdHour;
    },
    microsoftAds: function (cost, hr, qty, value) {
      this.microsoft_ads = value;
      this.msAdcost = cost * qty;
      this.msAdHour = hr * qty;
      var totalCost = this.fbAdcost + this.googleAdcost + this.linkedinAdcost + this.msAdcost;
      var totalPercent = totalCost * this.adSpendPercent / 100;
      if(this.adSpentOperator == 0){
        this.adCampCost = totalCost - totalPercent;
      } else if(this.adSpentOperator == 1){
        this.adCampCost = totalCost + totalPercent;
      }
      this.adCampHour = this.fbAddHour + this.googleAdHour + this.linkedinAdHour + this.msAdHour;
    },
    adSpend: function (percent, value) {
      this.ad_spend = value;
      this.adSpendPercent = percent;
      this.adSpentOperator = 0;
      // this.smoHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      var totalCost = this.fbAdcost + this.googleAdcost + this.linkedinAdcost + this.msAdcost;
      var totalPercent = totalCost * this.adSpendPercent / 100;
      this.adCampCost = totalCost - totalPercent;
    },
    adSpendIncrease: function (percent) {
      this.adSpentOperator = 1;
      this.adSpendPercent = percent;
      // this.smoHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      var totalCost = this.fbAdcost + this.googleAdcost + this.linkedinAdcost + this.msAdcost;
      var totalPercent = totalCost * this.adSpendPercent / 100;
      this.adCampCost = totalCost + totalPercent;
    },
    /////////////////////////////////////
    salesOutreach: function (cost, hr, value) {
      this.linkedin_out_reach = value;
      this.lkdnOutreachCost = cost;
      this.lkdnOutreachHour = hr;
      this.salesOutreachCost = this.lkdnOutreachCost;
      this.salesOutreachHour = this.lkdnOutreachHour;
    },
    /////////////////////////////////////
    meetingFrequency: function (cost, hr, value) {
      this.frequency = value;
      this.freequencyCost = cost;
      this.freequencyHour = hr;
      this.projectManagementCost = this.modeOfMeeting + this.freequencyCost;
      this.projectManagementhour = this.freequencyHour;
    },
    meetingMode: function (percent, value) {
      this.modeOfMeetings = value;
      this.modeOfMeeting = percent;
      // this.smoHour = this.webManagentHour + this.webDesignHour + this.seoHour;
      var totalCost = this.freequencyCost;
      var totalPercent = totalCost * this.modeOfMeeting / 100;
      this.projectManagementCost = totalPercent + totalCost;
    },
  }
});

jQuery(document).ready(function($) {
  jQuery('.next_page').click(function(event) {
    // event.preventDefault();
    var next_pg =  jQuery(this).data('page');
    jQuery('.package-panel').removeClass('active');
    jQuery('.' + next_pg).addClass('active');
    jQuery('#duration_widget').appendTo(jQuery('.' + next_pg).find('.duration-widget'));
  });
  jQuery('.pre_page').click(function(event) {
    // event.preventDefault();
    var  pre_pg =  jQuery(this).data('page');

    jQuery('.package-panel').removeClass('active');
    jQuery('.' + pre_pg).addClass('active');
    jQuery('#duration_widget').appendTo(jQuery('.' + pre_pg).find('.duration-widget'));
  });
  //////////////////////
  // page 2
  jQuery('.blog_wordss input').change(function(event) {
    if(jQuery(this).is(":checked")){
          var this_cost = parseInt(jQuery(this).val());
          var this_hr = parseInt(jQuery(this).data('hr'));
          var this_quantity = parseInt(jQuery('.blog_quantity input:checked').val());
          jQuery('.page-2 .blog_cost').val(this_cost * this_quantity);
          jQuery('.page-2 .blog_hours').val(this_hr * this_quantity);
          // jQuery('.page-2 .section_hours').val(this_cost * this_quantity);
          jQuery('.page-2 .section_cost').val(parseInt(jQuery('.page-2 .blog_cost').val()) + parseInt(jQuery('.page-2 .info_cost').val()));
        }
  });
  jQuery('.blog_quantityx input').change(function(event) {
    if(jQuery(this).is(":checked")){
          var this_cost = parseInt(jQuery('.blog_words input:checked').val());
          var this_hr = parseInt(jQuery('.blog_words input:checked').data('hr'));
          var this_quantity = parseInt(jQuery(this).val());
          if(this_cost){
            jQuery('.page-2 .blog_cost').val(this_cost * this_quantity);
            jQuery('.page-2 .blog_hours').val(this_hr * this_quantity);
            jQuery('.page-2 .section_cost').val(parseInt(jQuery('.page-2 .blog_cost').val()) + parseInt(jQuery('.page-2 .info_cost').val()));
          }
        }
  });
  jQuery('.infograph5 input').change(function(event) {
    if(jQuery(this).is(":checked")){
          var this_cost = parseInt(jQuery(this).val());
          var this_hr = parseInt(jQuery(this).data('hr'));
            jQuery('.page-2 .info_cost').val(this_cost);
            jQuery('.page-2 .info_hours').val(this_hr);
            jQuery('.page-2 .section_cost').val(parseInt(jQuery('.page-2 .blog_cost').val()) + parseInt(jQuery('.page-2 .info_cost').val()));

        }
  });
  ///////////////////
  jQuery('#get_excact_package').click(function(e){
    e.preventDefault();
    if(jQuery('.your_name').val() == ''){
          jQuery('.your_name').addClass('error');
          return;
    } else{
          jQuery('.your_name').removeClass('error');
    }
    if(jQuery('.your_company').val() == ''){
          jQuery('.your_company').addClass('error');
          return;
    } else{
          jQuery('.your_company').removeClass('error');
    }
    if(jQuery('.email_address').val() == ''){
          jQuery('.email_address').addClass('error');
          return;
    } else{
          jQuery('.email_address').removeClass('error');
    }
    if(jQuery('.phone_number').val() == ''){
          jQuery('.phone_number').addClass('error');
          return;
    } else{
          jQuery('.phone_number').removeClass('error');
    }



    var your_name,
        your_company,
        email_address,
        phone_number,
        type_of_business,
        size_of_marketing_team,
        website_url,
        how_many_blogs,
        number_of_words,
        infographic,
        number_of_webpages,
        webpage_design,
        seo_ranking,
        social_media_channels,
        number_of_posts,
        smo_design_type,
        email_newsletter,
        email_automation,
        crm,
        ad_spend,
        facebookAds,
        google_ads,
        linkedin_ads,
        microsoft_ads,
        linkedin_out_reach,
        frequency,
        modeOfMeeting,
        caluculateCost,
        caluculateHour,
        ajaxurl;


        caluculateCost = jQuery('.caluculateCost').val();
        caluculateHour = jQuery('.caluculateHour').val();
        your_name = jQuery('.your_name').val();
        email_address = jQuery('.email_address').val();
        phone_number = jQuery('.phone_number').val();
        your_company = jQuery('.your_company').val();
        your_company = jQuery('.your_company').val();
        type_of_business = jQuery('.type_of_business').val();
        size_of_marketing_team = jQuery('.size_of_marketing_team').val();
        website_url = jQuery('.website_url').val();
        how_many_blogs = jQuery('.how_many_blogs').val();
        number_of_words = jQuery('.number_of_words').val();
        infographic = jQuery('.infographic').val();
        number_of_webpages = jQuery('.number_of_webpages').val();
        webpage_design = jQuery('.webpage_design').val();
        seo_ranking = jQuery('.seo_ranking').val();
        social_media_channels = jQuery('.social_media_channels').val();
        number_of_posts = jQuery('.number_of_posts').val();
        smo_design_type = jQuery('.smo_design_type').val();
        email_newsletter = jQuery('.email_newsletter').val();
        email_automation = jQuery('.email_automation').val();
        crm = jQuery('.crm').val();
        ad_spend = jQuery('.ad_spend').val();
        facebookAds = jQuery('.facebookAds').val();
        google_ads = jQuery('.google_ads').val();
        linkedin_ads = jQuery('.linkedin_ads').val();
        microsoft_ads = jQuery('.microsoft_ads').val();
        linkedin_out_reach = jQuery('.linkedin_out_reach').val();
        frequency = jQuery('.frequency').val();
        modeOfMeeting = jQuery('.modeOfMeeting').val();


        ajaxurl     =   ajaxcalls_vars.admin_url + 'admin-ajax.php';
        jQuery.ajax({
        type: 'POST',
        dataType: 'json',
        url: ajaxurl,
        // Posting Values to Php Function
        data: {
            'action'    :   'package_builder_exact_submit',
            'your_name' :	your_name,
            'your_company' :	your_company,
            'email_address' :	email_address,
            'phone_number' :	phone_number,
            'type_of_business' :	type_of_business,
            'size_of_marketing_team' :	size_of_marketing_team,
            'website_url' :	website_url,
            'how_many_blogs' :	how_many_blogs,
            'number_of_words' :	number_of_words,
            'infographic' :	infographic,
            'number_of_webpages' :	number_of_webpages,
            'webpage_design' :	webpage_design,
            'seo_ranking' :	seo_ranking,
            'social_media_channels' :	social_media_channels,
            'number_of_posts' :	number_of_posts,
            'smo_design_type' :	smo_design_type,
            'email_newsletter' :	email_newsletter,
            'email_automation' :	email_automation,
            'crm' :	crm,
            'ad_spend' :	ad_spend,
            'facebookAds' :	facebookAds,
            'google_ads' :	google_ads,
            'linkedin_ads' :	linkedin_ads,
            'microsoft_ads' :	microsoft_ads,
            'linkedin_out_reach' :	linkedin_out_reach,
            'frequency' :	frequency,
            'modeOfMeeting' :	modeOfMeeting,
            'caluculateCost' :	caluculateCost,
            'caluculateHour' :	caluculateHour,

          },
          beforeSend: function(){
              jQuery('#mrd_calc_alert2').empty().append('<div class="loading_report"><div class="blob-1"></div><div class="blob-2"></div></div>');
        },
        success: function (data) {
           // This outputs the result of the ajax request
           // And clear the form fields
          if (data.vmail) {
            jQuery('#calc_email').addClass('error');
          }
          jQuery('#mrd_calc_alert2').empty().append(data.response);
          if (data.sent) {
            jQuery('#your_name').val('');
            jQuery('#your_company').val('');
            jQuery('#email_address').val('');
            jQuery('#phone_number').removeClass('error');
            jQuery('#phone_number').val('');
            jQuery('#mrd_calc_alert2').empty().append(data.response);
          }
        },
        error: function (errorThrown) {
        }
      });
  });
});
