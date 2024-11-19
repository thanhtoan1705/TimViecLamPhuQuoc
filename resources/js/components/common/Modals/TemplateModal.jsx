import React from 'react';
import Modal from 'react-modal';

const TemplateModal = ({isOpen, onClose, templates, onSelectTemplate}) => {
    return (
        <Modal
            isOpen={isOpen}
            onRequestClose={onClose}
            className="modal-content"
            overlayClassName="modal-overlay"
        >
            <div className="modal-header">
                <h2>Chọn mẫu CV</h2>
                <button onClick={onClose} className="close-btn">
                    <i className="bi bi-x"></i>
                </button>
            </div>
            <div className="template-grid">
                {templates.map(template => (
                    <div
                        key={template.id}
                        className="template-item"
                        onClick={() => onSelectTemplate(template.id)}
                    >
                        <img src={template.thumbnail} alt={template.name}/>
                        <h3>{template.name}</h3>
                    </div>
                ))}
            </div>
        </Modal>
    );
};

export default TemplateModal;
