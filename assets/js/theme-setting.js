/*=====================
   theme setting js 
 ==========================*/
 var body_event = $("body");
 body_event.on("click", ".theme-layout-version", function() {
     $(this).toggleClass('rtl');
     $('body').removeClass('rtl');
     if ($('.theme-layout-version').hasClass('rtl')) {
         $('.theme-layout-version').text('LTR');
         $('body').addClass('rtl');
     } else {
         $('.theme-layout-version').text('RTL');
     }
     return false;
 });
 
 function openSetting() {
     document.getElementById("setting_box").classList.add('open-setting');
     document.getElementById("setting-icon").classList.add('open-icon');
 }
 
 function closeSetting() {
     document.getElementById("setting_box").classList.remove('open-setting');
     document.getElementById("setting-icon").classList.remove('open-icon');
 }
 jQuery('.setting-title h4').append('<span class="according-menu"></span>');
 jQuery('.setting-title').on('click', function() {
     jQuery('.setting-title').removeClass('active');
     jQuery('.setting-contant').slideUp('normal');
     if (jQuery(this).next().is(':hidden') == true) {
         jQuery(this).addClass('active');
         jQuery(this).next().slideDown('normal');
     }
 });
 jQuery('.setting-contant').hide();
 
 
$(".dark-button").click(function() {
    var $this = $(this);
    if($this.hasClass('light-button')){
        $this.text('Light');  
        $("#change-link").attr("href", "../assets/css/style.css");       
    } else {
        $this.text('Dark');
        $("#change-link").attr("href", "../assets/css/dark.css");
    }
 
});

$('.dark-button').click(function(){
    var $this = $(this);
    
    $this.toggleClass('light-button');
    if($this.hasClass('light-button')){
        $this.text('Light');         
    } else {
        $this.text('Dark');
    }
});
 
$(".dark-button-1").click(function() {
    var $this = $(this);
    if($this.hasClass('light-button-1')){
        $this.text('Light');  
        $("#change-link").attr("href", "../assets/css/style-1.css");       
    } else {
        $this.text('Dark');
        $("#change-link").attr("href", "../assets/css/dark-1.css");
    }
 
});

$('.dark-button-1').click(function(){
    var $this = $(this);
    
    $this.toggleClass('light-button-1');
    if($this.hasClass('light-button-1')){
        $this.text('Light');         
    } else {
        $this.text('Dark');
    }
});

$(".dark-button-2").click(function() {
    var $this = $(this);
    if($this.hasClass('light-button-2')){
        $this.text('Light');  
        $("#change-link").attr("href", "../assets/css/style-2.css");       
    } else {
        $this.text('Dark');
        $("#change-link").attr("href", "../assets/css/dark-2.css");
    }
 
});

$('.dark-button-2').click(function(){
    var $this = $(this);
    
    $this.toggleClass('light-button-2');
    if($this.hasClass('light-button-2')){
        $this.text('Light');         
    } else {
        $this.text('Dark');
    }
});