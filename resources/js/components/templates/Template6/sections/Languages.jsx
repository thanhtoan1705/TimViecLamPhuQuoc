import React from 'react';
import EditableSection from '../../../common/EditableSection';

const Languages = ({data, onUpdate, isEditable, onDeleteSection}) => {
    const handleUpdate = (newLanguages) => {
        onUpdate({
            ...data,
            languages: newLanguages
        });
    };

    const handleTitleUpdate = (newTitle) => {
        onUpdate({
            ...data,
            title_languages: newTitle
        });
    };

    const renderLanguageItem = (language, index) => (
        <div className="language-content">
            <div
                contentEditable={isEditable}
                onBlur={(e) => {
                    const newLanguages = [...data.languages];
                    newLanguages[index] = e.target.textContent;
                    handleUpdate(newLanguages);
                }}
                suppressContentEditableWarning={true}
            >
                {language}
            </div>
        </div>
    );

    const createNewLanguage = () => 'Ngôn ngữ mới';

    return (
        <EditableSection
            title={data.title_languages}
            items={data.languages || []}
            onUpdate={handleUpdate}
            onTitleUpdate={handleTitleUpdate}
            isEditable={isEditable}
            renderItem={renderLanguageItem}
            addButtonText="Thêm ngôn ngữ"
            createNewItem={createNewLanguage}
            sectionClassName="languages-section"
            itemClassName="language-item"
            onDeleteSection={onDeleteSection}
        />
    );
};

export default Languages;
