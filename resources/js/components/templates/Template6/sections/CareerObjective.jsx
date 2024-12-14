import React from 'react';
import EditableSection from '../../../common/EditableSection';

const CareerObjective = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newObjective) => {
        onUpdate({
            ...data,
            career_objective: newObjective[0]
        });
    };

    const renderObjectiveItem = (objective) => (
        <div className="objective-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => handleUpdate([e.target.textContent])}
                suppressContentEditableWarning={true}
            >
                {objective}
            </div>
        </div>
    );

    const createNewObjective = () => 'Mục tiêu nghề nghiệp của bạn';

    return (
        <EditableSection
            title={data.title_career_objective}
            items={[data.career_objective]}
            onUpdate={handleUpdate}
            isEditable={isEditable}
            renderItem={renderObjectiveItem}
            createNewItem={createNewObjective}
            sectionClassName="career-objective-section"
            itemClassName="objective-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default CareerObjective;
