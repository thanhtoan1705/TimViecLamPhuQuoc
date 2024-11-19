import React from 'react';
import './BackgroundImageModal.css';

const backgroundTemplates = [
    {id: 1, url: 'https://static.topcv.vn/cv-builder/assets/background/rm218batch4-ning-34.png', name: 'Hình nền 1'},
    {id: 2, url: 'https://static.topcv.vn/cv-builder/assets/background/rm309-adj-03.png', name: 'Hình nền 2'},
    {id: 3, url: 'https://static.topcv.vn/cv-builder/assets/background/SL_042620_30310_19.png', name: 'Hình nền 3'},
    {id: 4, url: 'https://static.topcv.vn/cv-builder/assets/background/SL_042620_30310_36.png', name: 'Hình nền 4'},
    {id: 5, url: 'https://static.topcv.vn/cv-builder/assets/background/SL-060521-43530-07.png', name: 'Hình nền 5'},
];

const BackgroundImageModal = ({isOpen, onClose, onApply}) => {
    const [selectedImage, setSelectedImage] = React.useState(null);
    const [uploadedImage, setUploadedImage] = React.useState(null);

    const handleImageUpload = (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                setUploadedImage(reader.result);
                setSelectedImage(reader.result);
            };
            reader.readAsDataURL(file);
        }
    };

    const handleApply = () => {
        if (selectedImage) {
            onApply(selectedImage);
            onClose();
        }
    };

    if (!isOpen) return null;

    return (
        <div className="background-modal-overlay">
            <div className="background-modal">
                <div className="modal-header">
                    <h3>Chọn hình nền</h3>
                    <button className="close-btn" onClick={onClose}>&times;</button>
                </div>

                <div className="background-templates">
                    {backgroundTemplates.map((template) => (
                        <div
                            key={template.id}
                            className={`template-item ${selectedImage === template.url ? 'selected' : ''}`}
                            onClick={() => setSelectedImage(template.url)}
                        >
                            <img src={template.url} alt={template.name}/>
                            <span>{template.name}</span>
                        </div>
                    ))}
                </div>

                <div className="upload-section">
                    <label className="upload-btn">
                        <input
                            type="file"
                            accept="image/*"
                            onChange={handleImageUpload}
                            hidden
                        />
                        Tải ảnh từ máy tính
                    </label>
                    {uploadedImage && (
                        <div className="uploaded-preview">
                            <img src={uploadedImage} alt="Uploaded background"/>
                        </div>
                    )}
                </div>

                <div className="modal-actions">
                    <button className="cancel-btn" onClick={onClose}>Hủy</button>
                    <button
                        className="apply-btn"
                        onClick={handleApply}
                        disabled={!selectedImage}
                    >
                        Áp dụng
                    </button>
                </div>
            </div>
        </div>
    );
};

export default BackgroundImageModal;
