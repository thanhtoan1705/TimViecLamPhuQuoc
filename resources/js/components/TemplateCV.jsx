import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import FlexInput from './FlexInput';
import axios from 'axios';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function TemplateCV() {
    const [sections, setSections] = useState([
        { id: 1, type: 'personal', title: 'Thông tin cá nhân', content: { name: 'Nguyễn Văn A', title: 'Kỹ sư phần mềm', description: 'Mục tiêu trở thành một chuyên gia trong lĩnh vực phát triển phần mềm, đóng góp vào các dự án có tác động lớn.' } },
        { id: 2, type: 'contact', title: 'Thông tin liên hệ', items: [
            { icon: 'envelope', value: 'nguyenvana@email.com' },
            { icon: 'phone', value: '0123 456 789' },
            { icon: 'geo-alt', value: 'Hà Nội, Việt Nam' },
            { icon: 'linkedin', value: 'linkedin.com/in/nguyenvana' },
        ]},
        { id: 3, type: 'education', title: 'Học vấn', items: [
            { date: '2015 - 2019', title: 'Đại học Bách Khoa Hà Nội', description: 'Cử nhân Khoa học Máy tính' },
            { date: '2019 - 2021', title: 'Đại học Công nghệ', description: 'Thạc sĩ Công nghệ Thông tin' },
        ]},
        { id: 4, type: 'skills', title: 'Các kỹ năng', items: [
            { name: 'JavaScript' },
            { name: 'React' },
            { name: 'Node.js' },
            { name: 'Python' },
            { name: 'SQL' },
        ]},
        { id: 5, type: 'experience', title: 'Kinh nghiệm làm việc', items: [
            { date: '2019 - Hiện tại', title: 'Công ty ABC - Kỹ sư phần mềm', description: 'Phát triển và duy trì các ứng dụng web sử dụng React và Node.js' },
            { date: '2017 - 2019', title: 'Công ty XYZ - Thực tập sinh', description: 'Hỗ trợ team phát triển trong các dự án front-end' },
        ]},
        { id: 6, type: 'projects', title: 'Dự án', items: [
            { date: '2020', title: 'Ứng dụng quản lý task', description: 'Phát triển một ứng dụng web full-stack sử dụng MERN stack' },
            { date: '2021', title: 'Plugin Chrome extension', description: 'Tạo một extension để tăng năng suất làm việc' },
        ]},
        { id: 7, type: 'certificates', title: 'Chứng chỉ', items: [
            { date: '2020', name: 'AWS Certified Developer' },
            { date: '2021', name: 'Google Cloud Professional Developer' },
        ]},
        { id: 8, type: 'activities', title: 'Hoạt động', items: [
            { date: '2018', title: 'Hackathon Quốc gia', description: 'Đạt giải nhì trong cuộc thi lập trình' },
            { date: '2019 - Hiện tại', title: 'Câu lạc bộ lập trình', description: 'Thành viên tích cực, tổ chức các buổi chia sẻ kỹ thuật' },
        ]},
        { id: 9, type: 'awards', title: 'Danh hiệu và giải thưởng', items: [
            { date: '2019', name: 'Sinh viên xuất sắc' },
            { date: '2020', name: 'Nhân viên của năm' },
        ]},
        { id: 10, type: 'interests', title: 'Sở thích', content: 'Đọc sách về công nghệ, chơi cờ vua, du lịch khám phá' },
        { id: 11, type: 'references', title: 'Người giới thiệu', content: 'Sẵn sàng cung cấp khi có yêu cầu' },
        { id: 12, type: 'additional', title: 'Thông tin thêm', content: 'Có khả năng làm việc độc lập và theo nhóm. Luôn sẵn sàng học hỏi công nghệ mới.' },
    ]);

    const updatePersonalInfo = (id, field, value) => {
        setSections(sections.map(section =>
            section.id === id ? { ...section, content: { ...section.content, [field]: value } } : section
        ));
    };

    const addItem = (sectionId) => {
        setSections(sections.map(section => {
            if (section.id === sectionId) {
                const newItem = { date: '', title: '', description: '' };
                return { ...section, items: [...section.items, newItem] };
            }
            return section;
        }));
    };

    const updateItem = (sectionId, index, field, value) => {
        setSections(sections.map(section => {
            if (section.id === sectionId) {
                const newItems = [...section.items];
                newItems[index] = { ...newItems[index], [field]: value };
                return { ...section, items: newItems };
            }
            return section;
        }));
    };

    const removeItem = (sectionId, index) => {
        setSections(sections.map(section => {
            if (section.id === sectionId) {
                const newItems = [...section.items];
                newItems.splice(index, 1);
                return { ...section, items: newItems };
            }
            return section;
        }));
    };

    const moveSection = (id, direction) => {
        const index = sections.findIndex(s => s.id === id);
        if ((direction === 'up' && index > 0) || (direction === 'down' && index < sections.length - 1)) {
            const newSections = [...sections];
            const [removed] = newSections.splice(index, 1);
            newSections.splice(direction === 'up' ? index - 1 : index + 1, 0, removed);
            setSections(newSections);
        }
    };

    const removeSection = (id) => {
        setSections(sections.filter(section => section.id !== id));
    };

    const renderSection = (section) => {
        if (!section) return null;

        return (
            <Section
                key={section.id}
                section={section}
                moveSection={moveSection}
                removeSection={() => removeSection(section.id)}
            >
                {renderSectionContent(section)}
            </Section>
        );
    };

    const renderSectionContent = (section) => {
        switch (section.type) {
            case 'contact':
                return (
                    <>
                        {section.items.map((item, index) => (
                            <ContactItem
                                key={index}
                                item={item}
                                updateItem={(field, value) => updateItem(section.id, index, field, value)}
                                removeItem={() => removeItem(section.id, index)}
                            />
                        ))}
                        <button className="btn btn-sm btn-outline-primary mt-2 btn-add" onClick={() => addItem(section.id)} title="Thêm mục mới">
                            <i className="bi bi-plus-circle"></i> Thêm
                        </button>
                    </>
                );
            case 'education':
            case 'experience':
            case 'projects':
            case 'activities':
                return (
                    <>
                        {section.items.map((item, index) => (
                            <TimelineItem
                                key={index}
                                item={item}
                                updateItem={(field, value) => updateItem(section.id, index, field, value)}
                                removeItem={() => removeItem(section.id, index)}
                            />
                        ))}
                        <button className="btn btn-sm btn-outline-primary mt-2 btn-add" onClick={() => addItem(section.id)} title="Thêm mục mới">
                            <i className="bi bi-plus-circle"></i> Thêm
                        </button>
                    </>
                );
            case 'skills':
                return (
                    <>
                        {section.items.map((item, index) => (
                            <Skill
                                key={index}
                                item={item}
                                updateItem={(field, value) => updateItem(section.id, index, field, value)}
                                removeItem={() => removeItem(section.id, index)}
                            />
                        ))}
                        <button className="btn btn-sm btn-outline-primary mt-2 btn-add" onClick={() => addItem(section.id)} title="Thêm mục mới">
                            <i className="bi bi-plus-circle"></i> Thêm
                        </button>
                    </>
                );
            case 'certificates':
            case 'awards':
                return (
                    <>
                        {section.items.map((item, index) => (
                            <AchievementItem
                                key={index}
                                item={item}
                                updateItem={(field, value) => updateItem(section.id, index, field, value)}
                                removeItem={() => removeItem(section.id, index)}
                            />
                        ))}
                        <button className="btn btn-sm btn-outline-primary mt-2 btn-add" onClick={() => addItem(section.id)} title="Thêm mục mới">
                            <i className="bi bi-plus-circle"></i> Thêm
                        </button>
                    </>
                );
            case 'interests':
            case 'references':
            case 'additional':
                return (
                    <FlexInput
                        className="w-100"
                        defaultValue={section.content}
                        setCurrent={(value) => updateItem(section.id, 0, 'content', value)}
                    />
                );
            default:
                return null;
        }
    };

    const saveCV = async () => {
        console.log('Hàm saveCV được gọi');
        try {
            const response = await axios.post('/save-cv', {
                sections,
                template_id: 1
            });
            console.log('Phản hồi từ server:', response.data);
            if (response.data.success) {
                alert('CV đã được lưu thành công!');
            } else {
                alert('Lưu CV thất bại: ' + response.data.message);
            }
        } catch (error) {
            console.error('Lỗi khi lưu CV:', error.response ? error.response.data : error);
            alert('Đã xảy ra lỗi khi lưu CV: ' + (error.response ? error.response.data.message : error.message));
        }
    };

    return (
        <div className="container mt-5">
            <div className="row">
                <div className="col-md-4">
                    <div className="text-center mb-4">
                        <img src="https://via.placeholder.com/150" alt="Avatar" className="rounded-circle img-fluid" style={{width: '150px', height: '150px', objectFit: 'cover'}} />
                    </div>
                    <h1 className="text-center">
                        <FlexInput
                            className="h1 text-center"
                            defaultValue={sections[0].content.name}
                            setCurrent={(value) => updatePersonalInfo(1, 'name', value)}
                        />
                    </h1>
                    <h3 className="text-center text-muted">
                        <FlexInput
                            className="h3 text-center"
                            defaultValue={sections[0].content.title}
                            setCurrent={(value) => updatePersonalInfo(1, 'title', value)}
                        />
                    </h3>
                    <p className="text-center">
                        <FlexInput
                            className="text-center"
                            defaultValue={sections[0].content.description}
                            setCurrent={(value) => updatePersonalInfo(1, 'description', value)}
                        />
                    </p>
                    <hr className="my-4" />
                    {sections.filter(s => ['contact', 'education', 'skills'].includes(s.type)).map(renderSection)}
                </div>
                <div className="col-md-8">
                    {sections.filter(s => !['contact', 'education', 'skills'].includes(s.type)).map(renderSection)}
                </div>
            </div>
            <div className="row mt-4">
                <div className="col-12 text-center">
                    <button className="btn btn-primary" onClick={saveCV}>Lưu CV</button>
                </div>
            </div>
        </div>
    );
}

const Section = ({ section, children, moveSection, removeSection }) => {
    return (
        <div className="mb-4 section-container">
            <div className="d-flex justify-content-between align-items-center">
                <h5 className="border-bottom pb-2 mb-3 text-primary">{section.title}</h5>
                <div className="section-controls">
                    <button onClick={() => moveSection(section.id, 'up')} className="btn btn-sm btn-outline-secondary me-1" title="Di chuyển lên">
                        <i className="bi bi-arrow-up-short"></i>
                    </button>
                    <button onClick={() => moveSection(section.id, 'down')} className="btn btn-sm btn-outline-secondary me-1" title="Di chuyển xuống">
                        <i className="bi bi-arrow-down-short"></i>
                    </button>
                    <button onClick={removeSection} className="btn btn-sm btn-outline-danger" title="Xóa mc">
                        <i className="bi bi-x"></i>
                    </button>
                </div>
            </div>
            {children}
        </div>
    );
};

const ContactItem = ({ item, updateItem, removeItem }) => {
    return (
        <div className="d-flex align-items-center mb-2 item-container">
            <i className={`bi bi-${item.icon} me-2`}></i>
            <FlexInput
                className="flex-grow-1"
                defaultValue={item.value}
                setCurrent={(value) => updateItem('value', value)}
            />
            <button onClick={removeItem} className="btn btn-sm btn-outline-danger item-control" title="Xóa">
                <i className="bi bi-x-circle"></i>
            </button>
        </div>
    );
};

const TimelineItem = ({ item, updateItem, removeItem }) => {
    return (
        <div className="mb-3 item-container">
            <div className="d-flex justify-content-between">
                <FlexInput
                    className="fw-bold"
                    defaultValue={item.date}
                    setCurrent={(value) => updateItem('date', value)}
                />
                <button onClick={removeItem} className="btn btn-sm btn-outline-danger item-control" title="Xóa">
                    <i className="bi bi-x-circle"></i>
                </button>
            </div>
            <FlexInput
                className="fw-bold"
                defaultValue={item.title}
                setCurrent={(value) => updateItem('title', value)}
            />
            <FlexInput
                className="text-muted"
                defaultValue={item.description}
                setCurrent={(value) => updateItem('description', value)}
            />
        </div>
    );
};

const Skill = ({ item, updateItem, removeItem }) => {
    return (
        <div className="d-flex align-items-center mb-2 item-container">
            <FlexInput
                className="flex-grow-1"
                defaultValue={item.name}
                setCurrent={(value) => updateItem('name', value)}
            />
            <button onClick={removeItem} className="btn btn-sm btn-outline-danger ms-2 item-control" title="Xóa">
                <i className="bi bi-x-circle"></i>
            </button>
        </div>
    );
};

const AchievementItem = ({ item, updateItem, removeItem }) => {
    return (
        <div className="mb-3 item-container">
            <div className="d-flex justify-content-between">
                <FlexInput
                    className="fw-bold"
                    defaultValue={item.date}
                    setCurrent={(value) => updateItem('date', value)}
                />
                <button onClick={removeItem} className="btn btn-sm btn-outline-danger item-control" title="Xóa">
                    <i className="bi bi-x-circle"></i>
                </button>
            </div>
            <FlexInput
                className="fw-bold"
                defaultValue={item.name}
                setCurrent={(value) => updateItem('name', value)}
            />
        </div>
    );
};

export default TemplateCV;

if (document.getElementById('example')) {
    const Index = ReactDOM.createRoot(document.getElementById("example"));

    Index.render(
        <React.StrictMode>
            <TemplateCV/>
        </React.StrictMode>
    )
}
