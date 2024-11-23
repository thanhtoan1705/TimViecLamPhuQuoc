import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Skills = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newSkills) => {
        onUpdate({
            ...data,
            skills: newSkills
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_skills: newTitle
        });
    };

    const renderSkillItem = (skill, index) => (
        <div className="skill-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newSkills = [...data.skills];
                    newSkills[index] = e.target.textContent;
                    handleUpdate(newSkills);
                }}
                suppressContentEditableWarning={true}
            >
                {skill}
            </div>
        </div>
    );

    const createNewSkill = () => 'Kỹ năng mới';

    return (
        <EditableSection
            title={data.title_skills}
            items={data.skills || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderSkillItem}
            addButtonText="Thêm kỹ năng"
            createNewItem={createNewSkill}
            sectionClassName="skills-section"
            itemClassName="skill-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Skills;
