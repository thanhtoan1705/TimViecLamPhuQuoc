import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Education = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newEducation) => {
        onUpdate({
            ...data,
            education: newEducation
        });
    };

    const renderEducationItem = (education, index) => (
        <div className="education-content">
            <div
                contentEditable={isEditable}
                className="education-degree"
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
                className="education-school"
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
            <div className="education-year">
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
        </div>
    );

    const createNewEducation = () => ({
        degree: 'Bằng cấp',
        university: 'Tên trường',
        start_year: 'Năm bắt đầu',
        end_year: 'Năm kết thúc'
    });

    return (
        <EditableSection
            title={data.title_education || "Học vấn"}
            items={data.education || []}
            onUpdate={handleUpdate}
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
