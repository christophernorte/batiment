require(["dojo/dom", "dojo/domReady!"], function(dom) {
    var myLatlng = new google.maps.LatLng(45.649832, 0.979809);
        
    var myOptions = {
        center: myLatlng,
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
        
    var mapBatiment = new google.maps.Map(document.getElementById("map"),myOptions);
        
    var myMarker = new google.maps.Marker({
        position: myLatlng,
        map: mapBatiment,
        title: "Atelier"
    });
});

