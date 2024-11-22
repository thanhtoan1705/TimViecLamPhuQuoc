import React from 'react';
import './Modal.css';

const PreviewModal = ({isOpen, onClose, children}) => {
    if (!isOpen) return null;

    return (
        <div className="preview-modal-overlay">
            <div className="preview-modal-content">
                <div className="modal-header pt-0">
                    <h2>Xem trước CV</h2>
                    <button onClick={onClose} className="close-button">×</button>
                </div>
                <div className="preview-content">
                    <div className="preview-wrapper">
                        {children}
                    </div>
                </div>
                <div className="modal-actions">
                    <button onClick={onClose} className="preview-modal-close">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    );
};

export default PreviewModal;
