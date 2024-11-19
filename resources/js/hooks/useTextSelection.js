import {useEffect, useState} from 'react';

const useTextSelection = () => {
    const [selectedText, setSelectedText] = useState({
        text: '',
        element: null
    });

    useEffect(() => {
        const handleSelection = () => {
            const selection = window.getSelection();
            if (selection.toString().length > 0) {
                const range = selection.getRangeAt(0);
                const element = range.commonAncestorContainer.parentElement;

                setSelectedText({
                    text: selection.toString(),
                    element: element
                });
            } else {
                setSelectedText({
                    text: '',
                    element: null
                });
            }
        };

        document.addEventListener('mouseup', handleSelection);
        document.addEventListener('keyup', handleSelection);

        return () => {
            document.removeEventListener('mouseup', handleSelection);
            document.removeEventListener('keyup', handleSelection);
        };
    }, []);

    return selectedText;
};

export default useTextSelection;
