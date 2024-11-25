import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Extracurricular = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newActivities) => {
        onUpdate({
            ...data,
            extracurricular: newActivities
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_extracurricular: newTitle
        });
    };

    const renderActivityItem = (activity, index) => (
        <div className="activity-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newActivities = [...data.extracurricular];
                    newActivities[index] = e.target.textContent;
                    handleUpdate(newActivities);
                }}
                suppressContentEditableWarning={true}
            >
                {activity}
            </div>
        </div>
    );

    const createNewActivity = () => 'Hoạt động mới';

    return (
        <EditableSection
            title={data.title_extracurricular}
            items={data.extracurricular || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderActivityItem}
            addButtonText="Thêm hoạt động"
            createNewItem={createNewActivity}
            sectionClassName="extracurricular-section"
            itemClassName="activity-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Extracurricular;
