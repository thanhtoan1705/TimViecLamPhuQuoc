import React, {useCallback, useEffect, useState} from 'react';
import sampleData from './data/sampleData';

const ReviewCV = ({templateContent}) => {
    console.log('ReviewCV rendered', {templateContent});
    const [processedContent, setProcessedContent] = useState('');

    const processTemplate = useCallback((template, data) => {
        let processed = template;

        // Xử lý avatar
        const avatarRegex = /{{avatar}}/g;
        processed = processed.replace(avatarRegex, `
            <div class="avatar-container text-center mb-3">
                <img src="${data.avatar}" alt="Avatar" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
        `);

        // Xử lý các vòng lặp {{#each}}
        const eachRegex = /{{#each\s+(\w+)}}([\s\S]*?){{\/each}}/g;
        processed = processed.replace(eachRegex, (match, key, content) => {
            if (Array.isArray(data[key])) {
                return data[key].map((item, index) => {
                    let itemContent = content;
                    if (typeof item === 'string' || item === null || item === undefined) {
                        itemContent = itemContent.replace(/{{this}}/g, item || '');
                    } else if (typeof item === 'object') {
                        Object.keys(item).forEach(prop => {
                            const propRegex = new RegExp(`{{this.${prop}}}`, 'g');
                            itemContent = itemContent.replace(propRegex, item[prop] || '');
                        });
                    }
                    return itemContent;
                }).join('');
            }
            return match;
        });

        // Xử lý các trường dữ liệu đơn
        const fieldRegex = /{{(\w+)}}/g;
        processed = processed.replace(fieldRegex, (match, key) => {
            if (data[key] !== undefined) {
                return data[key];
            }
            return match;
        });

        return processed;
    }, []);

    useEffect(() => {
        console.log('Processing template', {templateContent, sampleData});
        const newProcessedContent = processTemplate(templateContent, sampleData);
        console.log('Processed content', newProcessedContent);
        setProcessedContent(newProcessedContent);
    }, [templateContent, processTemplate]);

    return (
        <div className="cv-preview">
            <div dangerouslySetInnerHTML={{__html: processedContent}}/>
        </div>
    );
};

export default ReviewCV;
