import React from 'react';
import EditableSection from '../../../common/EditableSection';

const References = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newReferences) => {
        onUpdate({
            ...data,
            references: newReferences[0]
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_references: newTitle
        });
    };

    const renderReferenceItem = (reference) => (
        <div className="reference-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => handleUpdate([e.target.textContent])}
                suppressContentEditableWarning={true}
            >
                {reference}
            </div>
        </div>
    );

    const createNewReference = () => 'Thông tin người tham chiếu';

    return (
        <EditableSection
            title={data.title_references}
            items={[data.references]}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderReferenceItem}
            addButtonText="Thêm người tham chiếu"
            createNewItem={createNewReference}
            sectionClassName="references-section"
            itemClassName="reference-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default References;
