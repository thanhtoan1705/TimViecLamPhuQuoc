import React, { useState, useRef, useEffect } from 'react';
import '/resources/css/EditableField.css';

const EditableField = ({ value, onChange, placeholder, tag = 'span', className = '' }) => {
    const [isEditing, setIsEditing] = useState(false);
    const [inputValue, setInputValue] = useState(value);
    const inputRef = useRef(null);

    useEffect(() => {
        if (isEditing && inputRef.current) {
            inputRef.current.focus();
        }
    }, [isEditing]);

    useEffect(() => {
        setInputValue(value);
    }, [value]);

    const handleBlur = () => {
        setIsEditing(false);
        onChange(inputValue);
    };

    const handleClick = () => {
        setIsEditing(true);
    };

    const handleChange = (e) => {
        setInputValue(e.target.value);
    };

    const Tag = tag;

    return (
        <Tag className={`editable-field-wrapper ${className}`}>
            {isEditing ? (
                <input
                    ref={inputRef}
                    type="text"
                    value={inputValue}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    className="editable-input"
                    placeholder={placeholder}
                />
            ) : (
                <span onClick={handleClick} className="editable-text">
                    {value || placeholder}
                </span>
            )}
        </Tag>
    );
};

export default EditableField;
