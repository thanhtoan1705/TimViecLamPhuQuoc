<div class="widget-container">
    <div class="main-button" id="mainButton">
        <span>+</span>
    </div>
    <div class="sub-widgets" id="subWidgets">
        <div class="widget chat-widget" data-widget="chat">
            <i class="fa fa-comment"></i>
        </div>
        <div class="widget facebook-widget" data-widget="facebook">
            <i class="bi bi-facebook"></i>
        </div>
        <div class="widget call-widget" data-widget="call">
            <i class="fa fa-phone"></i>
        </div>
    </div>
</div>

<div class="widget-box" id="widgetBox">
    <div class="widget-content" id="widgetContent">
    </div>
    <button id="closeWidget">Đóng</button>
</div>

<script> window.chtlConfig = {chatbotId: "1266831931"} </script>
<script async data-id="1266831931" id="chatling-embed-script" type="text/javascript"
        src="https://chatling.ai/js/embed.js"></script>

<script>
    const mainButton = document.getElementById('mainButton');
    const subWidgets = document.getElementById('subWidgets');
    const widgetBox = document.getElementById('widgetBox');
    const widgetContent = document.getElementById('widgetContent');
    const closeWidgetButton = document.getElementById('closeWidget');

    mainButton.addEventListener('click', function () {
        if (subWidgets.style.display === 'none' || subWidgets.style.display === '') {
            subWidgets.style.display = 'flex';
        } else {
            subWidgets.style.display = 'none';
        }
    });

    const widgets = document.querySelectorAll('.widget');
    widgets.forEach(widget => {
        widget.addEventListener('click', function () {
            const widgetType = widget.getAttribute('data-widget');
            showWidgetContent(widgetType);
        });
    });

function showWidgetContent(widgetType) {
    switch(widgetType) {
        case 'chat':
            widgetContent.innerHTML = '<h3>Nhắn tin</h3><p>Chức năng nhắn tin hiện ra ở đây.</p>';
            break;
        case 'facebook':
            widgetContent.innerHTML = '<h3>Facebook</h3><p>Facebook chat hoặc thông tin sẽ hiện ra ở đây.</p>';
            window.open('https://www.messenger.com/t/473205499198988', '_blank');
            break;
        case 'call':
            widgetContent.innerHTML = '<h3>Gọi điện</h3><p>Chức năng gọi điện sẽ hiện ra ở đây.</p>';
            break;
        default:
            widgetContent.innerHTML = '<h3>Tiện ích</h3><p>Nội dung của tiện ích này.</p>';
    }
    widgetBox.style.display = 'flex';
    subWidgets.style.display = 'none';
}

    closeWidgetButton.addEventListener('click', function () {
        widgetBox.style.display = 'none';
    });

</script>
