$(function(){
    $('.bxslider').magnificPopup({
      delegate: 'a:not(".bx-clone")',  // make sure the bxSlider cloned items don't get added
      type: 'image',
      // other options
      gallery: {
        enabled: true,
        tCounter: '',
      },
      image: {
        titleSrc: 'title',
      }
    });

    $('.bxslider').bxSlider({
      captions: true,
      auto: true,
      pause: 3000,
    });
  });
