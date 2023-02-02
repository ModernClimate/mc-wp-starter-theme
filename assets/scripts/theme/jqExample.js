/**
 * Be sure to add jquery as a dependency in App/Scripts.php so that it is available
 * to this script before it initializes
 */

// eslint-disable-next-line import/no-unresolved
import jquery from 'jQuery';

const $ = jquery;

const initWithJq = () => {
  if (typeof $ === 'undefined') {
    console.log('jQuery is not loaded.');
    return false;
  }

  const body = $('body');
  console.log('jQuery is loaded.', body.length);
};

export default initWithJq;
