import React from 'react';
import Avatar from '../../../common/Avatar';

const Header = ({data, onUpdate, isEditable}) => {
    const handleEdit = (field, value) => {
        console.log('Header editing:', field, value);
        onUpdate(field, value);
    };

    const handleAvatarChange = (imageUrl) => {
        onUpdate('avatar', imageUrl);
    };

    return (
        <header className="cv-header">
            <div className="profile-section">
                <div className="profile-image-container">
                    <Avatar
                        image={data.avatar}
                        onImageChange={handleAvatarChange}
                        isEditable={isEditable}
                    />
                </div>

                <div className="profile-info">
                    <h1
                        className="profile-name"
                        contentEditable={isEditable}
                        onBlur={(e) => handleEdit('name', e.target.textContent)}
                        suppressContentEditableWarning={true}
                    >
                        {data.name}
                    </h1>

                    <div className="contact-info">
                        <p>
                            <i className="bi bi-telephone"></i>
                            <span
                                contentEditable={isEditable}
                                onBlur={(e) => handleEdit('phone', e.target.textContent)}
                                suppressContentEditableWarning={true}
                            >
                                {data.phone}
                            </span>
                        </p>
                        <p>
                            <i className="bi bi-envelope"></i>
                            <span
                                contentEditable={isEditable}
                                onBlur={(e) => handleEdit('email', e.target.textContent)}
                                suppressContentEditableWarning={true}
                            >
                                {data.email}
                            </span>
                        </p>
                        <p>
                            <i className="bi bi-geo-alt"></i>
                            <span
                                contentEditable={isEditable}
                                onBlur={(e) => handleEdit('address', e.target.textContent)}
                                suppressContentEditableWarning={true}
                            >
                                {data.address}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </header>
    );
};

export default Header;
