/*
$(document).ready(function() {
    // This will fire when document is ready:

        if($(window).width() <=480) {
            $('.subcol3').hide();
            // if smaller or equal
            $('.logo').click(function(){
                 $('.subcol3').show(1000);
            });
           
        } else {
            // if larger
            $('.subcol3').show();
        }
    
});
*/
$(document).ready(function(){
    $('.subcol2 a').click(function(){
    $('.subcol2 a').removeClass("active");
    $(this).addClass("active");
})
});

$(function(){
  $('#audio-player').mediaelementplayer({
    alwaysShowControls: true,
    features: ['playpause','progress','volume'],
    audioVolume: 'horizontal',
    audioWidth: 500,
    audioHeight: 50,
    iPadUseNativeControls: true,
    iPhoneUseNativeControls: true,
    AndroidUseNativeControls: true
  });
});


/*************************************************************************************/

$(document).ready(function() {
    if($(window).width() <=768) {
        $('.subcol3').hide();
        $('.expand-menu').hide();
        $('.user-info a').change('#');
        $('.reg-form').insertAfter('.logo');
        $('.smart-menu').insertAfter('.col2');
        $('.login-img').insertAfter('.logo');
        $("<img src='img/menu25.png' width='20px' height='30px' class='expand-menu'/>").insertAfter(".subcol1");
        $('.expand-menu').click(function(){
            $('.smart-menu').slideToggle(1000);
        });
    } 
});
/*************************************************************************************/
$(document).ready(function() {
    if($(window).width()>768 && $(window).width() <= 1000) {
        $('.subcol3').hide();
        $('.expand-menu').hide();
        $('.smart-menu').insertAfter('.col2');
        $('.reg-form').insertAfter('.logo');
        $('.expand-menu').insertAfter('.logo');
        $('.login-img').insertAfter('.logo');
         $("<img src='img/menu25.png' width='20px' height='30px' class='expand-menu'/>").insertAfter(".logo");
        $('.expand-menu').click(function(){
            $('.smart-menu').slideToggle(1000);
        });
    } 
});
/*************************************************************************************/
$(document).ready(function() {
    if($(window).width()>1000) {
        $('.subcol3').show();
        $('.expand-menu').hide();
        $('#audio-player2').hide();
        $('#audio-player3').hide();
    } 

/*************************************************************************************/


});




//*********************************************************************/
$(document).ready(function(){
    $("#file_browse").change(function(){
      var files = $(this)[0].files;
      $(".files_names").html("");
      for (var i = 0; i < files.length; i++)
        $(".files_names").html($(".files_names").html()+files[i].name);
    });
});



$(document).ready(function(){
 $(".top_songs_play").on("click", "img",function(){
        var atr = $(this).attr("song_data");
        var name = $(this).attr("song_name");
        var block_type = $(this).attr("block_type");

        $("audio").attr("src", atr);
        $("audio").attr("autoplay", "true");
        $("audio").attr("block_type", block_type);
        $("audio").attr("song_id", $(this).attr("id"));
        $(".audio-player h2").html(name);
    });
    $(".playlist_songs").on("click", "img",function(){
        var atr = $(this).attr("song_data");
        var name = $(this).attr("song_name");
        var block_type = $(this).attr("block_type");

        $("audio").attr("src", atr);
        $("audio").attr("autoplay", "true");
        $("audio").attr("block_type", block_type);
        $("audio").attr("song_id", $(this).attr("id"));
        $(".audio-player h2").html(name);
    });

    $("audio").bind("ended",function(){
        var nr = parseInt($(this).attr("song_id"))+1;
        var block_type = $(this).attr("block_type");

        if ($(".top_songs_play img[block_type='"+block_type+"']").length <= nr) {
            nr = 0;
        }
        var test = $(".top_songs_play img[block_type='"+block_type+"']").eq(nr);
        var atr = test.attr("song_data");
        var name = test.attr("song_name");

        $("audio").attr("src", atr);
        $("audio").attr("autoplay", "true");
        $("audio").attr("song_id", test.attr("id"));
        $(".audio-player h2").html(name);
    });    

});



