import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Experience = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newExperiences) => {
        onUpdate({
            ...data,
            work_experience: newExperiences
        });
    };

    const renderExperienceItem = (experience, index) => (
        <div className="experience-content">
            <div
                contentEditable={isEditable}
                className="position"
                onBlur={(e) => {
                    const newExperiences = [...data.work_experience];
                    newExperiences[index] = {
                        ...newExperiences[index],
                        position: e.target.textContent
                    };
                    handleUpdate(newExperiences);
                }}
                suppressContentEditableWarning={true}
            >
                {experience.position}
            </div>
            <div
                contentEditable={isEditable}
                className="company"
                onBlur={(e) => {
                    const newExperiences = [...data.work_experience];
                    newExperiences[index] = {
                        ...newExperiences[index],
                        company: e.target.textContent
                    };
                    handleUpdate(newExperiences);
                }}
                suppressContentEditableWarning={true}
            >
                {experience.company}
            </div>
            <div className="date-range">
                <span
                    contentEditable={isEditable}
                    onBlur={(e) => {
                        const newExperiences = [...data.work_experience];
                        newExperiences[index] = {
                            ...newExperiences[index],
                            start_date: e.target.textContent
                        };
                        handleUpdate(newExperiences);
                    }}
                    suppressContentEditableWarning={true}
                >
                    {experience.start_date}
                </span>
                {' - '}
                <span
                    contentEditable={isEditable}
                    onBlur={(e) => {
                        const newExperiences = [...data.work_experience];
                        newExperiences[index] = {
                            ...newExperiences[index],
                            end_date: e.target.textContent
                        };
                        handleUpdate(newExperiences);
                    }}
                    suppressContentEditableWarning={true}
                >
                    {experience.end_date}
                </span>
            </div>
            <div
                contentEditable={isEditable}
                className="responsibilities"
                onBlur={(e) => {
                    const newExperiences = [...data.work_experience];
                    newExperiences[index] = {
                        ...newExperiences[index],
                        responsibilities: e.target.textContent
                    };
                    handleUpdate(newExperiences);
                }}
                suppressContentEditableWarning={true}
            >
                {experience.responsibilities}
            </div>
        </div>
    );

    const createNewExperience = () => ({
        position: 'Vị trí công việc',
        company: 'Tên công ty',
        start_date: 'Bắt đầu',
        end_date: 'Kết thúc',
        responsibilities: 'Mô tả công việc của bạn'
    });

    return (
        <EditableSection
            title={data.title_work_experience || "Kinh nghiệm làm việc"}
            items={data.work_experience || []}
            onUpdate={handleUpdate}
            isEditable={isEditable}
            renderItem={renderExperienceItem}
            addButtonText="Thêm kinh nghiệm"
            createNewItem={createNewExperience}
            sectionClassName="experience-section"
            itemClassName="experience-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Experience;
