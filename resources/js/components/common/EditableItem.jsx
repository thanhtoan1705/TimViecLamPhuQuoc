import React, {useState} from 'react';
import './EditableItem.css';

const EditableItem = ({
                          children,
                          onDelete,
                          onMoveUp,
                          onMoveDown,
                          isEditable,
                          className = ''
                      }) => {
    const [showControls, setShowControls] = useState(false);

    return (
        <div
            className={`editable-item ${className}`}
            onMouseEnter={() => setShowControls(true)}
            onMouseLeave={() => setShowControls(false)}
        >
            {children}

            {isEditable && showControls && (
                <div className="item-controls">
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

export default EditableItem;
