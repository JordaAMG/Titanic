function iniciarMap(){
    var coord = {lat: 19.2576866 ,lng: -103.7385911};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 18,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}