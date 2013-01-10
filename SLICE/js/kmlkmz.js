var map;
var base = "http://sites.google.com/site/mxamples/";
var kml = {
    a: {
        name: "Deutschland",
        url: base + "germany-shape.kmz"
    },
    b: {
        name: "Baden-W&uuml;rttemberg",
        url: base + "b-wurtt-shape.kmz"
    },
    c: {
        name: "Bayern",
        url: base + "bayern-shape.kmz"
    },
    d: {
        name: "Berlin",
        url: base + "berlin-shape.kmz"
    },
    e: {
        name: "Brandenburg",
        url: base + "bra-burg-shape.kmz"
    },
    f: {
        name: "Bremen",
        url: base + "bremen-shape.kmz"
    },
    g: {
        name: "Hamburg",
        url: base + "hamburg-shape.kmz"
    },
    h: {
        name: "Hessen",
        url: base + "hessen-shape.kmz"
    },
    i: {
        name: "Mecklenburg-Vorpommern",
        url: base + "m-vpommern-shape.kmz"
    },
    j: {
        name: "Niedersachsen",
        url: base + "n-sachsen-shape.kmz"
    },
    k: {
        name: "Nordrhein-Westfalen",
        url: base + "nrw-shape.kmz"
    },
    l: {
        name: "Rheinland-Pfalz",
        url: base + "r-pfalz-shape.kmz"
    },
    m: {
        name: "Saarland",
        url: base + "saar-shape.kmz"
    },
    n: {
        name: "Sachsen",
        url: base + "sachsen-shape.kmz"
    },
    o: {
        name: "Sachsen-Anhalt",
        url: base + "s-anhalt-shape.kmz"
    },
    p: {
        name: "Schleswig-Holstein",
        url: base + "s-holstein-shape.kmz"
    },
    q: {
        name: "Th&uuml;ringen",
        url: base + "thuringen-shape.kmz"
    }
};

function loadMap() {
    var a = google.maps;
    var b = {
        center: new a.LatLng(52.052491, 9.84375),
        zoom: 5,
        mapTypeId: a.MapTypeId.ROADMAP,
        streetViewControl: false,
        mapTypeControlOptions: {
            mapTypeIds: [a.MapTypeId.ROADMAP, a.MapTypeId.SATELLITE, a.MapTypeId.HYBRID]
        }
    };
    map = new a.Map(document.getElementById("map"), b);
    createSidebar()
}
function toggleKML(a, b) {
    if (a) {
        var c = new google.maps.KmlLayer(kml[b].url);
        kml[b].obj = c;
        kml[b].obj.setMap(map);
        google.maps.event.addListenerOnce(c, "metadata_changed", function () {
            kml[b].bounds = this.getDefaultViewport()
        })
    } else {
        kml[b].obj.setMap(null);
        delete kml[b].obj
    }
}
function zoomToOverlay(a, b) {
    var c = document.forms["myform"].elements["box"][a];
    if (c.checked) {
        map.fitBounds(kml[b].bounds)
    } else {
        c.click()
    }
}
function removeAll() {
    for (var a in kml) {
        if (kml[a].obj) {
            kml[a].obj.setMap(null);
            delete kml[a].obj
        }
    }
    var b = document.getElementsByName("box");
    for (var c = 0, d; d = b[c]; c++) {
        d.checked = false
    }
}
function createSidebar() {
    var a = -1;
    var b = "<form name='myform' id='myform'>";
    for (var c in kml) {
        a++;
        b += "<p><input name='box' type='checkbox' id='" + c + "' onclick='toggleKML(this.checked, this.id)' \/>&nbsp;<a href='#' onclick=\"zoomToOverlay(" + a + ", '" + c + "');return false;\">" + kml[c].name + "<\/a><\/p>"
    }
    b += "<p><a href='#' onclick='removeAll();return false;'>Alle Eintr&auml;ge l&ouml;schen<\/a><\/p><\/form>";
    document.getElementById("sidebar").innerHTML = b
}
window.onload = loadMap;