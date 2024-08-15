document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.nav-link[data-tab]');
    const tabContents = document.querySelectorAll('.tab-pane[data-tab-content]');

    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(content => content.style.display = 'none');
            tab.classList.add('active');
            const tabId = tab.getAttribute('data-tab');
            const activeContent = document.querySelector(`.tab-pane[data-tab-content="${tabId}"]`);
            if (activeContent) {
                activeContent.style.display = 'block';
            }
        });
    });
    const defaultTab = document.querySelector('.nav-link.active');
    if (defaultTab) {
        defaultTab.click();
    }
});
