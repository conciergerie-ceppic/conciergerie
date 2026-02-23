# Geolocalisation Javascript https://developer.mozilla.org/fr/docs/Web/API/Geolocation_API
<!-- if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    afficherCarteEtServices(lat, lon);
  });
} -->

# Afficher une carte avec Leaflet https://leafletjs.com/
<!-- <div id="map" style="height: 400px;"></div>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script>
function afficherCarteEtServices(lat, lon) {
  var map = L.map('map').setView([lat, lon], 13);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);
  L.marker([lat, lon]).addTo(map)
    .bindPopup('Vous êtes ici')
    .openPopup();

  // Exemple de services fictifs
  var services = [
    { name: "Restaurant A", lat: 49.444, lon: 1.1 },
    { name: "Parking B", lat: 49.445, lon: 1.095 }
  ];

  // Afficher les services sur la carte
  services.forEach(function(service) {
    L.marker([service.lat, service.lon]).addTo(map)
      .bindPopup(service.name);
  });
}
</script> -->

# OpenStreetMap https://www.openstreetmap.org/#map=6/46.45/2.21
- API Nominatim -> reverse geocoding aprés avoir obtenu les coordonnées pour nom de la ville, rue, numéro
- Exemple https://nominatim.openstreetmap.org/reverse?lat=48.8584&lon=2.2945&format=json


# Calcul de distance entre utilisateur et chaque service
- Haversine formula (afficher dans un rayon donné)
- Nominatim (obtenir l'adresse complete)
 <!-- fetch('https://nominatim.openstreetmap.org/reverse?lat=' + lat + '&lon=' + lon + '&format=json')
  .then(response => response.json())
  .then(data => {
    console.log(data.address); // Affiche l’adresse complète
  }); -->