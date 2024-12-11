document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more-btn');
    const showLessBtn = document.getElementById('show-less-btn');
    const hiddenInterviews = document.getElementById('hidden-interviews');
    const interviewList = document.getElementById('interview-list');
    const loadMoreContainer = document.getElementById('load-more-container');
    const showLessContainer = document.getElementById('show-less-container');

    if (loadMoreBtn && showLessBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // Hiển thị các mục ẩn
            const content = hiddenInterviews.innerHTML;
            interviewList.insertAdjacentHTML('beforeend', content);

            // Ẩn nút "Xem thêm" và hiện nút "Thu gọn"
            loadMoreContainer.style.display = 'none';
            showLessContainer.style.display = 'block';

            // Force reflow để trigger animation
            void showLessContainer.offsetWidth;
            showLessContainer.classList.add('visible');

            // Thêm hiệu ứng fade in cho các mục mới
            const newItems = interviewList.querySelectorAll('.interview-item:nth-child(n+3)');
            newItems.forEach(item => {
                item.style.opacity = '0';
                item.style.animation = 'interview-fade-in 0.5s forwards';
            });
        });

        showLessBtn.addEventListener('click', function() {
            // Lấy tất cả các items sau item thứ 2
            const extraItems = interviewList.querySelectorAll('.interview-item:nth-child(n+3)');

            // Thêm animation fade out và xóa items
            extraItems.forEach(item => {
                item.style.animation = 'interview-fade-in 0.5s reverse';
                setTimeout(() => {
                    item.remove();
                }, 500);
            });

            // Ẩn nút "Thu gọn" và hiện nút "Xem thêm"
            showLessContainer.classList.remove('visible');
            setTimeout(() => {
                showLessContainer.style.display = 'none';
                loadMoreContainer.style.display = 'block';
            }, 300);
        });
    }
});
