import React, {useState} from 'react';
import './TextFormatToolbar.css';
import BackgroundImageModal from '../Modals/BackgroundImageModal';
import BackgroundPicker from '../BackgroundPicker/BackgroundPicker';

const TextFormatToolbar = ({
                               onFormatChange,
                               currentStyles,
                               onPrimaryColorChange,
                               primaryColor,
                               onBackgroundImageChange
                           }) => {
    const [isBackgroundModalOpen, setIsBackgroundModalOpen] = useState(false);

    const toggleStyle = (type, currentValue, toggleValue) => {
        onFormatChange(type, currentValue === toggleValue ? 'normal' : toggleValue);
    };

    return (
        <div className="format-controls">
            <div className="format-group">
                <button
                    onClick={() => toggleStyle('fontWeight', currentStyles?.fontWeight, 'bold')}
                    className={`format-btn ${currentStyles?.fontWeight === 'bold' ? 'active' : ''}`}
                >
                    <i className="bi bi-type-bold"></i>
                </button>
                <button
                    onClick={() => toggleStyle('fontStyle', currentStyles?.fontStyle, 'italic')}
                    className={`format-btn ${currentStyles?.fontStyle === 'italic' ? 'active' : ''}`}
                >
                    <i className="bi bi-type-italic"></i>
                </button>
                <button
                    onClick={() => toggleStyle('textDecoration', currentStyles?.textDecoration, 'underline')}
                    className={`format-btn ${currentStyles?.textDecoration.includes('underline') ? 'active' : ''}`}
                >
                    <i className="bi bi-type-underline"></i>
                </button>
            </div>

            <div className="format-group">
                <select
                    value={currentStyles?.fontFamily || 'Arial, sans-serif'}
                    onChange={(e) => onFormatChange('fontFamily', e.target.value)}
                    className="format-select"
                >
                    <option value="Arial, sans-serif">Arial</option>
                    <option value="Times New Roman, serif">Times New Roman</option>
                    <option value="Roboto, sans-serif">Roboto</option>
                </select>

                <select
                    value={currentStyles?.fontSize || '14px'}
                    onChange={(e) => onFormatChange('fontSize', e.target.value)}
                    className="format-select"
                >
                    {[12, 14, 16, 18, 20, 24].map(size => (
                        <option key={size} value={`${size}px`}>{size}px</option>
                    ))}
                </select>
            </div>

            <div className="format-group">
                <div className="color-control">
                    <label>Màu chữ:</label>
                    <input
                        type="color"
                        value={currentStyles?.color || '#000000'}
                        onChange={(e) => onFormatChange('color', e.target.value)}
                        className="color-picker"
                        title="Màu chữ"
                    />
                </div>
                <div className="color-control">
                    <label>Màu chủ đạo:</label>
                    <input
                        type="color"
                        value={primaryColor || '#10b981'}
                        onChange={(e) => onPrimaryColorChange(e.target.value)}
                        className="color-picker"
                        title="Màu chủ đạo"
                    />
                </div>
                <div className="format-group">
                    <BackgroundPicker onBackgroundChange={onBackgroundImageChange}/>
                </div>
            </div>

            <BackgroundImageModal
                isOpen={isBackgroundModalOpen}
                onClose={() => setIsBackgroundModalOpen(false)}
                onApply={onBackgroundImageChange}
            />
        </div>
    );
};

export default TextFormatToolbar;
