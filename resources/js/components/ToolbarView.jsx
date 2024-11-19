import React from 'react';
import EditorToolbar from './common/EditorToolbar';

const ToolbarView = ({onFormatChange, onColorChange, onDownloadClick, onPreviewClick, onSave}) => {
    return (
        <EditorToolbar
            onFormatChange={onFormatChange}
            onColorChange={onColorChange}
            onDownload={onDownloadClick}
            onPreview={onPreviewClick}
            onSave={onSave}
        />
    );
};

export default ToolbarView;
