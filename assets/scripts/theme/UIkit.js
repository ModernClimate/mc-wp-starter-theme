import UIkit from 'uikit/dist/js/uikit-core';
import Slider from 'uikit/src/js/components/slider';
import Slideshow from 'uikit/src/js/components/slideshow';
// To enable parallax functionality, uncomment the desired line(s) below
// import Parallax from 'uikit/src/js/components/parallax';
// import SliderParallax from 'uikit/src/js/components/slider-parallax';
// import SlideshowParallax from 'uikit/src/js/components/slideshow-parallax';

// Add individual components imported from UIKit below
const components = [
  { name: 'slider', component: Slider },
  { name: 'slideshow', component: Slideshow },
  // To enable parallax functionality, uncomment the desired line(s) below
  // { name: 'parallax', component: Parallax },
  // { name: 'slider-parallax', component: SliderParallax },
  // { name: 'slideshow-parallax', component: SlideshowParallax },
];

components.forEach(({ name, component }) => {
  UIkit.component(name, component);
});

export default UIkit;
