import UIkit from 'uikit/dist/js/uikit-core';
import Slider from 'uikit/src/js/components/slider';
import Slideshow from 'uikit/src/js/components/slideshow';

// Add individual components imported from UIKit below
const components = [
  { name: 'slider', component: Slider },
  { name: 'slideshow', component: Slideshow },
];

components.forEach(({ name, component }) => {
  UIkit.component(name, component);
});

export default UIkit;
