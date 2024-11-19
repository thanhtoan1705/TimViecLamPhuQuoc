import React, {useState} from 'react';
import './SectionItem.css';

const SectionItem = ({children, onDelete, onMoveUp, onMoveDown, isEditable}) => {
    const [showControls, setShowControls] = useState(false);

    return (
        <div
            className="section-item"
            onMouseEnter={() => setShowControls(true)}
            onMouseLeave={() => setShowControls(false)}
        >
            {children}

            {isEditable && showControls && (
                <div className="section-controls">
                    <button
                        className="control-btn move-up"
                        onClick={onMoveUp}
                        title="Di chuyển lên"
                    >
                        ↑
                    </button>
                    <button
                        className="control-btn move-down"
                        onClick={onMoveDown}
                        title="Di chuyển xuống"
                    >
                        ↓
                    </button>
                    <button
                        className="control-btn delete"
                        onClick={onDelete}
                        title="Xóa"
                    >
                        ×
                    </button>
                </div>
            )}
        </div>
    );
};

export default SectionItem;
