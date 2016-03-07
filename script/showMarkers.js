// edited by Lars - createMarker with info
function createMarker(point, fr_id, fr_name, address, fr_web) {
	var info = "<html><font style=\"font-size: 15pt;\"><a href=\"detail.html?id=" + fr_id + "\">" + fr_name + "</a></font><br/>" + address + "<br/><a href=\"" + fr_web + "\" target=\"_blank\">" + fr_web + "</a><br/><br/><a href=\"detail.html?id=" + fr_id + "\">further information</a></html>";
	
	var marker = new google.maps.Marker({
		map: map,	
		position: point,
		icon: 'img/marker.png'
	});
	
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(info);
		infoWindow.open(map, marker);
		map.setZoom(17);
		map.setCenter(marker.getPosition());
	});
}
// end createMarker


// edited by Lars - API v3 downloadURL
function downloadUrl(url,callback) {
	var request = window.ActiveXObject ?
	new ActiveXObject('Microsoft.XMLHTTP') :
	new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
		request.onreadystatechange = doNothing;
		callback(request.responseText, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}
function doNothing(){
}
// end downlaodUrl (incl doNothing)


// edited by Lars - API v3 parseXml
function parseXml(str) {
	if (window.ActiveXObject) {
		var doc = new ActiveXObject('Microsoft.XMLDOM');
		doc.loadXML(str);
		return doc;
	} else if (window.DOMParser) {
		return (new DOMParser).parseFromString(str, 'text/xml');
	}
}
// end parseXml
