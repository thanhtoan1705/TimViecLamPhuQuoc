import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Projects = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newProjects) => {
        onUpdate({
            ...data,
            projects: newProjects
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_projects: newTitle
        });
    };

    const renderProjectItem = (project, index) => (
        <div className="project-content">
            <div
                contentEditable={isEditable}
                className="project-name"
                onBlur={(e) => {
                    const newProjects = [...data.projects];
                    newProjects[index] = {
                        ...newProjects[index],
                        name: e.target.textContent
                    };
                    handleUpdate(newProjects);
                }}
                suppressContentEditableWarning={true}
            >
                {project.name}
            </div>
            <div
                contentEditable={isEditable}
                className="project-description"
                onBlur={(e) => {
                    const newProjects = [...data.projects];
                    newProjects[index] = {
                        ...newProjects[index],
                        description: e.target.textContent
                    };
                    handleUpdate(newProjects);
                }}
                suppressContentEditableWarning={true}
            >
                {project.description}
            </div>
            <div
                contentEditable={isEditable}
                className="project-technologies"
                onBlur={(e) => {
                    const newProjects = [...data.projects];
                    newProjects[index] = {
                        ...newProjects[index],
                        technologies: e.target.textContent
                    };
                    handleUpdate(newProjects);
                }}
                suppressContentEditableWarning={true}
            >
                {project.technologies}
            </div>
        </div>
    );

    const createNewProject = () => ({
        name: 'Tên dự án',
        description: 'Mô tả dự án',
        technologies: 'Công nghệ sử dụng'
    });

    return (
        <EditableSection
            title={data.title_projects}
            items={data.projects || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderProjectItem}
            addButtonText="Thêm dự án"
            createNewItem={createNewProject}
            sectionClassName="projects-section"
            itemClassName="project-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Projects;
