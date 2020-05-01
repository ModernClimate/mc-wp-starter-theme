/**
 *  Initialize jsModule
 *
 *  Example Javascript module with self-contained object interface.
 */
const jsModule = (() => {

  var pub = {}; // public facing functions

  pub.init = function () {
    console.log('it worked');
  };

  return pub;

})();

export default jsModule;
