import UIkit from './UIkit';

const initSlideshows = () => {
  const slideshows = UIkit.slideshow('.uk-slideshow', {});

  console.log('slideshows loaded', slideshows);
};

export default initSlideshows;
