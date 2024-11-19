import React, {useEffect, useState} from 'react';
import Template1 from './templates/Template1/Template1';
import Template2 from './templates/Template2/Template2';
import sampleData from './data/sampleData';
import useEditMode from '../hooks/useEditMode';
import DownloadModal from './common/Modals/DownloadModal';
import PreviewModal from './common/Modals/PreviewModal';
import SectionModal from './common/Modals/SectionModal';
import MainToolbar from './common/MainToolbar';

const TemplateView = ({templateId}) => {
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

                const opt = {
                    margin: 0,
                    filename: `${fileName}.pdf`,
                    image: {type: 'jpeg', quality: 0.98},
                    html2canvas: {
                        scale: 2,
                        useCORS: true,
                        logging: true,
                        letterRendering: true
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait',
                        compress: true
                    },
                    pagebreak: {mode: ['avoid-all', 'css', 'legacy']}
                };

                setTimeout(() => {
                    html2pdf.default()
                        .from(element)
                        .set(opt)
                        .save()
                        .catch(err => console.error('PDF generation error:', err));
                }, 500);
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
            const response = await fetch('/api/cv/save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    data: cvData,
                    styles: {
                        ...styles,
                        backgroundImage: styles.backgroundImage
                    }
                })
            });

            if (response.ok) {
                alert('CV đã được lưu thành công!');
            }
        } catch (error) {
            console.error('Lỗi khi lưu CV:', error);
            alert('Có lỗi xảy ra khi lưu CV');
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

    // Render toolbar vào container
    useEffect(() => {
        const toolbarContainer = document.getElementById('toolbar-root');
        if (toolbarContainer) {
            const toolbarRoot = window.createRoot(toolbarContainer);
            toolbarRoot.render(
                <MainToolbar
                    onFormatText={handleFormatText}
                    currentStyles={currentStyles}
                    onPrimaryColorChange={handlePrimaryColorChange}
                    primaryColor={styles.primaryColor}
                    onBackgroundImageChange={handleBackgroundImageChange}
                    onDownload={handleDownloadClick}
                    onPreview={handlePreviewClick}
                    onSave={handleSave}
                />
            );
        }
    }, [currentStyles, styles.primaryColor, styles.backgroundImage]);

    // Thêm state để theo dõi các sections có sẵn
    const availableSections = [
        {id: 'personalInfo', name: 'Thông tin cá nhân', icon: 'person'},
        {id: 'careerObjective', name: 'Mục tiêu nghề nghiệp', icon: 'bullseye'},
        {id: 'experience', name: 'Kinh nghiệm làm việc', icon: 'briefcase'},
        {id: 'education', name: 'Học vấn', icon: 'graduation-cap'},
        {id: 'skills', name: 'Kỹ năng', icon: 'tools'},
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

    // Render modal
    useEffect(() => {
        const modalContainer = document.getElementById('sectionModalContainer');
        if (modalContainer) {
            const modalRoot = window.createRoot(modalContainer);
            modalRoot.render(
                <SectionModal
                    isOpen={isSectionModalOpen}
                    onClose={handleCloseModal}
                    unusedSections={unusedSections}
                    onAddSection={handleAddSection}
                />
            );

            // Cleanup khi component unmount
            return () => {
                modalRoot.unmount();
            };
        }
    }, [isSectionModalOpen, unusedSections]);

    const handleSectionReorder = (updatedSections) => {
        setSections(updatedSections);

        const newData = {...cvData};
        updatedSections.forEach(section => {
            newData[`${section.id}_order`] = section.order;
            newData[`${section.id}_column`] = section.column;
        });
        setCvData(newData);
    };

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

    return (
        <div className="template-container">
            {renderTemplate()}

            <DownloadModal
                isOpen={isDownloadModalOpen}
                onClose={() => setIsDownloadModalOpen(false)}
                onDownload={handleDownload}
            />

            <PreviewModal
                isOpen={isPreviewModalOpen}
                onClose={() => setIsPreviewModalOpen(false)}
            >
                {renderTemplate()}
            </PreviewModal>
        </div>
    );
};

export default TemplateView;
