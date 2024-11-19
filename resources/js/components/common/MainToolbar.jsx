import React from 'react';
import TextFormatToolbar from './TextFormatting/TextFormatToolbar';
import './MainToolbar.css';

const MainToolbar = ({
                         onFormatText,
                         currentStyles,
                         onPrimaryColorChange,
                         primaryColor,
                         onBackgroundImageChange,
                         onDownload,
                         onPreview,
                         onSave
                     }) => {
    return (
        <div className="editor-toolbar">
            <TextFormatToolbar
                onFormatChange={onFormatText}
                currentStyles={currentStyles}
                onPrimaryColorChange={onPrimaryColorChange}
                primaryColor={primaryColor}
                onBackgroundImageChange={onBackgroundImageChange}
            />
            <div className="custom-action-buttons">
                <button onClick={onPreview} className="custom-btn preview-btn">
                    <i className="bi bi-eye-fill"></i>
                    <span>Xem trước</span>
                </button>
                <button onClick={onDownload} className="custom-btn download-btn">
                    <i className="bi bi-cloud-download-fill"></i>
                    <span>Tải xuống</span>
                </button>
                <button onClick={onSave} className="custom-btn save-btn">
                    <i className="bi bi-check2-circle"></i>
                    <span>Lưu lại</span>
                </button>
            </div>
        </div>
    );
};

export default MainToolbar;
