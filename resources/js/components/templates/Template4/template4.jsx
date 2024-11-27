import React, {useEffect, useState} from 'react';
import {DragDropContext, Draggable, Droppable} from 'react-beautiful-dnd';
import Header from './sections/Header';
import PersonalInfo from './sections/PersonalInfo';
import Experience from './sections/Experience';
import Education from './sections/Education';
import Skills from './sections/Skills';
import Projects from './sections/Projects';
import Certificates from './sections/Certificates';
import Languages from './sections/Languages';
import Awards from './sections/Awards';
import Extracurricular from './sections/Extracurricular';
import References from './sections/References';
import CareerObjective from './sections/CareerObjective';
import '../common/template-common.css';
import './template4.css';

const Template4 = ({data, onUpdate, isEditable, styles}) => {
    const [sections, setSections] = useState([]);

    useEffect(() => {
        let initialSections = Object.keys(data)
            .filter(key => key.endsWith('_visible') && data[key])
            .map(key => ({
                id: key.replace('_visible', ''),
                order: parseInt(data[`${key.replace('_visible', '')}_order`]) || 0,
                isFixed: ['personalInfo'].includes(key.replace('_visible', ''))
            }));

        const projectIndex = initialSections.findIndex(s => s.id === 'projects');
        const skillsIndex = initialSections.findIndex(s => s.id === 'skills');

        if (projectIndex !== -1 && skillsIndex !== -1 && projectIndex > skillsIndex) {
            const temp = initialSections[projectIndex].order;
            initialSections[projectIndex].order = initialSections[skillsIndex].order;
            initialSections[skillsIndex].order = temp;
        }

        initialSections = initialSections
            .sort((a, b) => a.order - b.order)
            .map((section, index) => ({
                ...section,
                order: index * 10
            }));

        setSections(initialSections);
    }, [data]);

    const handleDragEnd = (result) => {
        if (!result.destination) return;

        const sourceIndex = result.source.index;
        const destinationIndex = result.destination.index;

        const draggableSections = sections.filter(section => !section.isFixed);

        const updatedDraggableSections = Array.from(draggableSections);
        const [movedSection] = updatedDraggableSections.splice(sourceIndex, 1);
        updatedDraggableSections.splice(destinationIndex, 0, movedSection);

        const fixedSections = sections.filter(section => section.isFixed);
        const reorderedSections = [
            ...fixedSections,
            ...updatedDraggableSections.map((section, index) => ({
                ...section,
                order: (index + fixedSections.length) * 10
            }))
        ];

        setSections(reorderedSections);

        const updatedData = {...data};
        reorderedSections.forEach(section => {
            updatedData[`${section.id}_order`] = section.order;
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
            case 'personalInfo':
                return <PersonalInfo {...props} />;
            case 'careerObjective':
                return <CareerObjective {...props} />;
            case 'experience':
                return <Experience {...props} />;
            case 'projects':
                return <Projects {...props} />;
            case 'skills':
                return <Skills {...props} />;
            case 'education':
                return <Education {...props} />;
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
        <div className="cv-template-4 template-wrapper" style={{
            fontFamily: styles.fontFamily || 'Arial, sans-serif',
            fontSize: styles.fontSize,
            '--primary-color': styles.primaryColor || '#2D9CDB',
            '--text-color': styles.textColor || '#333',
            '--background-image': styles.backgroundImage ? `url(${styles.backgroundImage})` : 'none'
        }}>
            <div className="t4-header-section">
                <Header data={data} onUpdate={onUpdate} isEditable={isEditable}/>
                <PersonalInfo data={data} onUpdate={onUpdate} isEditable={isEditable}/>
            </div>

            <DragDropContext onDragEnd={handleDragEnd}>
                <Droppable droppableId="sections" type="SECTION">
                    {(provided, snapshot) => (
                        <div
                            className={`t4-main-content ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            ref={provided.innerRef}
                            {...provided.droppableProps}
                        >
                            {sections
                                .filter(section => !section.isFixed)
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
                                                className={`t4-section ${snapshot.isDragging ? 'dragging' : ''}`}
                                            >
                                                {isEditable && (
                                                    <div className="section-controls-wrapper">
                                                        <div className="section-controls">
                                                            <div
                                                                {...provided.dragHandleProps}
                                                                className="control-btn drag-btn"
                                                                title="Kéo để di chuyển"
                                                            >
                                                                <i className="bi bi-grip-vertical"></i>
                                                            </div>
                                                            <button
                                                                type="button"
                                                                className="control-btn delete-btn"
                                                                onClick={() => handleDeleteSection(section.id)}
                                                            >
                                                                <i className="bi bi-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                )}
                                                <div className="section-content">
                                                    {renderSection(section.id)}
                                                </div>
                                            </div>
                                        )}
                                    </Draggable>
                                ))}
                            {provided.placeholder}
                        </div>
                    )}
                </Droppable>
            </DragDropContext>
        </div>
    );
};

export default Template4;
