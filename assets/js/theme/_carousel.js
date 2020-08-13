/**
 *  Initialize default carousel
 */
const carousel = (function () {

  const pub = {}; // public facing functions

  pub.init = function () {
    $('.slick-carousel').slick();
  };

  return pub;

}());
