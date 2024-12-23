import React, {useEffect, useState} from 'react';
import Template1 from './templates/Template1/Template1';
import Template2 from './templates/Template2/Template2';
import Template3 from './templates/Template3/Template3';
import Template4 from './templates/Template4/template4';
import Template5 from './templates/Template5/Template5';
import Template6 from './templates/Template6/Template6';
import sampleData from './data/sampleData';
import useEditMode from '../hooks/useEditMode';
import DownloadModal from './common/Modals/DownloadModal';
import PreviewModal from './common/Modals/PreviewModal';
import SectionModal from './common/Modals/SectionModal';
import MainToolbar from './common/MainToolbar';
import {createPortal} from 'react-dom';
import TemplateModal from './common/Modals/TemplateModal';

const TemplateView = ({templateId, isPreview = false}) => {
    const {textStyles, updateTextStyle, applyStyleToSelection} = useEditMode();

    const [cvData, setCvData] = useState({
        ...sampleData,
        personalInfo_visible: true,
        careerObjective_visible: true,
        experience_visible: true,
        education_visible: true,
        skills_visible: true,
        projects_visible: true,
        certificates_visible: true,
        languages_visible: true,
        awards_visible: true,
        extracurricular_visible: true,
        references_visible: true
    });

    const [styles, setStyles] = useState({
        fontFamily: 'Arial, sans-serif',
        fontSize: '14px',
        primaryColor: '#4f46e5',
        textColor: '#000000',
        backgroundImage: null
    });

    const [selection, setSelection] = useState(null);

    const [currentStyles, setCurrentStyles] = useState({
        fontWeight: 'normal',
        fontStyle: 'normal',
        textDecoration: 'none',
        fontFamily: 'Arial, sans-serif',
        fontSize: '14px',
        color: '#000000'
    });

    const [isDownloadModalOpen, setIsDownloadModalOpen] = useState(false);
    const [isPreviewModalOpen, setIsPreviewModalOpen] = useState(false);
    const [isSectionModalOpen, setIsSectionModalOpen] = useState(false);
    const [unusedSections, setUnusedSections] = useState([]);
    const [buttonPosition, setButtonPosition] = useState(null);
    const [showToolbar, setShowToolbar] = useState(true);
    const [showModal, setShowModal] = useState(true);

    const [sections, setSections] = useState([
        {id: 'personalInfo', column: 'sidebar', order: 0},
        {id: 'skills', column: 'sidebar', order: 1},
        {id: 'references', column: 'sidebar', order: 2},
        {id: 'careerObjective', column: 'main', order: 0},
        {id: 'experience', column: 'main', order: 1},
        {id: 'education', column: 'main', order: 2},
        {id: 'projects', column: 'main', order: 3},
        {id: 'certificates', column: 'main', order: 4},
        {id: 'languages', column: 'main', order: 5},
        {id: 'awards', column: 'main', order: 6},
        {id: 'extracurricular', column: 'main', order: 7}
    ]);

    const [isTemplateModalOpen, setIsTemplateModalOpen] = useState(false);
    const [templates, setTemplates] = useState([]);

    const handleFormatChange = (type, value) => {
        setStyles(prev => ({
            ...prev,
            [type]: value
        }));
    };

    const handleColorChange = (type, value) => {
        setStyles(prev => ({
            ...prev,
            [type === 'primary' ? 'primaryColor' : 'textColor']: value
        }));
    };

    const handleDownloadClick = () => {
        setIsDownloadModalOpen(true);
    };

    const handleDownload = (fileName) => {
        try {
            import('html2pdf.js').then(html2pdf => {
                const element = document.querySelector('.template-wrapper');
                if (!element) {
                    console.error('Cannot find template element');
                    return;
                }

                // Wait for images to load before generating PDF
                const images = element.getElementsByTagName('img');
                const imagePromises = Array.from(images).map(img => {
                    if (img.complete) return Promise.resolve();
                    return new Promise(resolve => {
                        img.onload = resolve;
                        img.onerror = resolve;
                    });
                });

                Promise.all(imagePromises).then(() => {
                    const opt = {
                        margin: 0,
                        filename: `${fileName}.pdf`,
                        image: {
                            type: 'jpeg',
                            quality: 1.0  // Increased image quality
                        },
                        html2canvas: {
                            scale: 2,
                            useCORS: true,
                            logging: true,
                            letterRendering: true,
                            imageTimeout: 0,  // Remove timeout for image loading
                            onclone: (clonedDoc) => {
                                // Ensure images maintain aspect ratio
                                const clonedImages = clonedDoc.getElementsByTagName('img');
                                Array.from(clonedImages).forEach(img => {
                                    img.style.maxWidth = '100%';
                                    img.style.height = 'auto';
                                    img.style.objectFit = 'contain';
                                });
                            }
                        },
                        jsPDF: {
                            unit: 'mm',
                            format: 'a4',
                            orientation: 'portrait',
                            compress: true
                        },
                        pagebreak: {mode: ['avoid-all', 'css', 'legacy']}
                    };

                    html2pdf.default()
                        .from(element)
                        .set(opt)
                        .save()
                        .catch(err => console.error('PDF generation error:', err));
                });
            }).catch(err => console.error('html2pdf import error:', err));
        } catch (error) {
            console.error('Download handler error:', error);
        }
    };

    const handlePreviewClick = () => {
        setIsPreviewModalOpen(true);
    };

    const handleSave = async () => {
        try {
            const pathArray = window.location.pathname.split('/');
            const template_id = pathArray[pathArray.length - 1];

            // Thu thập styles từ tất cả các phần tử có định dạng
            const textStyles = {};
            document.querySelectorAll('[contenteditable="true"]').forEach(element => {
                if (!element.id) {
                    element.id = `element-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
                }
                textStyles[element.id] = {
                    fontWeight: element.style.fontWeight || 'normal',
                    fontStyle: element.style.fontStyle || 'normal',
                    textDecoration: element.style.textDecoration || 'none',
                    fontFamily: element.style.fontFamily || 'Arial, sans-serif',
                    fontSize: element.style.fontSize || '14px',
                    color: element.style.color || '#000000'
                };
            });

            const saveData = {
                template_id: template_id,
                cv_content: JSON.stringify({
                    data: {
                        ...cvData,
                        sections: sections,
                        textStyles: textStyles
                    },
                    styles: {
                        ...styles,
                        currentStyles: currentStyles,
                        elementStyles: textStyles
                    }
                })
            };

            console.log('Saving data:', saveData);

            const response = await fetch('/save-cv', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(saveData)
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Lỗi khi lưu CV');
            }

            const result = await response.json();

            if (result.success) {
                alert('CV đã được lưu thành công!');
            } else {
                throw new Error(result.message || 'Lỗi không xác định khi lưu CV');
            }
        } catch (error) {
            console.error('Lỗi chi tiết:', error);
            alert('Có lỗi xảy ra khi lưu CV: ' + error.message);
        }
    };

    const handleUpdateData = (newData) => {
        if (newData.avatarImage) {
            setStyles(prev => ({
                ...prev,
                avatarImage: newData.avatarImage
            }));
        }
        setCvData(prevData => ({
            ...prevData,
            ...newData
        }));

        if (newData.sections) {
            setSections(newData.sections);
        }
    };

    // Debug log để kiểm tra data
    useEffect(() => {
        console.log('CV Data updated:', cvData);
    }, [cvData]);

    // Thêm handler cho font changes
    const handleStyleChange = (type, value) => {
        updateTextStyle(type, value);
        applyStyleToSelection(type, value);

        // Cập nhật styles state
        setStyles(prev => ({
            ...prev,
            [type]: value
        }));
    };

    // Theo dõi selection thay đổi
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

    // Xử lý format text
    const handleFormatText = (formatType, value) => {
        if (!selection) return;

        try {
            const range = selection.cloneRange();
            let container = range.commonAncestorContainer;

            // Nếu selection là text node, lấy parent node
            if (container.nodeType === 3) {
                container = container.parentNode;
            }

            // Kiểm tra xem có span parent không
            let spanParent = container.closest('span[style]');

            if (spanParent) {
                // Nếu đã có span, cập nhật style của span đó
                const currentValue = window.getComputedStyle(spanParent)[formatType];
                const newValue = currentValue === value ? '' : value;
                spanParent.style[formatType] = newValue;
            } else {
                // Nếu chưa có span, tạo span mới
                const span = document.createElement('span');
                span.style[formatType] = value;

                // Wrap selection trong span mới
                const contents = range.extractContents();
                span.appendChild(contents);
                range.insertNode(span);
            }

            // Cập nhật selection để có thể tiếp tục định dạng
            const newRange = document.createRange();
            newRange.selectNodeContents(spanParent || container);
            const sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(newRange);

            // Cập nhật currentStyles
            setCurrentStyles(prev => ({
                ...prev,
                [formatType]: value
            }));

        } catch (error) {
            console.error('Lỗi khi định dạng text:', error);
        }
    };

    // Cập nhật hàm theo dõi selection
    useEffect(() => {
        const handleSelectionChange = () => {
            const selection = window.getSelection();
            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                setSelection(range);

                // Lấy node chứa selection
                let container = range.commonAncestorContainer;
                if (container.nodeType === 3) {
                    container = container.parentNode;
                }

                // Tìm span parent gần nhất có style
                const spanParent = container.closest('span[style]');

                if (spanParent) {
                    // Lấy computed styles từ span parent
                    const computedStyle = window.getComputedStyle(spanParent);
                    setCurrentStyles({
                        fontWeight: computedStyle.fontWeight,
                        fontStyle: computedStyle.fontStyle,
                        textDecoration: computedStyle.textDecoration,
                        fontFamily: computedStyle.fontFamily,
                        fontSize: computedStyle.fontSize,
                        color: computedStyle.color
                    });
                } else {
                    // Reset về styles mặc định nếu không có span parent
                    setCurrentStyles({
                        fontWeight: 'normal',
                        fontStyle: 'normal',
                        textDecoration: 'none',
                        fontFamily: 'Arial, sans-serif',
                        fontSize: '14px',
                        color: '#000000'
                    });
                }
            }
        };

        document.addEventListener('selectionchange', handleSelectionChange);
        return () => document.removeEventListener('selectionchange', handleSelectionChange);
    }, []);

    const handlePrimaryColorChange = (color) => {
        setStyles(prev => ({
            ...prev,
            primaryColor: color
        }));

        // Cập nhật CSS variable
        document.documentElement.style.setProperty('--primary-color', color);
    };

    const handleBackgroundImageChange = (imageUrl) => {
        setStyles(prev => ({
            ...prev,
            backgroundImage: imageUrl
        }));
    };

    // Render toolbar using portal
    const renderToolbar = () => {
        const toolbarContainer = document.getElementById('toolbar-root');
        if (!isPreview && toolbarContainer && showToolbar) {
            return createPortal(
                <MainToolbar
                    onFormatText={handleFormatText}
                    currentStyles={currentStyles}
                    onPrimaryColorChange={handlePrimaryColorChange}
                    primaryColor={styles.primaryColor}
                    onBackgroundImageChange={handleBackgroundImageChange}
                    onDownload={handleDownloadClick}
                    onPreview={handlePreviewClick}
                    onSave={handleSave}
                />,
                toolbarContainer
            );
        }
        return null;
    };

    // Render modal using portal
    const renderModal = () => {
        const modalContainer = document.getElementById('sectionModalContainer');
        if (modalContainer && showModal) {
            return createPortal(
                <SectionModal
                    isOpen={isSectionModalOpen}
                    onClose={handleCloseModal}
                    unusedSections={unusedSections}
                    onAddSection={handleAddSection}
                />,
                modalContainer
            );
        }
        return null;
    };

    // Cleanup effect
    useEffect(() => {
        return () => {
            setShowToolbar(false);
            setShowModal(false);
        };
    }, []);

    // Thêm state để theo dõi các sections có sẵn
    const availableSections = [
        {id: 'personalInfo', name: 'Thông tin cá nhân', icon: 'person'},
        {id: 'careerObjective', name: 'Mục tiêu nghề nghiệp', icon: 'bullseye'},
        {id: 'experience', name: 'Kinh nghiệm làm việc', icon: 'briefcase'},
        {id: 'education', name: 'Học vấn', icon: 'graduation-cap'},
        {id: 'skills', name: 'K năng', icon: 'tools'},
        {id: 'projects', name: 'Dự án', icon: 'project-diagram'},
        {id: 'certificates', name: 'Chứng chỉ', icon: 'certificate'},
        {id: 'languages', name: 'Ngoại ngữ', icon: 'language'},
        {id: 'awards', name: 'Giải thưởng', icon: 'trophy'},
        {id: 'extracurricular', name: 'Hoạt động ngoại khóa', icon: 'users'},
        {id: 'references', name: 'Người tham chiếu', icon: 'user-tie'}
    ];

    // Cập nhật danh sách mục chưa sử dụng
    useEffect(() => {
        const unused = availableSections.filter(section => !cvData[`${section.id}_visible`]);
        setUnusedSections(unused);
    }, [cvData]);

    // Handler cho nút Thêm mục - Sửa lại phần này
    const handleSectionButtonClick = () => {
        setIsSectionModalOpen(prev => !prev); // Toggle modal
        const contentContainer = document.querySelector('.content-container');
        if (contentContainer) {
            contentContainer.classList.toggle('modal-open');
        }
    };

    // Gắn event listener cho nút - Sửa lại phần này
    useEffect(() => {
        const sectionBtn = document.querySelector('.section-btn');
        if (sectionBtn) {
            const clickHandler = () => handleSectionButtonClick();
            sectionBtn.addEventListener('click', clickHandler);
            return () => sectionBtn.removeEventListener('click', clickHandler);
        }
    }, []); // Empty dependency array

    // Handler đóng modal
    const handleCloseModal = () => {
        setIsSectionModalOpen(false);
        const contentContainer = document.querySelector('.content-container');
        if (contentContainer) {
            contentContainer.classList.remove('modal-open');
        }
    };

    // Handler thêm section
    const handleAddSection = (sectionId) => {
        setCvData(prev => ({
            ...prev,
            [`${sectionId}_visible`]: true
        }));

        const newSection = {
            id: sectionId,
            column: getDefaultColumn(sectionId),
            order: sections.length
        };
        setSections(prev => [...prev, newSection]);
        handleCloseModal();
    };

    // Hàm helper để xác định column mặc định cho section mới
    const getDefaultColumn = (sectionId) => {
        const sidebarSections = ['personalInfo', 'skills', 'references'];
        return sidebarSections.includes(sectionId) ? 'sidebar' : 'main';
    };

    const handleSectionReorder = (updatedSections) => {
        setSections(updatedSections);

        const newData = {...cvData};
        updatedSections.forEach(section => {
            newData[`${section.id}_order`] = section.order;
            newData[`${section.id}_column`] = section.column;
        });
        setCvData(newData);
    };

    // Thêm useEffect để load dữ liệu đã lưu
    useEffect(() => {
        const loadSavedData = async () => {
            try {
                const pathArray = window.location.pathname.split('/');
                const template_id = pathArray[pathArray.length - 1];

                console.log('Loading data for template:', template_id);

                const response = await fetch(`/api/cv-templates/${template_id}`);
                const result = await response.json();

                console.log('Loaded data:', result);

                if (result.userCv) {
                    const savedContent = result.userCv;

                    if (savedContent.data) {
                        // Cập nhật cvData
                        setCvData(prevData => ({
                            ...prevData,
                            ...savedContent.data
                        }));

                        // Cập nhật sections
                        if (savedContent.data.sections) {
                            setSections(savedContent.data.sections);
                        }

                        // Khôi phục định dạng văn bản
                        if (savedContent.data.textStyles) {
                            // Đợi một chút để DOM được render
                            setTimeout(() => {
                                Object.entries(savedContent.data.textStyles).forEach(([elementId, styles]) => {
                                    const element = document.getElementById(elementId);
                                    if (element) {
                                        element.style.fontWeight = styles.fontWeight || 'normal';
                                        element.style.fontStyle = styles.fontStyle || 'normal';
                                        element.style.textDecoration = styles.textDecoration || 'none';
                                        element.style.fontFamily = styles.fontFamily || 'Arial, sans-serif';
                                        element.style.fontSize = styles.fontSize || '14px';
                                        element.style.color = styles.color || '#000000';
                                    }
                                });
                            }, 100);
                        }
                    }

                    if (savedContent.styles) {
                        // Cập nhật styles chung
                        setStyles(prevStyles => ({
                            ...prevStyles,
                            ...savedContent.styles
                        }));

                        // Cập nhật currentStyles
                        if (savedContent.styles.currentStyles) {
                            setCurrentStyles(prevCurrentStyles => ({
                                ...prevCurrentStyles,
                                ...savedContent.styles.currentStyles
                            }));
                        }

                        // Khôi phục định dạng cho các phần tử đã được style
                        if (savedContent.styles.elementStyles) {
                            setTimeout(() => {
                                Object.entries(savedContent.styles.elementStyles).forEach(([elementId, styles]) => {
                                    const element = document.getElementById(elementId);
                                    if (element) {
                                        Object.assign(element.style, styles);
                                    }
                                });
                            }, 100);
                        }
                    }
                }
            } catch (error) {
                console.error('Lỗi khi load dữ liệu CV:', error);
            }
        };

        loadSavedData();
    }, []); // Chạy một lần khi component mount

    // Thêm một useEffect khác để theo dõi thay đổi của cvData
    useEffect(() => {
        // Áp dụng lại styles khi cvData thay đổi
        if (cvData && cvData.textStyles) {
            setTimeout(() => {
                Object.entries(cvData.textStyles).forEach(([elementId, styles]) => {
                    const element = document.getElementById(elementId);
                    if (element) {
                        Object.assign(element.style, styles);
                    }
                });
            }, 100);
        }
    }, [cvData]);

    // Thêm hàm để chọn template dựa vào templateId
    const renderTemplate = () => {
        switch (templateId) {
            case '1':
                return (
                    <Template1
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );
            case '2':
                return (
                    <Template2
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );
            case '3':
                return (
                    <Template3
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );

            case '4':
                return (
                    <Template4
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );
            case '5':
                return (
                    <Template5
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );
            case '6':
                return (
                    <Template6
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );
            default:
                return (
                    <Template1
                        data={cvData}
                        onUpdate={handleUpdateData}
                        isEditable={true}
                        styles={styles}
                        sections={sections}
                        onSectionReorder={handleSectionReorder}
                    />
                );
        }
    };

    // Thêm useEffect để load templates
    useEffect(() => {
        const loadTemplates = async () => {
            try {
                const response = await fetch('/api/cv-templates');
                const data = await response.json();
                setTemplates(data);
            } catch (error) {
                console.error('Error loading templates:', error);
            }
        };
        loadTemplates();
    }, []);

    // Thêm handler cho việc chọn template
    const handleTemplateSelect = async (newTemplateId) => {
        if (window.confirm('Bạn có chắc muốn đổi mẫu CV? Nội dung hiện tại sẽ được giữ nguyên.')) {
            try {
                window.location.href = `/cv/mau-cv/${newTemplateId}`;
            } catch (error) {
                console.error('Error changing template:', error);
            }
        }
    };

    // Thêm event listener cho nút template
    useEffect(() => {
        const templateBtn = document.querySelector('.template-btn');
        if (templateBtn) {
            const clickHandler = () => setIsTemplateModalOpen(true);
            templateBtn.addEventListener('click', clickHandler);
            return () => templateBtn.removeEventListener('click', clickHandler);
        }
    }, []);

    return (
        <div className="template-container">
            {renderTemplate()}
            {renderToolbar()}
            {renderModal()}

            {createPortal(
                <TemplateModal
                    isOpen={isTemplateModalOpen}
                    onClose={() => setIsTemplateModalOpen(false)}
                    templates={templates}
                    onSelectTemplate={handleTemplateSelect}
                    currentTemplateId={templateId}
                />,
                document.getElementById('templateModalContainer')
            )}

            {createPortal(
                <DownloadModal
                    isOpen={isDownloadModalOpen}
                    onClose={() => setIsDownloadModalOpen(false)}
                    onDownload={handleDownload}
                />,
                document.getElementById('modalContainer')
            )}

            {createPortal(
                <PreviewModal
                    isOpen={isPreviewModalOpen}
                    onClose={() => setIsPreviewModalOpen(false)}
                >
                    {renderTemplate()}
                </PreviewModal>,
                document.getElementById('modalContainer')
            )}
        </div>
    );
};

export default TemplateView;
