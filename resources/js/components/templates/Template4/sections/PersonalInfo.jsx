import React from 'react';
import EditableSection from '../../../common/EditableSection';

const PersonalInfo = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const personalInfoArray = [
        {icon: 'fas fa-phone', value: data.phone},
        {icon: 'fas fa-user', value: data.gender},
        {icon: 'fas fa-envelope', value: data.email},
        {icon: 'fas fa-calendar', value: data.birthday},
        {icon: 'fas fa-link', value: data.website},
        {icon: 'fas fa-map-marker-alt', value: data.address}
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
                    break;            }
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
        <div className="contact-item">
            <span
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newInfo = personalInfoArray.map((item, i) =>
                        i === index ? e.target.textContent : item.value
                    );
                    handleUpdate(newInfo);
                }}
                suppressContentEditableWarning={true}
            >
                {info.value}
            </span>
        </div>
    );

    const createNewInfo = () => 'Thông tin mới: Giá trị';

    return (
        <div className="contact-info">
            <div className="contact-icons">
                {personalInfoArray.map(item => (
                    <i className={item.icon}></i>
                ))}
            </div>
            <div className="contact-details">
                {personalInfoArray.map((info, index) => renderInfoItem(info, index))}
            </div>
        </div>
    );
};

export default PersonalInfo;
