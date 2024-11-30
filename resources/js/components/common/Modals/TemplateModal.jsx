import React from 'react';
import './Modal.css';

const TemplateModal = ({isOpen, onClose, templates, onSelectTemplate, currentTemplateId}) => {
    if (!isOpen) return null;

    return (
        <div className="section-modal">
            <div className="section-modal-header">
                <h3>Đổi mẫu CV</h3>
                <button onClick={onClose} className="close-button">
                    <i className="bi bi-x"></i>
                </button>
            </div>

            <div className="section-modal-content">
                <div className="section-group">
                    <div className="template-grid">
                        {templates.map(template => (
                            <div
                                key={template.id}
                                className={`template-item ${template.id === currentTemplateId ? 'active' : ''}`}
                                onClick={() => onSelectTemplate(template.id)}
                            >
                                <div className="template-image">
                                    <img src={`${window.appUrl}/storage/${template.template_image}`}
                                         alt={template.template_name}/>
                                </div>
                                <div className="template-info">
                                    <span>{template.template_name}</span>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default TemplateModal;
