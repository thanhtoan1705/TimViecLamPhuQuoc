import React, {useState} from 'react';

const EditableField = ({
                           value,
                           onUpdate,
                           isEditable,
                           className = '',
                           tag = 'p',
                           prefix = null
                       }) => {
    const [isEditing, setIsEditing] = useState(false);
    const [tempValue, setTempValue] = useState(value);

    const handleDoubleClick = () => {
        if (isEditable) {
            setIsEditing(true);
        }
    };

    const handleBlur = () => {
        setIsEditing(false);
        if (tempValue !== value) {
            onUpdate(tempValue);
        }
    };

    const handleKeyDown = (e) => {
        if (e.key === 'Enter') {
            handleBlur();
        }
    };

    if (!isEditing) {
        const Tag = tag;
        return (
            <Tag
                className={className}
                onDoubleClick={handleDoubleClick}
                style={{cursor: isEditable ? 'pointer' : 'default'}}
            >
                {prefix} {value}
            </Tag>
        );
    }

    return (
        <input
            type="text"
            value={tempValue}
            onChange={(e) => setTempValue(e.target.value)}
            onBlur={handleBlur}
            onKeyDown={handleKeyDown}
            autoFocus
            className={`editable-input ${className}`}
        />
    );
};

export default EditableField;
