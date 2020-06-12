(function($) {
    
    $('select#state').on('change', function() {
        if((this.value ) == 'Arunachal Pradesh' ) {
            var newOptions ={"--SELECT TRIBE--": "",
                             "Adi": "Adi",
                             "Aka": "Aka",
                             "Apatani": "Apatani",
                             "Bugun": "Bugun",
                             "Galo": "Galo",
                             "Hill miri": "Hill miri",
                             "Khamba": "Khamba",
                             "Khampti": "Khampti",
                             "Khowa": "Khowa",
                             "Memba": "Memba",
                             "Miji": "Miji",
                             "Minyong": "Minyong",
                             "Mishmi": "Mishmi",
                             "Monpa": "Monpa",
                             "Nocte": "Nocte",
                             "Nyishi": "Nyishi",
                             "Sherdukpen": "Sherdukpen",
                             "Singpho": "Singpho",
                             "Tagin": "Tagin",
                             "Tangsa": "Tangsa",
                             "Wangchoo": "Wangchoo",
                             "Chakma": "Chakma",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });

        }
        if((this.value ) == 'Assam' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Bodo Kachari": "Bodo Kachari",
                             "Deori": "Deori",
                             "Dimasa Kachari": "Dimasa Kachari",
                             "Hmar": "Hmar",
                             "Hrangkhol": "Hrangkhol",
                             "Jemi Naga": "Jemi Naga",
                             "Karbi": "Karbi",
                             "Khasi Jaintia": "Khasi Jaintia",
                             "Lalung (Tiwa)": "Lalung (Tiwa)",
                             "Mech": "Mech",
                             "MiriÂ": "MiriÂ",
                             "MisingÂ": "MisingÂ",
                             "Munda": "Munda",
                             "RabhaÂ": "RabhaÂ",
                             "ReangÂ": "ReangÂ",
                             "Rongmei Naga": "Rongmei Naga",
                             "Santhal": "Santhal",
                             "ShyamÂ": "ShyamÂ",
                             "Sonowal Kachari": "Sonowal Kachari",
                             "UrangÂ": "UrangÂ",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        
        }
        if((this.value ) == 'Manipur' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Anal (Naga)": "Anal (Naga)",
                             "Hmar (Lushei)": "Hmar (Lushei)",
                             "Kom (Kuki)": "Kom (Kuki)",
                             "Liangmei (Naga)": "Liangmei (Naga)",
                             "Mao (Naga)": "Mao (Naga)",
                             "Maram (Naga)": "Maram (Naga)",
                             "Maring (Naga)": "Maring (Naga)",
                             "Mizo (Lushei)": "Mizo (Lushei)",
                             "Paite (Kuki)": "Paite (Kuki)",
                             "Poamei (Naga)": "Poamei (Naga)",
                             "Rongmei /Kabui (Naga)": "Rongmei /Kabui (Naga)",
                             "Simte (Kuki)": "Simte (Kuki)",
                             "Tangkhol (Naga)": "Tangkhol (Naga)",
                             "Thadou (Lushei)": "Thadou (Lushei)",
                             "Vaiphe (Kuki)": "Vaiphe (Kuki)",
                             "Zou (Lushei)": "Zou (Lushei)",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        }
        if((this.value ) == 'Meghalaya' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Garo": "Garo",
                             "Hajong": "Hajong",
                             "Karbi": "Karbi",
                             "Khasi Jaintia": "Khasi Jaintia",
                             "Koch": "Koch",
                             "Lalung(Tiwa)": "Lalung(Tiwa)",
                             "Rabha": "Rabha",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        }
        if((this.value ) == 'Mizoram' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Chakma": "Chakma",
                             "Gangte": "Gangte",
                             "Hmar": "Hmar",
                             "Lai (Pawi)": "Lai (Pawi)",
                             "Mara (Lakher)": "Mara (Lakher)",
                             "Mizo (Lusei)": "Mizo (Lusei)",
                             "Paite": "Paite",
                             "Reang (Tuikuk)": "Reang (Tuikuk)",
                             "Simte": "Simte",
                             "Sukte": "Sukte",
                             "Thadou (Kuki)": "Thadou (Kuki)",
                             "Tiddim": "Tiddim",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        }
        if((this.value ) == 'Nagaland' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Dimasa": "Dimasa",
                             "Angami (Naga)": "Angami (Naga)",
                             "Ao (Naga)": "Ao (Naga)",
                             "Chakesang (Naga)": "Chakesang (Naga)",
                             "Chang (Naga)": "Chang (Naga)",
                             "Khiamniungan (Naga)": "Khiamniungan (Naga)",
                             "Konyak (Naga)": "Konyak (Naga)",
                             "Lotha (Naga)": "Lotha (Naga)",
                             "Phom (Naga)": "Phom (Naga)",
                             "Pochuri (Naga)": "Pochuri (Naga)",
                             "Rengma (Naga)": "Rengma (Naga)",
                             "Sangtam (Naga)": "Sangtam (Naga)",
                             "Sema (Naga)": "Sema (Naga)",
                             "Tikhir (Naga)": "Tikhir (Naga)",
                             "Yimchunger (Naga)": "Yimchunger (Naga)",
                             "Zeliang (Naga)": "Zeliang (Naga)",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        }
        if((this.value ) == 'Sikkim' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Bhutia": "Bhutia",
                             "Lepcha": "Lepcha",
                             "Sherpa": "Sherpa",
                             "Subba (Limboo)": "Subba (Limboo)",
                             "Tamang": "Tamang",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        }
        if((this.value ) == 'Tripura' ) {
            var newOptions ={"--SELECT LOCATION--": "",
                             "Chakma": "Chakma",
                             "Halam (kuki)": "Halam (kuki)",
                             "Jamatiya": "Jamatiya",
                             "Mog": "Mog",
                             "Noatia": "Noatia",
                             "Reang": "Reang",
                             "Tripura/ Debbarma": "Tripura/ Debbarma",
                            };


        var $el = $("select#tribe");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
          $el.append($("<option></option>")
             .attr("value", value).text(key));
        });
        }

    });

var youtubeVideo = {
    videoBtn:'[data-videourl]',

    model: function() {

        function videoinit() {
            $('body').on('click', youtubeVideo.videoBtn, function(event) {
                event.preventDefault();
                var videoSrc = $(this).data('videourl');
              
                var ID = '';
                var url = videoSrc.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
                if (url[2] !== undefined) {
                    ID = url[2].split(/[^0-9a-z_\-]/i);
                    ID = ID[0];
                } else {
                    ID = url;
                }

                var videoElement = $('<div class="video-popup-model">' + '<div class="video-layer">' + '<div class="video-model-close-layer">' + '</div>' + '<div class="model-wrapper">' + '<div class="videomodel">' + '<div class="videoscreen">' + '<iframe width="100%" height="auto" class="videlement"' + 'src="https://www.youtube.com/embed/' + ID + '?rel=0&amp;controls=1&amp;showinfo=0&amp;autoplay=1' + '" frameborder="0"' + 'allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"' + 'allowfullscreen></iframe>' + '</div>' + '<div class="modelCloseBtn">' + '</div>' + '</div>' + '</div>' + '</div>' + '</div>');

                $('body').prepend(videoElement);
                var videoWidth = $('.video-popup-model .videlement').width();
                var videHeight = (9 / 16) * videoWidth;
                $('.video-popup-model .videlement').height(videHeight);
                $('body').find('.video-popup-model').addClass('smooth_show');
            });
        }
        videoinit();

        function modelClose() {
            $('body').on('click', '.modelCloseBtn', function(event) {
                var model = $(this).parents('.video-popup-model')
                model.removeClass('smooth_show');
                setTimeout(function() {
                    model.remove();
                }, 500);
                $('body').removeClass('no-reload');
            });
        }
        modelClose();

        function modelLayerClose() {
            $('body').on('click', '.video-model-close-layer', function(event) {
                $(".modelCloseBtn").trigger('click');
            });
        }
        modelLayerClose();
    },
    init: function() {
        youtubeVideo.model();
    }
};

youtubeVideo.init();

setTimeout(fade_out, 2000);

function fade_out() {
  $(".msg_box").css({'opacity': '0', 'transform': 'scale(0)'});
}

})(jQuery);
