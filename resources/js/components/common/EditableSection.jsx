import React, {useEffect, useRef, useState} from 'react';
import './EditableSection.css';

const EditableSection = ({
                             title,
                             items,
                             onUpdate,
                             isEditable,
                             renderItem,
                             addButtonText = "Thêm",
                             createNewItem,
                             sectionClassName = "",
                             itemClassName = "",
                             onDeleteSection,
                             onTitleUpdate
                         }) => {
    const [activeItemIndex, setActiveItemIndex] = useState(null);
    const sectionRef = useRef(null);

    const handleDelete = (index) => {
        const newItems = [...items];
        newItems.splice(index, 1);
        onUpdate(newItems);
        setActiveItemIndex(null);
    };

    const handleMove = (index, direction) => {
        const newItems = [...items];
        const newIndex = index + direction;

        if (newIndex >= 0 && newIndex < newItems.length) {
            [newItems[index], newItems[newIndex]] =
                [newItems[newIndex], newItems[index]];
            onUpdate(newItems);
            setActiveItemIndex(newIndex);
        }
    };

    const handleAdd = () => {
        const newItems = [...items, createNewItem()];
        onUpdate(newItems);
    };

    const handleItemClick = (index, e) => {
        if (e.target.getAttribute('contenteditable') === 'true' &&
            document.activeElement === e.target) {
            return;
        }
        e.stopPropagation();
        setActiveItemIndex(activeItemIndex === index ? null : index);
    };

    const handleTitleUpdate = (e) => {
        if (onTitleUpdate) {
            onTitleUpdate(e.target.textContent);
        }
    };

    // Xử lý click outside
    useEffect(() => {
        const handleClickOutside = (event) => {
            if (sectionRef.current && !sectionRef.current.contains(event.target)) {
                setActiveItemIndex(null);
            }
        };

        document.addEventListener('mousedown', handleClickOutside);
        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, []);

    return (
        <section className={`editable-section ${sectionClassName}`} ref={sectionRef}>
            <div className="section-header">
                <h2
                    className="editable-section-heading"
                    contentEditable={isEditable}
                    onBlur={handleTitleUpdate}
                    suppressContentEditableWarning={true}
                >
                    {title}
                </h2>
                {/* {isEditable && onDeleteSection && (
                    <button
                        className="section-delete-btn"
                        onClick={onDeleteSection}
                        title="Xóa section"
                    >
                        ×
                    </button>
                )} */}
            </div>

            <div className={`section-content ${activeItemIndex !== null ? 'has-active-item' : ''}`}>
                {items.map((item, index) => (
                    <div
                        key={index}
                        className={`editable-item ${itemClassName} ${activeItemIndex === index ? 'active' : ''}`}
                    >
                        <div
                            className="item-wrapper"
                            onClick={(e) => isEditable && handleItemClick(index, e)}
                        >
                            <div className="item-content">
                                {renderItem(item, index)}
                            </div>

                            {isEditable && activeItemIndex === index && (
                                <div className="controls-menu">
                                    <div className="controls-buttons">
                                        <button
                                            onClick={(e) => {
                                                e.stopPropagation();
                                                handleAdd();
                                            }}
                                            className="control-btn add"
                                            title="Thêm mới"
                                        >
                                            +
                                        </button>
                                        <button
                                            onClick={(e) => {
                                                e.stopPropagation();
                                                handleMove(index, -1);
                                            }}
                                            className="control-btn up"
                                            disabled={index === 0}
                                            title="Di chuyển lên"
                                        >
                                            ↑
                                        </button>
                                        <button
                                            onClick={(e) => {
                                                e.stopPropagation();
                                                handleMove(index, 1);
                                            }}
                                            className="control-btn down"
                                            disabled={index === items.length - 1}
                                            title="Di chuyển xuống"
                                        >
                                            ↓
                                        </button>
                                        <button
                                            onClick={(e) => {
                                                e.stopPropagation();
                                                handleDelete(index);
                                            }}
                                            className="control-btn delete"
                                            title="Xóa"
                                        >
                                            ×
                                        </button>
                                    </div>
                                </div>
                            )}
                        </div>
                    </div>
                ))}
            </div>
        </section>
    );
};

export default EditableSection;
