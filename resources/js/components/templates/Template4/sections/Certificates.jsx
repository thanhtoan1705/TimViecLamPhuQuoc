import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Certificates = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newCertificates) => {
        onUpdate({
            ...data,
            certificates: newCertificates
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_certificates: newTitle
        });
    };

    const renderCertificateItem = (certificate, index) => (
        <div className="certificate-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newCertificates = [...data.certificates];
                    newCertificates[index] = e.target.textContent;
                    handleUpdate(newCertificates);
                }}
                suppressContentEditableWarning={true}
            >
                {certificate}
            </div>
        </div>
    );

    const createNewCertificate = () => 'Chứng chỉ mới';

    return (
        <EditableSection
            title={data.title_certificates}
            items={data.certificates || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderCertificateItem}
            addButtonText="Thêm chứng chỉ"
            createNewItem={createNewCertificate}
            sectionClassName="certificates-section"
            itemClassName="certificate-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Certificates;
