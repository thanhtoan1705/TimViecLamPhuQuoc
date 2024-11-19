import React, {useEffect, useState} from 'react';
import {DragDropContext, Draggable, Droppable} from 'react-beautiful-dnd';
import '../common/template-common.css';
import './Template1.css';

// Import tất cả các components
import Header from './sections/Header';
import CareerObjective from './sections/CareerObjective';
import Experience from './sections/Experience';
import Education from './sections/Education';
import Skills from './sections/Skills';
import Projects from './sections/Projects';
import Certificates from './sections/Certificates';
import Languages from './sections/Languages';
import Awards from './sections/Awards';
import Extracurricular from './sections/Extracurricular';
import References from './sections/References';

const Template1 = ({data, onUpdate, isEditable, styles}) => {
    const [sections, setSections] = useState([]);

    useEffect(() => {
        const initialSections = Object.keys(data)
            .filter(key => key.endsWith('_visible') && data[key])
            .map(key => {
                const id = key.replace('_visible', '');
                return {
                    id,
                    column: data[`${id}_column`] || getDefaultColumn(id),
                    order: data[`${id}_order`] || 0
                };
            })
            .sort((a, b) => a.order - b.order);

        setSections(initialSections);
    }, [data]);

    const getDefaultColumn = (sectionId) => {
        const sidebarSections = ['certificates', 'skills', 'references'];
        return sidebarSections.includes(sectionId) ? 'sidebar' : 'main';
    };

    const handleDragEnd = (result) => {
        if (!result.destination) return;

        const {source, destination} = result;

        // Tạo bản sao của mảng sections
        const updatedSections = Array.from(sections);

        // Tách sections theo column
        const mainSections = updatedSections.filter(s => s.column === 'main');
        const sidebarSections = updatedSections.filter(s => s.column === 'sidebar');

        // Tìm section được kéo
        const draggedSection = updatedSections.find(
            section => section.id === result.draggableId
        );

        // Xóa section khỏi column cũ
        if (source.droppableId === 'main') {
            mainSections.splice(source.index, 1);
        } else {
            sidebarSections.splice(source.index, 1);
        }

        // Thêm section vào column mới
        draggedSection.column = destination.droppableId;
        if (destination.droppableId === 'main') {
            mainSections.splice(destination.index, 0, draggedSection);
        } else {
            sidebarSections.splice(destination.index, 0, draggedSection);
        }

        // Gộp lại và cập nhật order
        const reorderedSections = [
            ...mainSections.map((section, index) => ({
                ...section,
                column: 'main',
                order: index
            })),
            ...sidebarSections.map((section, index) => ({
                ...section,
                column: 'sidebar',
                order: index
            }))
        ];

        setSections(reorderedSections);

        // Cập nhật data
        const updatedData = {...data};
        reorderedSections.forEach((section, index) => {
            updatedData[`${section.id}_order`] = section.order;
            updatedData[`${section.id}_column`] = section.column;
        });
        onUpdate(updatedData);
    };

    const renderSection = (sectionId) => {
        const props = {
            data: data,
            onUpdate: onUpdate,
            isEditable: isEditable,
            onDeleteSection: () => handleDeleteSection(sectionId)
        };

        switch (sectionId) {
            case 'careerObjective':
                return <CareerObjective {...props} />;
            case 'experience':
                return <Experience {...props} />;
            case 'education':
                return <Education {...props} />;
            case 'skills':
                return <Skills {...props} />;
            case 'projects':
                return <Projects {...props} />;
            case 'certificates':
                return <Certificates {...props} />;
            case 'languages':
                return <Languages {...props} />;
            case 'awards':
                return <Awards {...props} />;
            case 'extracurricular':
                return <Extracurricular {...props} />;
            case 'references':
                return <References {...props} />;
            default:
                return null;
        }
    };

    const handleDeleteSection = (sectionId) => {
        if (window.confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
            const updatedData = {
                ...data,
                [`${sectionId}_visible`]: false
            };
            onUpdate(updatedData);
        }
    };

    return (
        <div className="cv-template-1 template-wrapper" style={{
            fontFamily: styles.fontFamily,
            fontSize: styles.fontSize,
            '--primary-color': styles.primaryColor,
            '--text-color': styles.textColor,
            backgroundImage: styles.backgroundImage ? `url(${styles.backgroundImage})` : 'none',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: 'no-repeat',
            color: 'var(--text-color)'
        }}>
            <Header data={data} onUpdate={onUpdate} isEditable={isEditable}/>

            <DragDropContext onDragEnd={handleDragEnd}>
                <div className="cv-body">
                    <Droppable droppableId="main" type="SECTION">
                        {(provided, snapshot) => (
                            <div
                                ref={provided.innerRef}
                                {...provided.droppableProps}
                                className={`cv-main ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            >
                                {sections
                                    .filter(section => section.column === 'main')
                                    .map((section, index) => (
                                        <Draggable
                                            key={section.id}
                                            draggableId={section.id}
                                            index={index}
                                            isDragDisabled={!isEditable}
                                        >
                                            {(provided, snapshot) => (
                                                <div
                                                    ref={provided.innerRef}
                                                    {...provided.draggableProps}
                                                    className={`t1-section-wrapper ${snapshot.isDragging ? 'dragging' : ''}`}
                                                >
                                                    {isEditable && (
                                                        <div className="t1-section-controls">
                                                            <div
                                                                className="t1-drag-handle"
                                                                {...provided.dragHandleProps}
                                                            >
                                                                <i className="bi bi-grip-vertical"></i>
                                                            </div>
                                                            <div
                                                                className="t1-delete-button"
                                                                onClick={() => handleDeleteSection(section.id)}
                                                            >
                                                                <i className="bi bi-trash"></i>
                                                            </div>
                                                        </div>
                                                    )}
                                                    {renderSection(section.id)}
                                                </div>
                                            )}
                                        </Draggable>
                                    ))}
                                {provided.placeholder}
                            </div>
                        )}
                    </Droppable>

                    <Droppable droppableId="sidebar" type="SECTION">
                        {(provided, snapshot) => (
                            <div
                                ref={provided.innerRef}
                                {...provided.droppableProps}
                                className={`cv-sidebar ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            >
                                {sections
                                    .filter(section => section.column === 'sidebar')
                                    .map((section, index) => (
                                        <Draggable
                                            key={section.id}
                                            draggableId={section.id}
                                            index={index}
                                            isDragDisabled={!isEditable}
                                        >
                                            {(provided, snapshot) => (
                                                <div
                                                    ref={provided.innerRef}
                                                    {...provided.draggableProps}
                                                    className={`t1-section-wrapper ${snapshot.isDragging ? 'dragging' : ''}`}
                                                >
                                                    {isEditable && (
                                                        <div className="t1-section-controls">
                                                            <div
                                                                className="t1-drag-handle"
                                                                {...provided.dragHandleProps}
                                                            >
                                                                <i className="bi bi-grip-vertical"></i>
                                                            </div>
                                                            <div
                                                                className="t1-delete-button"
                                                                onClick={() => handleDeleteSection(section.id)}
                                                            >
                                                                <i className="bi bi-trash"></i>
                                                            </div>
                                                        </div>
                                                    )}
                                                    {renderSection(section.id)}
                                                </div>
                                            )}
                                        </Draggable>
                                    ))}
                                {provided.placeholder}
                            </div>
                        )}
                    </Droppable>
                </div>
            </DragDropContext>
        </div>
    );
};

export default Template1;
