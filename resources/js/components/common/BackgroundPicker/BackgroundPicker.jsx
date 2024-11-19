import React, {useEffect, useRef, useState} from 'react';
import './BackgroundPicker.css';

const backgroundTemplates = [
    [
        {id: 1, url: 'https://static.topcv.vn/cv-builder/assets/background/rm218batch4-ning-34.png'},
        {id: 2, url: 'https://static.topcv.vn/cv-builder/assets/background/rm309-adj-03.png'},
        {id: 3, url: 'https://static.topcv.vn/cv-builder/assets/background/SL_042620_30310_19.png'}
    ],
    [
        {id: 4, url: 'https://static.topcv.vn/cv-builder/assets/background/SL_042620_30310_36.png'},
        {id: 5, url: 'https://static.topcv.vn/cv-builder/assets/background/SL-060521-43530-07.png'},
        {id: 6, url: 'https://static.topcv.vn/cv-builder/assets/background/vivid-blurred-colorful-background.png'}
    ]
];

const BackgroundPicker = ({onBackgroundChange}) => {
    const [isOpen, setIsOpen] = useState(false);
    const dropdownRef = useRef(null);
    const fileInputRef = useRef(null);

    const handleClickOutside = (event) => {
        if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
            setIsOpen(false);
        }
    };

    useEffect(() => {
        document.addEventListener('mousedown', handleClickOutside);
        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, []);

    const handleImageUpload = (e) => {
        e.stopPropagation();
        const file = e.target.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                alert('File quá lớn. Vui lòng chọn file nhỏ hơn 5MB');
                return;
            }

            if (!file.type.startsWith('image/')) {
                alert('Vui lòng chọn file hình ảnh');
                return;
            }

            const reader = new FileReader();
            reader.onloadend = () => {
                onBackgroundChange(reader.result);
            };
            reader.onerror = () => {
                alert('Có lỗi xảy ra khi đọc file. Vui lòng thử lại');
            };
            reader.readAsDataURL(file);
        }
    };

    const handleUploadClick = (e) => {
        e.stopPropagation();
        fileInputRef.current?.click();
    };

    return (
        <div className="background-picker" ref={dropdownRef}>
            <button
                className="background-picker-btn"
                onClick={() => setIsOpen(!isOpen)}
            >
                <i className="bi bi-image"></i> Hình nền CV
            </button>

            {isOpen && (
                <div className="background-dropdown">
                    <div className="dropdown-header">
                        <h3>Chọn hình nền</h3>
                    </div>

                    <div className="background-grid">
                        {backgroundTemplates.map((row, rowIndex) => (
                            <div key={rowIndex} className="background-row">
                                {row.map((bg) => (
                                    <div
                                        key={bg.id}
                                        className="background-item"
                                        onClick={(e) => {
                                            e.stopPropagation();
                                            onBackgroundChange(bg.url);
                                            setIsOpen(false);
                                        }}
                                    >
                                        <img src={bg.url} alt={`Background ${bg.id}`}/>
                                    </div>
                                ))}
                            </div>
                        ))}
                    </div>

                    <div className="upload-section">
                        <input
                            ref={fileInputRef}
                            type="file"
                            accept="image/*"
                            onChange={handleImageUpload}
                            style={{display: 'none'}}
                        />
                        <button
                            className="upload-btn"
                            onClick={handleUploadClick}
                        >
                            <i className="bi bi-upload"></i> Tải ảnh từ máy tính
                        </button>
                    </div>
                </div>
            )}
        </div>
    );
};

export default BackgroundPicker;
