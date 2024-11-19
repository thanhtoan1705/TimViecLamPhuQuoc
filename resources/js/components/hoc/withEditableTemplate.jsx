import React, {useCallback, useState} from 'react';

const withEditableTemplate = (WrappedComponent) => {
    return function EditableTemplate({initialData, ...props}) {
        const [data, setData] = useState(initialData);

        // Xử lý chỉnh sửa text
        const handleEdit = useCallback((path, value) => {
            setData(prev => {
                const newData = {...prev};
                const keys = path.split('.');
                let current = newData;

                for (let i = 0; i < keys.length - 1; i++) {
                    current = current[keys[i]];
                }
                current[keys[keys.length - 1]] = value;
                return newData;
            });
        }, []);

        // Xử lý thêm item
        const handleAdd = useCallback((section, newItem) => {
            setData(prev => {
                const newData = {...prev};
                if (Array.isArray(newData[section])) {
                    newData[section] = [...newData[section], newItem];
                }
                return newData;
            });
        }, []);

        // Xử lý xóa item
        const handleDelete = useCallback((section, index) => {
            setData(prev => {
                const newData = {...prev};
                if (Array.isArray(newData[section])) {
                    newData[section] = newData[section].filter((_, i) => i !== index);
                }
                return newData;
            });
        }, []);

        // Component EditableText với contentEditable
        const EditableText = ({value, onChange, multiline = false, className = ''}) => {
            const handleBlur = (e) => {
                const newValue = e.target.innerText;
                if (newValue !== value) {
                    onChange(newValue);
                }
            };

            const handleKeyDown = (e) => {
                if (e.key === 'Enter' && !multiline) {
                    e.preventDefault();
                    e.target.blur();
                }
            };

            return (
                <div
                    contentEditable
                    suppressContentEditableWarning
                    onBlur={handleBlur}
                    onKeyDown={handleKeyDown}
                    className={`editable-content ${className}`}
                    style={{
                        minHeight: '1em',
                        outline: 'none',
                        whiteSpace: multiline ? 'pre-wrap' : 'normal',
                        maxWidth: '100%',
                        overflow: 'hidden',
                        wordWrap: 'break-word',
                    }}
                >
                    {value}
                </div>
            );
        };

        // Component EditableList cho danh sách có thể chỉnh sửa
        const EditableList = ({items, onEdit, onAdd, onDelete, itemClassName = ''}) => {
            return (
                <div className="editable-list">
                    {items.map((item, index) => (
                        <div key={index} className="editable-list-item">
                            <EditableText
                                value={item}
                                onChange={(value) => onEdit(index, value)}
                                className={itemClassName}
                            />
                            <button
                                className="delete-btn"
                                onClick={() => onDelete(index)}
                            >
                                <i className="bi bi-x"></i>
                            </button>
                        </div>
                    ))}
                    <button
                        className="add-btn"
                        onClick={() => onAdd('New Item')}
                    >
                        <i className="bi bi-plus"></i> Add
                    </button>
                </div>
            );
        };

        return (
            <>
                <WrappedComponent
                    data={data}
                    EditableText={EditableText}
                    EditableList={EditableList}
                    onEdit={handleEdit}
                    onAdd={handleAdd}
                    onDelete={handleDelete}
                    {...props}
                />
                <style jsx global>{`
                    .editable-content {
                        display: inline-block;
                        min-width: 1em;
                        max-width: 100%;
                        padding: 2px 5px;
                        border-radius: 3px;
                        transition: background-color 0.2s;
                        overflow-wrap: break-word;
                        word-wrap: break-word;
                    }

                    .editable-content:hover {
                        background-color: rgba(0, 0, 0, 0.05);
                    }

                    .editable-content:focus {
                        background-color: rgba(0, 0, 0, 0.08);
                        outline: none;
                    }

                    .editable-list-item {
                        display: flex;
                        align-items: flex-start;
                        gap: 0.5rem;
                        margin-bottom: 0.5rem;
                        max-width: 100%;
                    }

                    .editable-list-item > div {
                        flex: 1;
                        min-width: 0;
                    }

                    .delete-btn {
                        opacity: 0;
                        transition: opacity 0.2s;
                        background: none;
                        border: none;
                        color: #dc3545;
                        padding: 2px 5px;
                        cursor: pointer;
                    }

                    .editable-list-item:hover .delete-btn {
                        opacity: 1;
                    }

                    .add-btn {
                        background: none;
                        border: 1px dashed #6c757d;
                        color: #6c757d;
                        padding: 5px 10px;
                        width: 100%;
                        cursor: pointer;
                        transition: all 0.2s;
                    }

                    .add-btn:hover {
                        background-color: rgba(0, 0, 0, 0.05);
                    }
                `}</style>
            </>
        );
    };
};

export default withEditableTemplate;
