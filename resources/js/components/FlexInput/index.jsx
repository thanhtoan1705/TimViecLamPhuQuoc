import React, { useRef, useEffect } from "react";

const FlexInput = ({ className, defaultValue, setCurrent }) => {
    const inputRef = useRef(null);

    useEffect(() => {
        adjustInputHeight();
    }, [defaultValue]);

    const adjustInputHeight = () => {
        if (inputRef.current) {
            inputRef.current.style.height = 'auto';
            inputRef.current.style.height = inputRef.current.scrollHeight + 'px';
        }
    };

    const handleInput = (e) => {
        adjustInputHeight();
        setCurrent(e.target.value);
    };

    return (
        <input
            ref={inputRef}
            type="text"
            className={`flex-input ${className}`}
            defaultValue={defaultValue}
            onChange={handleInput}
        />
    );
};

export default FlexInput;
