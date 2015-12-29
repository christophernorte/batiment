var profile = (function(){
    return {
        basePath: "./vendor",
        releaseDir: "../www/bundles/batiment/js/dojo-api",
        releaseName: "dojo-api",
        action: "release",

        layerOptimize:"closure",
        optimize: "closure",

        packages:[{
            name: "dojo",
            location: "dojo"
        },{
            name: "dijit",
            location: "dijit"
        },{
            name: "dojox",
            location: "dojox"
        }],

        layers: {
            "dojo/dojo": {
                include: [ "dojo/dojo", "dojo/i18n", "dojo/domReady" ],
                customBase: true,
                boot: true
            }
        }
    };
})();