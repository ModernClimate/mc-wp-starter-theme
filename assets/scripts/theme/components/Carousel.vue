<template>
  <Carousel>
    <Slide v-for="slide in 10" :key="slide">
      <div class="carousel__item">{{ slide }}</div>
    </Slide>

    <template #addons>
      <Navigation />
      <Pagination />
    </template>
  </Carousel>
</template>

<script>
import { defineComponent } from 'vue';
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';

// import 'vue3-carousel/carousel.css';
import 'vue3-carousel/dist/carousel.css';

export default defineComponent({
  name: 'Basic',
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
});
</script>

<style>
.carousel__item {
  align-items: center;
  background-color: var(--vc-clr-primary);
  border: 1px solid blue;
  border-radius: 8px;
  color: var(--vc-clr-white);
  display: flex;
  font-size: 20px;
  justify-content: center;
  min-height: 200px;
  width: 100%;
}

.carousel__track {
  margin: 0;
  padding: 0;
}

.carousel__slide {
  list-style: none;
  margin: 0;
  padding: 0;
}

.carousel__prev,
.carousel__next {
  border: 5px solid white;
  box-sizing: content-box;
}
</style>
