import React, {useCallback, useEffect, useRef, useState} from 'react';
import axios from 'axios';
import sampleData from './data/sampleData';
import html2canvas from 'html2canvas';


const CV = ({ templateContent, cvData: initialCvData, templateId }) => {
    const [cvData, setCvData] = useState(() => {
        if (initialCvData) {
            return {
                ...sampleData,
                ...initialCvData,
                title_personal_info: initialCvData.title_personal_info || sampleData.title_personal_info,
                title_skills: initialCvData.title_skills || sampleData.title_skills,
                title_certificates: initialCvData.title_certificates || sampleData.title_certificates,
                title_languages: initialCvData.title_languages || sampleData.title_languages,
                title_career_objective: initialCvData.title_career_objective || sampleData.title_career_objective,
                title_work_experience: initialCvData.title_work_experience || sampleData.title_work_experience,
                title_education: initialCvData.title_education || sampleData.title_education,
                title_projects: initialCvData.title_projects || sampleData.title_projects,
                title_awards: initialCvData.title_awards || sampleData.title_awards,
                title_extracurricular: initialCvData.title_extracurricular || sampleData.title_extracurricular,
                title_references: initialCvData.title_references || sampleData.title_references,
            };
        }
        return sampleData;
    });
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
        { key: 'languages', title: 'Ngôn ng' },
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
    const [themeColor, setThemeColor] = useState('#3c65f5');
    const [activeItemId, setActiveItemId] = useState(null);

    const openModal = useCallback(() => setIsModalOpen(true), []);
    const closeModal = useCallback(() => setIsModalOpen(false), []);

    const handleThemeColorChange = useCallback((color) => {
        setThemeColor(color);
        document.documentElement.style.setProperty('--theme-color', color);

        // Tính toán màu light dựa trên màu chủ đề
        const rgb = hexToRgb(color);
        const lightColor = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.1)`;
        document.documentElement.style.setProperty('--theme-color-light', lightColor);
    }, []);

    const hexToRgb = (hex) => {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    };

    useEffect(() => {
        const themeColorPicker = document.getElementById('themeColorPicker');
        if (themeColorPicker) {
            themeColorPicker.addEventListener('input', (e) => {
                handleThemeColorChange(e.target.value);
            });

            // Set initial color
            handleThemeColorChange(themeColorPicker.value);
        }

        return () => {
            if (themeColorPicker) {
                themeColorPicker.removeEventListener('input', handleThemeColorChange);
            }
        };
    }, [handleThemeColorChange]);

    const processTemplate = useCallback((template, data) => {
        let processed = template;

        // Thêm class cho tên người dùng
        processed = processed.replace(
            /{{name}}/g,
            `<span class="editable cv-name" data-key="name">${data.name || ''}</span>`
        );

        // Thêm class cho tiêu đề section
        processed = processed.replace(
            /<h2([^>]*)>(.*?)<\/h2>/g,
            '<h2$1 class="section-title">$2</h2>'
        );

        // Thêm class cho đường kẻ
        processed = processed.replace(
            /<hr([^>]*)>/g,
            '<hr$1 class="section-divider">'
        );

        // Xử lý avatar
        const avatarRegex = /{{avatar}}/g;
        processed = processed.replace(avatarRegex, `
            <div class="avatar-container text-center mb-3">
                <img src="${data.avatar || '/images/default-avatar.png'}"
                     alt="Avatar"
                     class="img-fluid rounded-circle avatar-image"
                     style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;"
                     onclick="document.getElementById('avatar-upload').click()">
                <input type="file"
                       id="avatar-upload"
                       accept="image/*"
                       style="display: none;"
                       data-action="change-avatar">
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

                </div>
            `;

            return `<div class="editable-section position-relative" data-section="${sectionKey}">
                <button class="remove-section-btn"
                        data-action="remove-section"
                        data-section="${sectionKey}"
                        title="Xóa phần này">
                    <i class="bi bi-trash3"></i>
                </button>
                ${sectionContent}
                ${addItemButton}
            </div>`;
        });
        // Xử lý các vòng lặp {{#each}}
        const eachRegex = /{{#each\s+(\w+)}}([\s\S]*?){{\/each}}/g;
        processed = processed.replace(eachRegex, (match, key, content) => {
            if (Array.isArray(data[key])) {
                return `
                    ${data[key].map((item, index) => {
                        let itemContent = content;
                        const itemId = `${key}-${index}`;

                        if (typeof item === 'string' || item === null || item === undefined) {
                            itemContent = itemContent.replace(/{{this}}/g,
                                `<span class="editable"
                                      contenteditable="true"
                                      data-key="${key}.${index}"
                                      data-item-id="${itemId}"
                                      onblur="window.handleEditableBlur(event)"
                                      onclick="window.handleEditableClick(event, '${itemId}')">${item || ''}</span>`
                            );
                        } else if (typeof item === 'object') {
                            Object.keys(item).forEach(prop => {
                                const propRegex = new RegExp(`{{this.${prop}}}`, 'g');
                                itemContent = itemContent.replace(propRegex,
                                    `<span class="editable"
                                          contenteditable="true"
                                          data-key="${key}.${index}.${prop}"
                                          data-item-id="${itemId}"
                                          onblur="window.handleEditableBlur(event)"
                                          onclick="window.handleEditableClick(event, '${itemId}')">${item[prop] || ''}</span>`
                                );
                            });
                        }

                        return `
                            <div class="editable-item" data-item-id="${itemId}">
                                ${itemContent}
                                <div class="item-controls">
                                    <button class="control-btn add-btn" title="Thêm mục mới"
                                            data-action="add"
                                            data-section="${key}"
                                            onclick="event.stopPropagation(); window.handleAction('add', '${key}')">
                                        <i class="bi bi-plus-circle-fill"></i>
                                    </button>
                                    ${data[key].length > 1 ? `
                                        <button class="control-btn delete-btn" title="Xóa mục này"
                                                onclick="event.stopPropagation(); window.handleAction('remove', '${key}', ${index})">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    ` : ''}
                                    ${index > 0 ? `
                                        <button class="control-btn move-btn" title="Di chuyển lên"
                                                onclick="event.stopPropagation(); window.handleAction('move-up', '${key}', ${index})">
                                            <i class="bi bi-arrow-up-circle-fill"></i>
                                        </button>
                                    ` : ''}
                                    ${index < data[key].length - 1 ? `
                                        <button class="control-btn move-btn" title="Di chuyển xuống"
                                                onclick="event.stopPropagation(); window.handleAction('move-down', '${key}', ${index})">
                                            <i class="bi bi-arrow-down-circle-fill"></i>
                                        </button>
                                    ` : ''}
                                </div>
                            </div>
                        `;
                    }).join('')}
                `;
            }
            return match;
        });


        // Xử lý các trường dữ liệu đơn
        const fieldRegex = /{{(\w+)}}/g;
        processed = processed.replace(fieldRegex, (match, key) => {
            if (data[key] !== undefined) {
                return `<span class="editable" contentEditable="true" data-key="${key}">${data[key]}</span>`;
            }
            return match;
        });

        // Xử lý languages section
        const languagesRegex = /{{#each languages}}([\s\S]*?){{\/each}}/g;
        processed = processed.replace(languagesRegex, (match, content) => {
            if (!Array.isArray(data.languages)) return '';

            return data.languages.map((lang, index) => {
                // Nếu lang là string (như trong sampleData)
                if (typeof lang === 'string') {
                    return content.replace(/{{this}}/g,
                        `<span class="editable" data-key="languages.${index}">${lang}</span>`
                    );
                }
                // Nếu lang là object (như từ API)
                else if (typeof lang === 'object') {
                    let itemContent = content;
                    Object.entries(lang).forEach(([key, value]) => {
                        const fieldRegex = new RegExp(`{{this.${key}}}`, 'g');
                        itemContent = itemContent.replace(fieldRegex,
                            `<span class="editable" data-key="languages.${index}.${key}">${value || ''}</span>`
                        );
                    });
                    return itemContent;
                }
                return '';
            }).join('');
        });

        return processed;
    }, [activeItemId, removedSections]);

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
        const { dataset } = event.target;
        const key = dataset.key;
        const htmlContent = event.target.innerHTML;
        updateNestedValue(key, htmlContent);
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

                // Tạo item mới dựa vào loại section
                const createEmptyItem = (sectionType) => {
                    switch(sectionType) {
                        case 'education':
                            return {
                                degree: '',
                                university: '',
                                start_year: '',
                                end_year: '',
                                gpa: '',
                                classification: ''
                            };
                        case 'work_experience':
                            return {
                                company: '',
                                position: '',
                                start_date: '',
                                end_date: '',
                                responsibilities: ''
                            };
                        case 'languages':
                                return '';
                        case 'projects':
                            return {
                                name: '',
                                description: '',
                                technologies: ''
                            };
                        case 'skills':
                            return '';
                        case 'certificates':
                            return '';
                        default:
                            return '';
                    }
                };

                // Kiểm tra và thêm item mới
                if (Array.isArray(newData[section])) {
                    // Nếu là mảng rỗng hoặc mảng chứa string
                    if (newData[section].length === 0 || typeof newData[section][0] === 'string') {
                        newData[section] = [...newData[section], createEmptyItem(section)];
                    }
                    // Nếu là mảng chứa object
                    else if (typeof newData[section][0] === 'object') {
                        newData[section] = [...newData[section], createEmptyItem(section)];
                    }
                } else {
                    // Nếu section chưa tồn tại
                    newData[section] = [createEmptyItem(section)];
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
            const response = await axios.post('/save-cv', {
                template_id: templateId,
                cv_content: JSON.stringify(cvData)
            });

            if (response.data.success) {
                alert('CV đã được lưu thành công!');
            } else {
                throw new Error(response.data.message);
            }
        } catch (error) {
            console.error('Lỗi khi lưu CV:', error);
            alert(error.response?.data?.message || 'Có lỗi xảy ra khi lưu CV');
        }
    };

    const downloadCV = async () => {
        const cvContainer = document.getElementById('pdf');

        // Tạm thời ẩn các nút điều khiển trước khi chụp
        const controls = cvContainer.querySelectorAll('.item-controls, .control-btn, .remove-section-btn');
        controls.forEach(control => control.style.display = 'none');

        try {
            const canvas = await html2canvas(cvContainer, {
                scale: 2,
                useCORS: true,
                logging: false,
                backgroundColor: null
            });

            // Hiện lại các nút điều khiển
            controls.forEach(control => control.style.display = '');

            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF({
                orientation: 'p',
                unit: 'mm',
                format: 'a4',
                compress: true
            });

            const imgWidth = 210;
            const pageHeight = 295;
            const imgHeight = canvas.height * imgWidth / canvas.width;
            let heightLeft = imgHeight;
            let position = 0;

            const imgData = canvas.toDataURL('image/jpeg', 1.0);
            pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);

            while (heightLeft >= pageHeight) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }

            pdf.save(`CV_${cvData.name || 'My_CV'}.pdf`);
        } catch (error) {
            console.error('Lỗi khi tải xuống CV:', error);
            alert('Có lỗi xảy ra khi tải xuống CV');
        }
    };

    useEffect(() => {
        // Add event listeners for save and download buttons
        const saveButton = document.getElementById('saveCV');
        const downloadButton = document.getElementById('downloadCV');

        if (saveButton) {
            saveButton.addEventListener('click', saveCV);
        }

        if (downloadButton) {
            downloadButton.addEventListener('click', downloadCV);
        }

        return () => {
            if (saveButton) {
                saveButton.removeEventListener('click', saveCV);
            }
            if (downloadButton) {
                downloadButton.removeEventListener('click', downloadCV);
            }
        };
    }, [cvData]);

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

    const handleAvatarChange = useCallback((e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = () => {
                const img = new Image();
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    const maxWidth = 600;
                    let width = img.width;
                    let height = img.height;

                    if (width > maxWidth) {
                        height *= maxWidth / width;
                        width = maxWidth;
                    }

                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);

                    const compressedDataUrl = canvas.toDataURL('image/jpeg', 0.9);
                    setCvData(prevData => ({
                        ...prevData,
                        avatar: compressedDataUrl
                    }));
                };
                img.src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    }, []);

    useEffect(() => {
        const avatarInput = document.getElementById('avatar-upload');
        if (avatarInput) {
            avatarInput.addEventListener('change', handleAvatarChange);
        }

        return () => {
            if (avatarInput) {
                avatarInput.removeEventListener('change', handleAvatarChange);
            }
        };
    }, [processedContent]);

    useEffect(() => {
        let currentSelection = null;

        const saveSelection = () => {
            const sel = window.getSelection();
            if (sel.rangeCount > 0) {
                const range = sel.getRangeAt(0);
                const editableParent = range.commonAncestorContainer.closest('.editable');
                if (editableParent) {
                    currentSelection = range.cloneRange();
                }
            }
        };

        const restoreSelection = () => {
            if (currentSelection) {
                const sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(currentSelection);
            }
        };

        const applyFormatting = (command, value = null) => {
            const activeElement = document.activeElement;
            if (activeElement && activeElement.classList.contains('editable')) {
                document.execCommand(command, false, value);
                activeElement.focus();
            } else {
                restoreSelection();
                document.execCommand(command, false, value);
            }
            saveSelection();
        };

        // Xử lý thay đổi font chữ
        const fontSelect = document.getElementById('fontSelect');
        if (fontSelect) {
            fontSelect.addEventListener('change', (e) => {
                applyFormatting('fontName', e.target.value);
            });
        }

        // Xử lý thay đổi kích thước chữ
        const fontSizeSelect = document.getElementById('fontSizeSelect');
        if (fontSizeSelect) {
            fontSizeSelect.addEventListener('change', (e) => {
                applyFormatting('fontSize', e.target.value);
            });
        }

        // Xử lý thay đổi màu chữ
        const colorPicker = document.getElementById('colorPicker');
        if (colorPicker) {
            colorPicker.addEventListener('input', (e) => {
                applyFormatting('foreColor', e.target.value);
            });
        }

        // Xử lý sự kiện click cho các nút định dạng
        const handleFormatClick = (e) => {
            const button = e.currentTarget;
            const format = button.dataset.format;

            if (format) {
                e.preventDefault();
                applyFormatting(format);
                button.classList.toggle('active');
            }
        };

        // Thêm sự kiện cho các nút định dạng
        const formatButtons = document.querySelectorAll('.cv-btn[data-format]');
        formatButtons.forEach(button => {
            button.addEventListener('click', handleFormatClick);
        });

        // Thêm sự kiện phím tắt
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey) {
                switch (e.key.toLowerCase()) {
                    case 'b':
                        e.preventDefault();
                        applyFormatting('bold');
                        document.getElementById('boldBtn')?.classList.toggle('active');
                        break;
                    case 'i':
                        e.preventDefault();
                        applyFormatting('italic');
                        document.getElementById('italicBtn')?.classList.toggle('active');
                        break;
                    case 'u':
                        e.preventDefault();
                        applyFormatting('underline');
                        document.getElementById('underlineBtn')?.classList.toggle('active');
                        break;
                }
            }
        });

        // Lu selection khi người dùng tô đen text
        document.addEventListener('selectionchange', saveSelection);

        // Cleanup
        return () => {
            formatButtons.forEach(button => {
                button.removeEventListener('click', handleFormatClick);
            });
            document.removeEventListener('selectionchange', saveSelection);
            if (fontSelect) {
                fontSelect.removeEventListener('change', (e) => applyFormatting('fontName', e.target.value));
            }
            if (fontSizeSelect) {
                fontSizeSelect.removeEventListener('change', (e) => applyFormatting('fontSize', e.target.value));
            }
            if (colorPicker) {
                colorPicker.removeEventListener('input', (e) => applyFormatting('foreColor', e.target.value));
            }
        };
    }, []);

    const getFullImageUrl = (path) => {
        if (!path) return `${window.location.origin}/default/user.png`;
        if (path.startsWith('http')) return path; // Nếu là URL đầy đủ
        return `${window.location.origin}/storage/${path}`; // Nếu là đường dẫn tương đối
    };

    useEffect(() => {
        const fetchCandidateInfo = async () => {
            if (initialCvData) return;

            try {
                const response = await axios.get('/candidate-info');
                const { user, candidate } = response.data;

                setCvData(prevData => {
                    const newData = { ...prevData };

                    // Thông tin cơ bản từ user hoặc sampleData
                    newData.avatar = getFullImageUrl(user.avatar_url) || sampleData.avatar;
                    newData.name = user.name || sampleData.name;
                    newData.email = user.email || sampleData.email;
                    newData.phone = user.phone || sampleData.phone;

                    // Thông tin cá nhân
                    newData.personal_info = {
                        date_of_birth: candidate.date_of_birth || sampleData.birthdate,
                        gender: candidate.gender || 'Nam/Nữ',
                        address: candidate.address?.street || sampleData.address,
                    };

                    // Mục tiêu nghề nghiệp
                    newData.career_objective = candidate.description || sampleData.career_objective;

                    // Kinh nghiệm làm việc
                    newData.work_experience = candidate.work_experiences?.length > 0
                        ? candidate.work_experiences.map(exp => ({
                            company: exp.company_name,
                            position: exp.position,
                            start_date: new Date(exp.start_date).toLocaleDateString('vi-VN'),
                            end_date: exp.end_date ? new Date(exp.end_date).toLocaleDateString('vi-VN') : 'Hiện tại',
                            responsibilities: exp.description
                        }))
                        : sampleData.work_experience;

                    // Học vấn
                    newData.education = candidate.educations?.length > 0
                        ? candidate.educations.map(edu => ({
                            university: edu.institution_name,
                            degree: edu.major_name,
                            start_year: new Date(edu.start_date).toLocaleDateString('vi-VN'),
                            end_year: new Date(edu.end_date).toLocaleDateString('vi-VN'),
                            gpa: edu.gpa,
                            classification: edu.classification
                        }))
                        : sampleData.education;

                    // Kỹ năng
                    newData.skills = candidate.skills?.length > 0
                        ? candidate.skills.map(skill => skill.name)
                        : sampleData.skills;

                    // Ngôn ngữ
                    newData.languages = candidate.language_proficiencies?.length > 0
                        ? candidate.language_proficiencies.map(lang =>
                            `${lang.language} (${lang.proficiency_level})`)
                        : sampleData.languages;

                    // Dự án
                    newData.projects = candidate.projects?.length > 0
                        ? candidate.projects
                        : sampleData.projects;

                    // Chứng chỉ
                    newData.certificates = candidate.certificates?.length > 0
                        ? candidate.certificates
                        : sampleData.certificates;

                    // Giải thưởng
                    newData.awards = candidate.awards?.length > 0
                        ? candidate.awards
                        : sampleData.awards;

                    // Hoạt động ngoại khóa
                    newData.extracurricular = candidate.extracurricular?.length > 0
                        ? candidate.extracurricular
                        : sampleData.extracurricular;

                    // Thêm các tiêu đề từ sampleData
                    newData.title_personal_info = sampleData.title_personal_info;
                    newData.title_skills = sampleData.title_skills;
                    newData.title_certificates = sampleData.title_certificates;
                    newData.title_languages = sampleData.title_languages;
                    newData.title_career_objective = sampleData.title_career_objective;
                    newData.title_work_experience = sampleData.title_work_experience;
                    newData.title_education = sampleData.title_education;
                    newData.title_projects = sampleData.title_projects;
                    newData.title_awards = sampleData.title_awards;
                    newData.title_extracurricular = sampleData.title_extracurricular;
                    newData.title_references = sampleData.title_references;

                    return newData;
                });
            } catch (error) {
                console.error('Error fetching candidate info:', error);
                // Nếu có lỗi, sử dụng toàn bộ dữ liệu mẫu
                setCvData(sampleData);
            }
        };

        fetchCandidateInfo();
    }, [initialCvData]);

    useEffect(() => {
        const handleResize = () => {
            const cvContainer = document.getElementById('pdf');
            if (!cvContainer) return;

            const containerWidth = window.innerWidth;
            let scale;

            // Tính toán scale dựa trên kích thước màn hình
            if (containerWidth <= 320) {
                scale = 0.35;
            } else if (containerWidth <= 375) {
                scale = 0.38;
            } else if (containerWidth <= 414) {
                scale = 0.4;
            } else if (containerWidth <= 768) {
                scale = 0.45;
            } else {
                scale = 1;
            }

            // Áp dụng transform
            // cvContainer.style.transform = `scale(${scale})`;
            // cvContainer.style.transformOrigin = 'top left';
        };

        // Initial check
        handleResize();

        // Add event listener
        window.addEventListener('resize', handleResize);

        // Cleanup
        return () => window.removeEventListener('resize', handleResize);
    }, []);

    useEffect(() => {
        window.handleItemClick = (itemId) => {
            setActiveItemId(prevId => prevId === itemId ? null : itemId);
        };

        window.handleAction = handleAction;

        return () => {
            delete window.handleItemClick;
            delete window.handleAction;
        };
    }, [handleAction]);

    useEffect(() => {
        const handleClickOutside = (e) => {
            if (!e.target.closest('.editable-item')) {
                setActiveItemId(null);
            }
        };

        document.addEventListener('click', handleClickOutside);
        return () => document.removeEventListener('click', handleClickOutside);
    }, []);

    return (
        <div
            ref={cvRef}
            className="cv-editor"
            dangerouslySetInnerHTML={{ __html: processedContent }}
            style={{
                width: '21cm',
                minHeight: '29.7cm',
                padding: '0.5cm',
                margin: '0 auto',
                background: 'white',
                // transform: 'scale(0.7)',
                transformOrigin: 'top center',
                boxShadow: '0 0 10px rgba(0,0,0,0.1)'
            }}
        />
    );
};


export default CV;
