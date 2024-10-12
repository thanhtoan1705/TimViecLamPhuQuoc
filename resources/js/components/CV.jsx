import React, { useState, useEffect, useRef, useCallback } from 'react';
import axios from 'axios';
import { createRoot } from 'react-dom/client';
import EditableField from './EditableField';
import Modal from './Modal';
import { DragDropContext, Droppable, Draggable } from '@hello-pangea/dnd';
import sampleData from './data/sampleData';


const CV = ({ templateContent, cvData: initialCvData, templateId }) => {
    const [cvData, setCvData] = useState(initialCvData || sampleData);
    const [removedSections, setRemovedSections] = useState([]);
    const [processedContent, setProcessedContent] = useState('');
    const cvRef = useRef(null);
    const [availableSections, setAvailableSections] = useState([
        { key: 'personal_info', title: 'Thông tin cá nhân' },
        { key: 'career_objective', title: 'Mục tiêu nghề nghiệp' },
        { key: 'work_experience', title: 'Kinh nghiệm làm việc' },
        { key: 'education', title: 'Học vấn' },
        { key: 'skills', title: 'Kỹ năng' },
        { key: 'projects', title: 'Dự án' },
        { key: 'certificates', title: 'Chứng chỉ' },
        { key: 'languages', title: 'Ngôn ngữ' },
        { key: 'awards', title: 'Giải thưởng và Thành tích' },
        { key: 'extracurricular', title: 'Hoạt động ngoại khóa' },
        { key: 'references', title: 'Người tham khảo' },
    ]);
    const [isModalOpen, setIsModalOpen] = useState(false);
    const [currentSection, setCurrentSection] = useState(null);
    const [unusedSections, setUnusedSections] = useState([
        { key: 'additional_info', title: 'Thông tin thêm' },
    ]);
    const [usedSections, setUsedSections] = useState([
        { key: 'avatar', title: 'Ảnh đại diện' },
        { key: 'contact', title: 'Danh thiếp' },
        { key: 'personal_info', title: 'Thông tin liên hệ' },
        { key: 'career_objective', title: 'Mục tiêu nghề nghiệp' },
        { key: 'work_experience', title: 'Kinh nghiệm làm việc' },
        { key: 'education', title: 'Học vấn' },
        { key: 'skills', title: 'Kỹ năng' },
        { key: 'projects', title: 'Dự án' },
        { key: 'awards', title: 'Giải thưởng' },
        { key: 'certificates', title: 'Chứng chỉ' },
    ]);

    const openModal = useCallback(() => setIsModalOpen(true), []);
    const closeModal = useCallback(() => setIsModalOpen(false), []);

    const processTemplate = useCallback((template, data) => {
        let processed = template;

        // Xử lý avatar
        const avatarRegex = /{{avatar}}/g;
        processed = processed.replace(avatarRegex, `
             <div class="avatar-container text-center mb-3 position-relative">
            <img src="${data.avatar}" alt="Avatar" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            <label for="avatar-upload" class="btn btn-sm btn-light rounded-circle change-avatar-btn">
                <i class="bi bi-camera-fill"></i>
            </label>
        </div>
        `);

        // Xử lý các section
        const sectionRegex = /<section[^>]*>([\s\S]*?)<\/section>/g;
        let sectionIndex = 0;
        processed = processed.replace(sectionRegex, (match, sectionContent, offset) => {
            const sectionTitleMatch = sectionContent.match(/<h2[^>]*>(.*?)<\/h2>/);
            const sectionTitle = sectionTitleMatch ? sectionTitleMatch[1] : '';
            const sectionKey = `section_${sectionIndex}`;
            sectionIndex++;

            if (removedSections.includes(sectionKey)) {
                return '';
            }

            const addItemButton = `
                <div class="text-center my-3 position-relative">
                    <button class="btn btn-outline-primary btn-sm add-item position-absolute start-50 translate-middle-x"
                            data-action="open-modal"
                            data-section="${sectionKey}"
                            style="bottom: -20px; z-index: 10;">
                        + Thêm mục
                    </button>
                </div>
            `;

            return `<div class="editable-section position-relative" data-section="${sectionKey}">
                <button class="p-1 btn btn-outline-danger btn-sm remove-section" data-action="remove-section" data-section="${sectionKey}">
                    <i class="bi bi-x-lg"></i>
                </button>
                ${sectionContent}
                ${addItemButton}
            </div>`;
        });
        // Xử lý các vòng lặp {{#each}}
        const eachRegex = /{{#each\s+(\w+)}}([\s\S]*?){{\/each}}/g;
        processed = processed.replace(eachRegex, (match, key, content) => {
            if (Array.isArray(data[key])) {
                return data[key].map((item, index) => {
                    let itemContent = content;
                    if (typeof item === 'string' || item === null || item === undefined) {
                        itemContent = itemContent.replace(/{{this}}/g, `<span class="editable" data-key="${key}.${index}">${item || ''}</span>`);
                    } else if (typeof item === 'object') {
                        Object.keys(item).forEach(prop => {
                            const propRegex = new RegExp(`{{this.${prop}}}`, 'g');
                            itemContent = itemContent.replace(propRegex, `<span class="editable" data-key="${key}.${index}.${prop}">${item[prop] || ''}</span>`);
                        });
                    }
                    return `<div class="editable-item">
                        ${itemContent}
                        <div class="action-buttons">
                            <button class="btn btn-outline-danger btn-sm remove-item" data-action="remove" data-section="${key}" data-index="${index}">
                                <i class="bi bi-trash"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm move-up" data-action="move-up" data-section="${key}" data-index="${index}">
                                <i class="bi bi-arrow-up"></i>
                            </button>
                            <button class="btn btn-outline-secondary btn-sm move-down" data-action="move-down" data-section="${key}" data-index="${index}">
                                <i class="bi bi-arrow-down"></i>
                            </button>
                        </div>
                    </div>`;
                }).join('') + `
                <button class="btn btn-outline-primary btn-sm add-item" data-action="add" data-section="${key}">
                    <i class="bi bi-plus"></i> Thêm
                </button>`;
            }
            return match;
        });


        // Xử lý các trường dữ liệu đơn
        const fieldRegex = /{{(\w+)}}/g;
        processed = processed.replace(fieldRegex, (match, key) => {
            if (data[key] !== undefined) {
                return `<span class="editable" data-key="${key}">${data[key]}</span>`;
            }
            return match;
        });

        return processed;
    }, [removedSections]);

    useEffect(() => {
        const newProcessedContent = processTemplate(templateContent, cvData);
        setProcessedContent(newProcessedContent);
    }, [templateContent, cvData, processTemplate, removedSections]);

    useEffect(() => {
        if (cvRef.current) {
            setupEditableFields();
        }
    }, [processedContent]);

    const setupEditableFields = () => {
        const editableFields = cvRef.current.querySelectorAll('.editable');
        editableFields.forEach(field => {
            field.contentEditable = true;
            field.addEventListener('blur', handleEditableFieldChange);
        });
    };

    const handleEditableFieldChange = (event) => {
        const { textContent, dataset } = event.target;
        const key = dataset.key;
        updateNestedValue(key, textContent);
    };

    const updateNestedValue = (path, value) => {
        const keys = path.split('.');
        setCvData(prevData => {
            const newData = JSON.parse(JSON.stringify(prevData));
            let current = newData;
            for (let i = 0; i < keys.length - 1; i++) {
                if (current[keys[i]] === undefined) {
                    if (isNaN(keys[i+1])) {
                        current[keys[i]] = {};
                    } else {
                        current[keys[i]] = [];
                    }
                }
                current = current[keys[i]];
            }
            current[keys[keys.length - 1]] = value;
            return newData;
        });
    };

    const addNewSection = useCallback((sectionKey, sectionTitle) => {
        setCvData(prevData => {
            const newData = { ...prevData };
            newData[sectionKey] = [];
            newData[`title_${sectionKey}`] = sectionTitle;
            return newData;
        });
        // Remove the added section from available sections
        setAvailableSections(prev => prev.filter(section => section.key !== sectionKey));
        setRemovedSections(prev => prev.filter(section => section !== sectionKey));
    }, []);

    const handleAction = useCallback((action, section, index) => {
        if (action === 'remove-section') {
            setRemovedSections(prev => [...prev, section]);
            setCvData(prevData => {
                const newData = { ...prevData };
                delete newData[section];
                return newData;
            });
            // Add the removed section back to available sections
            const removedSectionTitle = cvData[`title_${section}`] || section;
            setAvailableSections(prev => [...prev, { key: section, title: removedSectionTitle }]);
        } else if (action === 'open-modal') {
            setCurrentSection(section);
            openModal();
        } else if (action === 'add') {
            setCvData(prevData => {
                const newData = { ...prevData };
                if (Array.isArray(newData[section])) {
                    if (newData[section].length === 0 || typeof newData[section][0] === 'string') {
                        newData[section] = [...newData[section], ''];
                    } else if (typeof newData[section][0] === 'object') {
                        const newItem = Object.keys(newData[section][0] || {}).reduce((acc, key) => {
                            acc[key] = '';
                            return acc;
                        }, {});
                        newData[section] = [...newData[section], newItem];
                    }
                } else {
                    newData[section] = [''];
                }
                return newData;
            });
        } else if (action === 'remove') {
            setCvData(prevData => {
                const newData = { ...prevData };
                if (Array.isArray(newData[section])) {
                    newData[section].splice(index, 1);
                }
                return newData;
            });
        } else if (action === 'add-section') {
            addNewSection(section, index);
        } else if (action === 'move-up' && index > 0) {
            setCvData(prevData => {
                const newData = { ...prevData };
                const sectionArray = newData[section];
                [sectionArray[index - 1], sectionArray[index]] = [sectionArray[index], sectionArray[index - 1]];
                return newData;
            });
        } else if (action === 'move-down' && index < cvData[section].length - 1) {
            setCvData(prevData => {
                const newData = { ...prevData };
                const sectionArray = newData[section];
                [sectionArray[index], sectionArray[index + 1]] = [sectionArray[index + 1], sectionArray[index]];
                return newData;
            });
        }
    }, [cvData, addNewSection, openModal]);

    useEffect(() => {
        const handleClick = (e) => {
            const target = e.target.closest('button[data-action]');
            if (target) {
                const action = target.dataset.action;
                const section = target.dataset.section;
                const index = target.dataset.index !== undefined ? parseInt(target.dataset.index, 10) : undefined;
                handleAction(action, section, index);
            }
        };

        document.addEventListener('click', handleClick);
        return () => document.removeEventListener('click', handleClick);
    }, [handleAction]);

    const saveCV = async () => {
        try {
            await axios.post('/api/save-cv', {
                template_id: templateId,
                cv_content: JSON.stringify(cvData)
            });
            alert('CV đã được lưu thành công!');
        } catch (error) {
            console.error('Lỗi khi lưu CV:', error);
            alert('Có lỗi xảy ra khi lưu CV');
        }
    };

    const handleAddSection = (sectionKey, sectionTitle) => {
        setCvData(prevData => {
            const newData = { ...prevData };
            newData[sectionKey] = [];
            newData[`title_${sectionKey}`] = sectionTitle;
            return newData;
        });
        setUnusedSections(prev => prev.filter(section => section.key !== sectionKey));
        setUsedSections(prev => [...prev, { key: sectionKey, title: sectionTitle }]);
        closeModal();
    };


    return (
        <div className="cv-editor">
            <div
                ref={cvRef}
                dangerouslySetInnerHTML={{ __html: processedContent }}
            />

            <Modal isOpen={isModalOpen} onClose={closeModal}>
                <p>Click Thêm hoặc Double click để thêm mục</p>
                <div className="mb-3">
                    <h5>Mục chưa sử dụng</h5>
                    <div className="d-flex flex-wrap">
                        {unusedSections.map(({ key, title }) => (
                            <button
                                key={key}
                                className="btn btn-outline-secondary m-1"
                                onClick={() => handleAddSection(key, title)}
                                onDoubleClick={() => handleAddSection(key, title)}
                            >
                                <i className="bi bi-hash"></i> {title}
                            </button>
                        ))}
                    </div>
                </div>
                <div>
                    <h5>Mục đã sử dụng</h5>
                    <div className="d-flex flex-wrap">
                        {usedSections.map(({ key, title }) => (
                            <button
                                key={key}
                                className="btn btn-outline-secondary m-1"
                                disabled
                            >
                                <i className="bi bi-check"></i> {title}
                            </button>
                        ))}
                    </div>
                </div>
                <div className="mt-3 text-end">
                    <button className="btn btn-secondary me-2" onClick={closeModal}>Hủy</button>
                    <button className="btn btn-primary" onClick={closeModal}>Thêm</button>
                </div>
            </Modal>
            <input
                type="file"
                accept="image/*"
                onChange={(e) => {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onloadend = () => {
                            setCvData(prevData => ({
                                ...prevData,
                                avatar: reader.result
                            }));
                        };
                        reader.readAsDataURL(file);
                    }
                }}
                style={{ display: 'none' }}
                id="avatar-upload"
            />
        </div>
    );
};


export default CV;
