<button id="contactButton" class="contact-button">
    <i style="font-size: 25px;" class="bi bi-envelope"></i>
</button>

<div id="contactForm" class="contact-form hidden">
    <div class="form-header">
        <h4>Liên hệ với chúng tôi</h4>
        <button id="closeForm" class="close-button">&times;</button>
    </div>
    <form action="{{ route('client.client.contact') }}" method="post">
        @csrf
        <label for="name">Tên của bạn:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Nội dung:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Gửi</button>
    </form>
</div>

<style>
    .contact-button {
        position: fixed;
        bottom: 90px;
        left: 20px;
        background-color: #3c65f5;
        color: white;
        border: none;
        padding: 13px 16px;
        border-radius: 100px;
        cursor: pointer;
        font-size: 16px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s;
        z-index: 1000;
    }

    .contact-button:hover {
        scale: 1.1;
        transition: 0.2s;
    }

    .contact-form {
        position: fixed;
        bottom: 80px;
        left: 20px;
        width: 350px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: none;
        z-index: 9999;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .close-button {
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        color: #888;
    }

    .close-button:hover {
        color: #333;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .contact-form button[type="submit"] {
        width: 100%;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .contact-form button[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Ẩn form */
    .hidden {
        display: none;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {

        const contactButton = document.getElementById('contactButton');
        const contactForm = document.getElementById('contactForm');
        const closeFormButton = document.getElementById('closeForm');

        contactButton.addEventListener('click', () => {
            contactForm.style.display =
                contactForm.style.display === 'none' || contactForm.style.display === ''
                    ? 'block' : 'none';
        });

        closeFormButton.addEventListener('click', () => {
            contactForm.style.display = 'none';
        });
    });
</script>
