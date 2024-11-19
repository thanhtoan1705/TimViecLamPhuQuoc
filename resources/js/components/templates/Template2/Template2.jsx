import React, {useEffect, useState} from 'react';
import {DragDropContext, Draggable, Droppable} from 'react-beautiful-dnd';
import '../common/template-common.css';
import './Template2.css';

// Import các components
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

const Template2 = ({data, onUpdate, isEditable, styles}) => {
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
        const sidebarSections = ['skills', 'languages', 'references'];
        return sidebarSections.includes(sectionId) ? 'sidebar' : 'main';
    };

    const handleDragEnd = (result) => {
        if (!result.destination) return;

        const {source, destination} = result;

        const updatedSections = Array.from(sections);
        const mainSections = updatedSections.filter(s => s.column === 'main');
        const sidebarSections = updatedSections.filter(s => s.column === 'sidebar');

        const draggedSection = updatedSections.find(
            section => section.id === result.draggableId
        );

        if (source.droppableId === 'main') {
            mainSections.splice(source.index, 1);
        } else {
            sidebarSections.splice(source.index, 1);
        }

        draggedSection.column = destination.droppableId;
        if (destination.droppableId === 'main') {
            mainSections.splice(destination.index, 0, draggedSection);
        } else {
            sidebarSections.splice(destination.index, 0, draggedSection);
        }

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

        const updatedData = {...data};
        reorderedSections.forEach(section => {
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
        <div className="cv-template-2 template-wrapper" style={{
            fontFamily: styles.fontFamily || 'Inter, sans-serif',
            fontSize: styles.fontSize,
            '--primary-color': styles.primaryColor || '#2563eb',
            '--primary-color-rgb': styles.primaryColor ?
                `${parseInt(styles.primaryColor.slice(1, 3), 16)},
                 ${parseInt(styles.primaryColor.slice(3, 5), 16)},
                 ${parseInt(styles.primaryColor.slice(5, 7), 16)}` :
                '37, 99, 235',
            '--text-color': styles.textColor || '#1f2937',
            backgroundImage: styles.backgroundImage ? `url(${styles.backgroundImage})` : 'none',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: 'no-repeat',
        }}>
            <Header data={data} onUpdate={onUpdate} isEditable={isEditable}/>

            <DragDropContext onDragEnd={handleDragEnd}>
                <div className="t2-layout">
                    <Droppable droppableId="sidebar" type="SECTION">
                        {(provided, snapshot) => (
                            <div
                                ref={provided.innerRef}
                                {...provided.droppableProps}
                                className={`t2-sidebar ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            >
                                <div className="t2-sidebar-content">
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
                                                        className={`t2-section-wrapper ${snapshot.isDragging ? 'dragging' : ''}`}
                                                    >
                                                        {isEditable && (
                                                            <div className="t2-section-controls">
                                                                <div
                                                                    className="t2-drag-handle"
                                                                    {...provided.dragHandleProps}
                                                                >
                                                                    <i className="bi bi-grip-vertical"></i>
                                                                </div>
                                                                <div
                                                                    className="t2-delete-button"
                                                                    onClick={() => handleDeleteSection(section.id)}
                                                                >
                                                                    <i className="bi bi-trash"></i>
                                                                </div>
                                                            </div>
                                                        )}
                                                        <div className="t2-section-content">
                                                            {renderSection(section.id)}
                                                        </div>
                                                    </div>
                                                )}
                                            </Draggable>
                                        ))}
                                    {provided.placeholder}
                                </div>
                            </div>
                        )}
                    </Droppable>

                    <Droppable droppableId="main" type="SECTION">
                        {(provided, snapshot) => (
                            <div
                                ref={provided.innerRef}
                                {...provided.droppableProps}
                                className={`t2-main ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            >
                                <div className="t2-main-content">
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
                                                        className={`t2-section-wrapper ${snapshot.isDragging ? 'dragging' : ''}`}
                                                    >
                                                        {isEditable && (
                                                            <div className="t2-section-controls">
                                                                <div
                                                                    className="t2-drag-handle"
                                                                    {...provided.dragHandleProps}
                                                                >
                                                                    <i className="bi bi-grip-vertical"></i>
                                                                </div>
                                                                <div
                                                                    className="t2-delete-button"
                                                                    onClick={() => handleDeleteSection(section.id)}
                                                                >
                                                                    <i className="bi bi-trash"></i>
                                                                </div>
                                                            </div>
                                                        )}
                                                        <div className="t2-section-content">
                                                            {renderSection(section.id)}
                                                        </div>
                                                    </div>
                                                )}
                                            </Draggable>
                                        ))}
                                    {provided.placeholder}
                                </div>
                            </div>
                        )}
                    </Droppable>
                </div>
            </DragDropContext>
        </div>
    );
};

export default Template2;
