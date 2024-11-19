import React, {useEffect, useState} from 'react';
import TextFormatToolbar from './TextFormatToolbar';
import './TextEditor.css';

const TextEditor = ({onFormatChange}) => {
    const [textFormat, setTextFormat] = useState({
        fontFamily: 'Arial, sans-serif',
        fontSize: '14px',
        fontWeight: 'normal',
        fontStyle: 'normal',
        textDecoration: 'none',
        color: '#000000',
        primaryColor: '#10b981'
    });

    const [selection, setSelection] = useState(null);

    useEffect(() => {
        const handleSelectionChange = () => {
            const selection = window.getSelection();
            if (selection.rangeCount > 0) {
                setSelection(selection.getRangeAt(0));
            }
        };

        document.addEventListener('selectionchange', handleSelectionChange);
        return () => document.removeEventListener('selectionchange', handleSelectionChange);
    }, []);

    const handleFormatText = (formatType, value) => {
        if (!selection) return;

        const span = document.createElement('span');
        let updatedFormat = {...textFormat};

        switch (formatType) {
            case 'bold':
                span.style.fontWeight = textFormat.fontWeight === 'bold' ? 'normal' : 'bold';
                updatedFormat.fontWeight = span.style.fontWeight;
                break;
            case 'italic':
                span.style.fontStyle = textFormat.fontStyle === 'italic' ? 'normal' : 'italic';
                updatedFormat.fontStyle = span.style.fontStyle;
                break;
            case 'underline':
                span.style.textDecoration = textFormat.textDecoration === 'underline' ? 'none' : 'underline';
                updatedFormat.textDecoration = span.style.textDecoration;
                break;
            case 'fontFamily':
                span.style.fontFamily = value;
                updatedFormat.fontFamily = value;
                break;
            case 'fontSize':
                span.style.fontSize = value;
                updatedFormat.fontSize = value;
                break;
            case 'color':
                span.style.color = value;
                updatedFormat.color = value;
                break;
            case 'primaryColor':
                updatedFormat.primaryColor = value;
                break;
        }

        setTextFormat(updatedFormat);
        onFormatChange(updatedFormat);

        // Áp dụng định dạng cho văn bản đã chọn
        const range = selection.cloneRange();
        range.surroundContents(span);
        selection.removeAllRanges();
        selection.addRange(range);
    };

    return (
        <div className="text-editor">
            <TextFormatToolbar
                textFormat={textFormat}
                onFormatChange={handleFormatText}
            />
        </div>
    );
};

export default TextEditor;
