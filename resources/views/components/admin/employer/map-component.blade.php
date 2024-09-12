<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<div id="map" style="height: 400px; width: 100%;"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        initMap(); // Khởi tạo bản đồ khi tải trang

        Livewire.hook('message.processed', (message, component) => {
            initMap(); // Khởi tạo lại bản đồ sau mỗi lần Livewire xử lý cập nhật
        });

        let currentLat = 10.0452;
        let currentLon = 105.7469;
        let currentZoom = 13;

        function initMap() {
            var map = L.map('map').setView([10.0452, 105.7469], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.on('click', function (e) {
                var lat = e.latlng.lat;
                var lon = e.latlng.lng;

                // Cập nhật trực tiếp vào các trường input của Filament
                document.querySelector('[wire\\:model="data.latitude"]').value = lat;
                document.querySelector('[wire\\:model="data.longitude"]').value = lon;

                fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`)
                    .then(response => response.json())
                    .then(result => {
                        console.log(result);

                        if (result && result.address) {
                            var address = result.address;
                            var display_name = result.display_name;

                            // Xóa các marker cũ
                            map.eachLayer(function (layer) {
                                if (layer instanceof L.Marker) {
                                    map.removeLayer(layer);
                                }
                            });

                            // Thêm marker tại vị trí click
                            var marker = L.marker([lat, lon]).addTo(map);
                            marker.bindPopup(`<b>${display_name || 'Không có thông tin đường'}</b>`).openPopup();

                            // Cập nhật các trường nhập liệu
                            document.getElementById('address_country').value = address.country || '';
                            document.getElementById('address_province').value = address.state || address.city || '';
                            document.getElementById('address_district').value = address.district || address.city_district || address.town || address.county;
                            document.getElementById('address_ward').value = address.quarter || address.suburb || address.village || address.city || address.county;
                            document.getElementById('address_street').value = display_name || '';
                            document.getElementById('address_latitude').value = lat;
                            document.getElementById('address_longitude').value = lon;
                        } else {
                            alert('Không tìm thấy kết quả!');
                        }
                    })
                    .catch(error => console.log('Error:', error));
            });
        }
    });
</script>
