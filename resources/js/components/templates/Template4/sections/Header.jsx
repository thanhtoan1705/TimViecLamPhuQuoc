import React from 'react';
import Avatar from '../../../common/Avatar';

const Header = ({data, onUpdate, isEditable}) => {
    const handleEdit = (field, value) => {
        const updatedData = {...data};
        updatedData[field] = value;
        onUpdate(updatedData);
    };

    return (
        <div className="t4-header">
            <div className="t4-header-left">
                <Avatar
                    image={data.avatar}
                    onImageChange={(imageUrl) => handleEdit('avatar', imageUrl)}
                    isEditable={isEditable}
                    className="t4-avatar"
                />
            </div>

            <div className="t4-header-right">
                <h1
                    className="t4-name"
                    contentEditable={isEditable}
                    onBlur={(e) => handleEdit('name', e.target.textContent)}
                    suppressContentEditableWarning={true}
                >
                    {data.name || 'Toàn Đào TV'}
                </h1>
                <div
                    className="t4-job-title"
                    contentEditable={isEditable}
                    onBlur={(e) => handleEdit('jobTitle', e.target.textContent)}
                    suppressContentEditableWarning={true}
                >
                    {data.jobTitle || 'Vị trí ứng tuyển'}
                </div>
            </div>
        </div>
    );
};

export default Header;
