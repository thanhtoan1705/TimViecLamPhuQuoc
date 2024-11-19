import React from 'react';
import './Modal.css';

const SectionModal = ({isOpen, onClose, unusedSections, onAddSection}) => {
    if (!isOpen) return null;

    const handleSectionClick = (sectionId) => {
        onAddSection(sectionId);
    };

    return (
        <div className="section-modal">
            <div className="section-modal-header">
                <h3>Thêm mục</h3>
                <button onClick={onClose} className="close-button">
                    <i className="bi bi-x"></i>
                </button>
            </div>

            <div className="section-modal-content">
                <div className="section-group">
                    <h4>Mục chưa sử dụng</h4>
                    <p className="section-hint">Kéo và thả mục bất kỳ vào vị trí bạn muốn thêm trên CV</p>
                    {unusedSections.map(section => (
                        <div
                            key={section.id}
                            className="section-item"
                            onClick={() => handleSectionClick(section.id)}
                        >
                            <div className="section-item-icon">
                                <i className="bi bi-grip-vertical"></i>
                            </div>
                            <span>{section.name}</span>
                            <div className="section-item-actions">
                                <i className="bi bi-three-dots-vertical"></i>
                            </div>
                        </div>
                    ))}
                </div>

                <div className="section-group">
                    <h4>Mục đã sử dụng</h4>
                    <p className="section-hint">Click để xem vị trí của mục trên CV</p>
                </div>
            </div>
        </div>
    );
};

export default SectionModal;
