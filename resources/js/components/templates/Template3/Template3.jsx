import React, {useEffect, useState} from 'react';
import {DragDropContext, Draggable, Droppable} from 'react-beautiful-dnd';
import '../common/template-common.css';
import './template3.css';

// Import các sections
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
import PersonalInfo from './sections/PersonalInfo';


const Template3 = ({data, onUpdate, isEditable, styles}) => {
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
        const leftColumnSections = ['personalInfo', 'skills', 'education', 'languages'];
        return leftColumnSections.includes(sectionId) ? 'left' : 'right';
    };

    const handleDragEnd = (result) => {
        if (!result.destination) return;

        const {source, destination} = result;
        const updatedSections = Array.from(sections);
        const leftSections = updatedSections.filter(s => s.column === 'left');
        const rightSections = updatedSections.filter(s => s.column === 'right');

        const draggedSection = updatedSections.find(
            section => section.id === result.draggableId
        );

        if (source.droppableId === 'left') {
            leftSections.splice(source.index, 1);
        } else {
            rightSections.splice(source.index, 1);
        }

        draggedSection.column = destination.droppableId;
        if (destination.droppableId === 'left') {
            leftSections.splice(destination.index, 0, draggedSection);
        } else {
            rightSections.splice(destination.index, 0, draggedSection);
        }

        const reorderedSections = [
            ...leftSections.map((section, index) => ({
                ...section,
                column: 'left',
                order: index
            })),
            ...rightSections.map((section, index) => ({
                ...section,
                column: 'right',
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
            case 'personalInfo':
                return <PersonalInfo {...props} />;
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
        <div className="cv-template-3 template-wrapper" style={{
            fontFamily: styles.fontFamily || 'Arial, sans-serif',
            fontSize: styles.fontSize,
            '--primary-color': styles.primaryColor || '#008000',
            '--text-color': styles.textColor || '#333',
            '--background-image': styles.backgroundImage ? `url(${styles.backgroundImage})` : 'none'
        }}>
            <Header data={data} onUpdate={onUpdate} isEditable={isEditable}/>

            <DragDropContext onDragEnd={handleDragEnd}>
                <div className="template3-main">
                    <Droppable droppableId="left" type="SECTION">
                        {(provided, snapshot) => (
                            <div
                                ref={provided.innerRef}
                                {...provided.droppableProps}
                                className={`left-column ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            >
                                {sections
                                    .filter(section => section.column === 'left')
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
                                                    className={`section-wrapper ${snapshot.isDragging ? 'dragging' : ''}`}
                                                >
                                                    {isEditable && (
                                                        <div className="section-controls-wrapper">
                                                            <div className="section-controls">
                                                                <div
                                                                    className="control-btn drag-btn"
                                                                    {...provided.dragHandleProps}
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

                    <Droppable droppableId="right" type="SECTION">
                        {(provided, snapshot) => (
                            <div
                                ref={provided.innerRef}
                                {...provided.droppableProps}
                                className={`right-column ${snapshot.isDraggingOver ? 'drag-over' : ''}`}
                            >
                                {sections
                                    .filter(section => section.column === 'right')
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
                                                    className={`section-wrapper ${snapshot.isDragging ? 'dragging' : ''}`}
                                                >
                                                    {isEditable && (
                                                        <div className="section-controls-wrapper">
                                                            <div className="section-controls">
                                                                <div
                                                                    className="control-btn drag-btn"
                                                                    {...provided.dragHandleProps}
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
                </div>
            </DragDropContext>
        </div>
    );
};

export default Template3;
