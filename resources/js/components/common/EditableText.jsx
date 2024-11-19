import React, {useState} from 'react';

const EditableText = ({value, onChange, isEditable = true}) => {
    const [isEditing, setIsEditing] = useState(false);
    const [text, setText] = useState(value);

    const handleDoubleClick = () => {
        if (isEditable) {
            setIsEditing(true);
        }
    };

    const handleBlur = () => {
        setIsEditing(false);
        if (text !== value) {
            onChange(text);
        }
    };

    const handleKeyDown = (e) => {
        if (e.key === 'Enter') {
            handleBlur();
        }
    };

    if (isEditing) {
        return (
            <input
                type="text"
                value={text}
                onChange={(e) => setText(e.target.value)}
                onBlur={handleBlur}
                onKeyDown={handleKeyDown}
                autoFocus
                className="editable-input"
            />
        );
    }

    return (
        <span
            onDoubleClick={handleDoubleClick}
            style={{cursor: isEditable ? 'pointer' : 'default'}}
        >
            {value}
        </span>
    );
};

export default EditableText;
