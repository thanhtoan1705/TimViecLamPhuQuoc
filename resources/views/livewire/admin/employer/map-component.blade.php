<div wire:ignore>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <div> <input type="text" id="address_search" placeholder="Nhập địa chỉ" style="width: 100%; height: 40px; margin-top: 10px; margin-bottom: 15px; border-radius: 7px; border: 1px solid #D3D3D3; font-size: 14px;" oninput="searchAddress()" />
        <ul id="suggestions" style="list-style-type: none; padding: 0px;"></ul>
        <div id="map" style="height: 400px; width: 100%;"></div>
    </div>

    <style>
        #suggestions li{
            padding: 5px;
        }
    </style>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([10.0452, 105.7469], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Khi người dùng nhấp vào bản đồ
        map.on('click', function (e) {
            var lat = e.latlng.lat;
            var lon = e.latlng.lng;

            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
                .then(response => response.json())
                .then(result => {
                    if (result && result.address) {
                        var display_name = result.display_name;

                        // Xóa các marker cũ
                        map.eachLayer(function (layer) {
                            if (layer instanceof L.Marker) {
                                map.removeLayer(layer);
                            }
                        });

                        // Thêm marker mới
                        var marker = L.marker([lat, lon]).addTo(map);
                        marker.bindPopup(`<b>${display_name || 'Không có thông tin đường'}</b>`).openPopup();


                        document.getElementById('data.latitude').value = lat;
                        document.getElementById('data.longitude').value = lon;

                        Livewire.emit('updateCoordinates', lat, lon);


                    } else {
                        alert('Không tìm thấy kết quả!');
                    }
                })
                .catch(error => console.log('Error:', error));
        });

        function searchAddress() {
            var query = document.getElementById('address_search').value;
            if (query.length < 3) return;

            fetch(`https://nominatim.openstreetmap.org/search?q=${query}&format=json`)
                .then(response => response.json())
                .then(results => {
                    var suggestionsList = document.getElementById('suggestions');
                    suggestionsList.innerHTML = '';

                    if (results && results.length > 0) {
                        results.forEach(result => {
                            var suggestionItem = document.createElement('li');
                            suggestionItem.textContent = result.display_name;
                            suggestionItem.style.cursor = 'pointer';
                            suggestionItem.onclick = function() {
                                var lat = result.lat;
                                var lon = result.lon;

                                // Xóa các marker cũ
                                map.eachLayer(function (layer) {
                                    if (layer instanceof L.Marker) {
                                        map.removeLayer(layer);
                                    }
                                });

                                // Thêm marker mới
                                var marker = L.marker([lat, lon]).addTo(map);
                                map.setView([lat, lon], 13);
                                marker.bindPopup(`<b>${result.display_name}</b>`).openPopup();

                                // Cập nhật form
                                document.getElementById('data.latitude').value = lat;
                                document.getElementById('data.longitude').value = lon;

                                suggestionsList.innerHTML = '';
                            };
                            suggestionsList.appendChild(suggestionItem);
                        });
                    }
                })
                .catch(error => console.log('Error:', error));
        }
    </script>

</div>
