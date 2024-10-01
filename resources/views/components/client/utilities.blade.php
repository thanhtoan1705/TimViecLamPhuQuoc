<div class="widget-container">
    <div class="main-button" id="mainButton">
        <span>+</span>
    </div>
    <div class="sub-widgets" id="subWidgets">
        <div class="widget chat-widget" data-widget="chat">
            <i class="fa fa-comment"></i>
        </div>
        <div class="widget facebook-widget" data-widget="facebook">
            <i class="fa fa-facebook"></i>
        </div>
        <div class="widget call-widget" data-widget="call">
            <i class="fa fa-phone"></i>
        </div>
    </div>
</div>

<div class="widget-box" id="widgetBox">
    <div class="widget-content" id="widgetContent">
        <!-- Nội dung của các tiện ích -->
    </div>
    <button id="closeWidget">Đóng</button>
</div>

<script>
    // Lấy các phần tử cần thiết
const mainButton = document.getElementById('mainButton');
const subWidgets = document.getElementById('subWidgets');
const widgetBox = document.getElementById('widgetBox');
const widgetContent = document.getElementById('widgetContent');
const closeWidgetButton = document.getElementById('closeWidget');

// Hiển thị/ẩn các sub-widget khi ấn vào button chính
mainButton.addEventListener('click', function() {
    if (subWidgets.style.display === 'none' || subWidgets.style.display === '') {
        subWidgets.style.display = 'flex';
    } else {
        subWidgets.style.display = 'none';
    }
});

// Xử lý khi nhấn vào các sub-widget
const widgets = document.querySelectorAll('.widget');
widgets.forEach(widget => {
    widget.addEventListener('click', function() {
        const widgetType = widget.getAttribute('data-widget');
        showWidgetContent(widgetType);
    });
});

// Hiển thị nội dung tương ứng của widget
function showWidgetContent(widgetType) {
    switch(widgetType) {
        case 'chat':
            widgetContent.innerHTML = '<h3>Nhắn tin</h3><p>Chức năng nhắn tin hiện ra ở đây.</p>';
            break;
        case 'facebook':
            widgetContent.innerHTML = '<h3>Facebook</h3><p>Facebook chat hoặc thông tin sẽ hiện ra ở đây.</p>';
            break;
        case 'call':
            widgetContent.innerHTML = '<h3>Gọi điện</h3><p>Chức năng gọi điện sẽ hiện ra ở đây.</p>';
            break;
        default:
            widgetContent.innerHTML = '<h3>Tiện ích</h3><p>Nội dung của tiện ích này.</p>';
    }
    widgetBox.style.display = 'flex'; // Hiển thị widget box
    subWidgets.style.display = 'none'; // Ẩn các sub-widget
}

// Đóng widget box khi nhấn nút đóng
closeWidgetButton.addEventListener('click', function() {
    widgetBox.style.display = 'none';
});

</script>
