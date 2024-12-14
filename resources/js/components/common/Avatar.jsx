import React from 'react';
import './Avatar.css';

const Avatar = ({image, onImageChange, isEditable, className = ''}) => {
    const handleAvatarUpload = (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                onImageChange(reader.result);
            };
            reader.readAsDataURL(file);
        }
    };

    return (
        <div className={`avatar-container ${className}`}>
            <div className="avatar-wrapper">
                {image ? (
                    <img
                        src={image}
                        alt="Avatar"
                        className="avatar-image"
                    />
                ) : (
                    <div className="avatar-placeholder">
                        <i className="bi bi-person"></i>
                    </div>
                )}

                {isEditable && (
                    <div className="avatar-overlay">
                        <input
                            type="file"
                            id="avatar-upload"
                            accept="image/*"
                            onChange={handleAvatarUpload}
                            style={{display: 'none'}}
                        />
                        <label htmlFor="avatar-upload" className="upload-button">
                            <i className="bi bi-camera-fill"></i>
                            <span>Thay đổi ảnh</span>
                        </label>
                    </div>
                )}
            </div>
        </div>
    );
};

export default Avatar;
