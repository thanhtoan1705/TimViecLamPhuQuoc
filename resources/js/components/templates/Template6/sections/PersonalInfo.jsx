import React from 'react';
import EditableSection from '../../../common/EditableSection';

const PersonalInfo = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const personalInfoArray = [
        {label: 'Địa chỉ', value: data.address},
        {label: 'Điện thoại', value: data.phone},
        {label: 'Email', value: data.email},
        {label: 'Ngày sinh', value: data.birthday},
        {label: 'Website', value: data.website}
    ].filter(item => item.value);

    const handleUpdate = (newInfo) => {
        const updatedData = {...data};
        newInfo.forEach(item => {
            const [label, value] = item.split(': ');
            switch (label) {
                case 'Ngày sinh':
                    updatedData.birthday = value;
                    break;
                case 'Email':
                    updatedData.email = value;
                    break;
                case 'Điện thoại':
                    updatedData.phone = value;
                    break;
                case 'Website':
                    updatedData.website = value;
                    break;
                case 'Địa chỉ':
                    updatedData.address = value;
                    break;
            }
        });
        onUpdate(updatedData);
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_personalInfo: newTitle
        });
    };

    const renderInfoItem = (info, index) => (
        <div className="info-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newInfo = personalInfoArray.map((item, i) =>
                        i === index ? e.target.textContent : `${item.label}: ${item.value}`
                    );
                    handleUpdate(newInfo);
                }}
                suppressContentEditableWarning={true}
            >
                {`${info.label}: ${info.value}`}
            </div>
        </div>
    );

    const createNewInfo = () => 'Thông tin mới: Giá trị';

    return (
        <EditableSection
            title={data.title_personal_info}
            items={personalInfoArray}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderInfoItem}
            addButtonText="Thêm thông tin"
            createNewItem={createNewInfo}
            sectionClassName="personal-info-section"
            itemClassName="info-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default PersonalInfo;
