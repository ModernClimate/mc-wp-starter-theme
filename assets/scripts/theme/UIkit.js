import UIkit from 'uikit/dist/js/uikit-core';
import Parallax from 'uikit/src/js/components/parallax';
import Slider from 'uikit/src/js/components/slider';
import SliderParallax from 'uikit/src/js/components/slider-parallax';
import Slideshow from 'uikit/src/js/components/slideshow';
import SlideshowParallax from 'uikit/src/js/components/slideshow-parallax';

// Add individual components imported from UIKit below
const components = [
  { name: 'parallax', component: Parallax },
  { name: 'slider', component: Slider },
  { name: 'slider-parallax', component: SliderParallax },
  { name: 'slideshow', component: Slideshow },
  { name: 'slideshow-parallax', component: SlideshowParallax },
];

components.forEach(({ name, component }) => {
  UIkit.component(name, component);
});

export default UIkit;
