var profile = (function(){
    return {
        basePath: "../../vendor/bower_components",
        releaseDir: "../../www/bundles/batiment/js",
        releaseName: "dojo-lib",
        action: "release",

        layerOptimize:false,

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