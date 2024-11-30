import React from 'react';
import Avatar from '../../../common/Avatar';

const Header = ({data, onUpdate, isEditable}) => {
    const handleEdit = (field, value) => {
        const updatedData = {...data};
        updatedData[field] = value;
        onUpdate(updatedData);
    };

    return (
        <div className="t2-header">
            <div className="t2-header-main">
                <div className="t2-header-avatar">
                    <Avatar
                        image={data.avatar}
                        onImageChange={(imageUrl) => handleEdit('avatar', imageUrl)}
                        isEditable={isEditable}
                        className="header-avatar"
                    />
                </div>

                <div className="t2-header-title">
                    <div
                        className="t2-name"
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('name', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.name || 'Your Name'}
                    </div>
                    <div
                        className="t2-job-title"
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('jobTitle', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.jobTitle || 'Vị trí ứng tuyển'}
                    </div>
                </div>
            </div>

            <div className="t2-header-contact">
                <div className="t2-contact-item">
                    <i className="bi bi-calendar"></i>
                    <div
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('birthday', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.birthday || 'Ngày sinh'}
                    </div>
                </div>

                <div className="t2-contact-item">
                    <i className="bi bi-telephone"></i>
                    <div
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('phone', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.phone || 'Phone Number'}
                    </div>
                </div>

                <div className="t2-contact-item">
                    <i className="bi bi-envelope"></i>
                    <div
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('email', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.email || 'Email Address'}
                    </div>
                </div>

                <div className="t2-contact-item">
                    <i className="bi bi-geo-alt"></i>
                    <div
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('address', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.address || 'Location'}
                    </div>
                </div>
            </div>

            {data.objective && (
                <div className="t2-header-objective">
                    <div
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('objective', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.objective || 'Career Objective'}
                    </div>
                </div>
            )}
        </div>
    );
};

export default Header;
