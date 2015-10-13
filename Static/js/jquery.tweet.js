(function($) {
          tweets = $.grep(tweets, s.filter).slice(0, s.count);
          list.append($.map(tweets.sort(s.comparator),
                            function(t) { return "<li>" + s.template(t) + "</li>"; }).join('')).
              children('li:first').addClass('tweet_first').end().
              children('li:odd').addClass('tweet_even').end().
              children('li:even').addClass('tweet_odd');

          if (s.outro_text) list.after(outro);
          $(widget).trigger("loaded").trigger((tweets.length === 0 ? "empty" : "full"));
          if (s.refresh_interval) {
            window.setTimeout(function() { $(widget).trigger("load"); }, 1000 * s.refresh_interval);
          }
        });
      }).trigger("load");
    });
  };
})(jQuery);