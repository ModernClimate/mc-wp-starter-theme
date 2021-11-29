import Glide from '@glidejs/glide';

const init = () => {
  console.log('theme js module initialized...');

  const glide = new Glide('.glide', {
    type: 'carousel',
    perView: 4,
    focusAt: 'center',
    breakpoints: {
      800: {
        perView: 2
      },
      480: {
        perView: 1
      }
    }
  })

  glide.mount()
};

export default init;
