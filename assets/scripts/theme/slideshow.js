import UIkit from './UIkit';

const initSlideshows = () => {
  UIkit.util.on('.uk-slideshow', 'beforeitemshow', function (e) {
    const index = parseInt(e.target.dataset.slideIndex) + 1;
    console.log('Showing slide', index.toString().padStart(2, '0'));
  });
};

export default initSlideshows;
