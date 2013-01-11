
var _ = {

  FB_PERMS: false,
  added: false,
  url: false,
  sr: '',

  i: function() {

  },

  // center an absolute div
  center: function(e, params) {

    var middle = ($(window).width() / 2) - (e.outerWidth() / 2);
    var ttop = ($(window).scrollTop() + 10*1);

    if (params && params.top) {
      ttop = ttop + params.top;
    }

    if (params && params.noTop) {
      $(e).css({left: middle + 'px'});
    } else {
      $(e).css({top: ttop + 'px', left: middle + 'px'});
    }

    return true;

  },

  fade: function(off) {

    if (off != undefined) {
      $('.fade').transition({opacity: 0}, function() {
        $('.fade').hide();
      });
      return true;
    }

    $('.fade').show().transition({opacity: 1});

  },

  convert: function() {

    FB.login(function(response) {

      if (!response.authResponse) {
        _.notice('We are only currently requiring permission to pull your albums and photos.');
      } else {
        _.sr = response.authResponse.signedRequest;
        // load stuff
      }

    }, {scope: _.FB_PERMS});

  },

  loader: function(close) {

    if (close == true) {
      // close our loader and fader
    }

    // open our loader and fade

  }

}
