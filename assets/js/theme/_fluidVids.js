/**
 *  Initialize FluidVids
 *
 *  A standalone module that provides a fluid solution for video embeds
 */
var fluidVids = (function () {

    var pub = {}; // public facing functions

    pub._init = function () {

        fluidvids.init({
            selector: ['iframe'],
            players: ['www.youtube.com', 'player.vimeo.com']
        });

    };

    return pub;

}());