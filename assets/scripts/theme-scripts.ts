import { createApp } from 'vue';
import Component1 from './theme/components/Component1.vue';
import Carousel from './theme/components/Carousel.vue';

const app1 = createApp(Component1);
app1.mount('#component-1');

document.querySelectorAll('.component-2').forEach((el) => {
  const app2 = createApp(Carousel);
  app2.mount(el);
});
