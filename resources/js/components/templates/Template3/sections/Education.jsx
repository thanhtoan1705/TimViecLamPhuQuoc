import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Education = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newEducation) => {
        onUpdate({
            ...data,
            education: newEducation
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_education: newTitle
        });
    };

    const renderEducationItem = (education, index) => (
        <div className="education-content">
            <div
                contentEditable={isEditable}
                className="degree"
                onBlur={(e) => {
                    const newEducation = [...data.education];
                    newEducation[index] = {
                        ...newEducation[index],
                        degree: e.target.textContent
                    };
                    handleUpdate(newEducation);
                }}
                suppressContentEditableWarning={true}
            >
                {education.degree}
            </div>
            <div
                contentEditable={isEditable}
                className="university"
                onBlur={(e) => {
                    const newEducation = [...data.education];
                    newEducation[index] = {
                        ...newEducation[index],
                        university: e.target.textContent
                    };
                    handleUpdate(newEducation);
                }}
                suppressContentEditableWarning={true}
            >
                {education.university}
            </div>
            <div className="year-range">
                <span
                    contentEditable={isEditable}
                    onBlur={(e) => {
                        const newEducation = [...data.education];
                        newEducation[index] = {
                            ...newEducation[index],
                            start_year: e.target.textContent
                        };
                        handleUpdate(newEducation);
                    }}
                    suppressContentEditableWarning={true}
                >
                    {education.start_year}
                </span>
                {' - '}
                <span
                    contentEditable={isEditable}
                    onBlur={(e) => {
                        const newEducation = [...data.education];
                        newEducation[index] = {
                            ...newEducation[index],
                            end_year: e.target.textContent
                        };
                        handleUpdate(newEducation);
                    }}
                    suppressContentEditableWarning={true}
                >
                    {education.end_year}
                </span>
            </div>
            <div
                contentEditable={isEditable}
                className="gpa"
                onBlur={(e) => {
                    const newEducation = [...data.education];
                    newEducation[index] = {
                        ...newEducation[index],
                        gpa: e.target.textContent
                    };
                    handleUpdate(newEducation);
                }}
                suppressContentEditableWarning={true}
            >
                {education.gpa}
            </div>
        </div>
    );

    const createNewEducation = () => ({
        degree: 'Bằng cấp',
        university: 'Tên trường',
        start_year: 'YYYY',
        end_year: 'YYYY',
        gpa: 'GPA/Điểm'
    });

    return (
        <EditableSection
            title={data.title_education}
            items={data.education || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderEducationItem}
            addButtonText="Thêm học vấn"
            createNewItem={createNewEducation}
            sectionClassName="education-section"
            itemClassName="education-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Education;
