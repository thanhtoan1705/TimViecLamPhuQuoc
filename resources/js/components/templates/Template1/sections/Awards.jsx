import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Awards = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newAwards) => {
        onUpdate({
            ...data,
            awards: newAwards
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_awards: newTitle
        });
    };

    const renderAwardItem = (award, index) => (
        <div className="award-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newAwards = [...data.awards];
                    newAwards[index] = e.target.textContent;
                    handleUpdate(newAwards);
                }}
                suppressContentEditableWarning={true}
            >
                {award}
            </div>
        </div>
    );

    const createNewAward = () => 'Giải thưởng mới';

    return (
        <EditableSection
            title={data.title_awards}
            items={data.awards || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderAwardItem}
            addButtonText="Thêm giải thưởng"
            createNewItem={createNewAward}
            sectionClassName="awards-section"
            itemClassName="award-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Awards;
