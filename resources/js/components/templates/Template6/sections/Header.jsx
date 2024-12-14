import React from 'react';
import Avatar from '../../../common/Avatar';

const Header = ({data, onUpdate, isEditable}) => {
    const handleEdit = (field, value) => {
        const updatedData = {...data};
        updatedData[field] = value;
        onUpdate(updatedData);
    };

    return (
        <div className="t6-header">
            <div className="t6-header-left">
                <Avatar
                    image={data.avatar}
                    onImageChange={(imageUrl) => handleEdit('avatar', imageUrl)}
                    isEditable={isEditable}
                    className="t6-avatar"
                />
            </div>

            <div className="t6-header-right">
                <div className="t6-name-title">
                    <h1
                        className="t6-name"
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('name', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.name || 'Toàn Đào TV'}
                    </h1>
                    <div
                        className="t6-job-title"
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('jobTitle', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.jobTitle || 'Vị trí ứng tuyển'}
                    </div>
                </div>

                <div
                    className="t6-objective"
                    contentEditable={isEditable}
                    onBlur={(e) => handleEdit('objective', e.target.textContent)}
                    suppressContentEditableWarning={true}
                >
                    {data.objective || 'Mục tiêu nghề nghiệp của bạn, bao gồm mục tiêu ngắn hạn và dài hạn'}
                </div>
            </div>
        </div>
    );
};

export default Header;
