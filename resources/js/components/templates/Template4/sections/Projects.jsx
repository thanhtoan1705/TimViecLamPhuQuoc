import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Projects = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newProjects) => {
        onUpdate({
            ...data,
            projects: newProjects
        });
    };

    const renderProjectItem = (project, index) => (
        <div className="project-content">
            <div
                contentEditable={isEditable}
                className="position"
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
                className="company"
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
            <div
                contentEditable={isEditable}
                className="responsibilities"
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
        </div>
    );

    const createNewProject = () => ({
        name: 'Tên dự án',
        technologies: 'Công nghệ sử dụng',
        description: 'Mô tả dự án'
    });

    return (
        <EditableSection
            title={data.title_projects || "Dự án"}
            items={data.projects || []}
            onUpdate={handleUpdate}
            isEditable={isEditable}
            renderItem={renderProjectItem}
            addButtonText="Thêm dự án"
            createNewItem={createNewProject}
            sectionClassName="project-section"
            itemClassName="project-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Projects;
