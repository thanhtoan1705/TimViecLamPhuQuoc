import {create} from 'zustand';
import {persist} from 'zustand/middleware';

const useEditMode = create(
    persist(
        (set, get) => ({
            // Trạng thái edit mode
            isEditMode: true,
            activeSection: null,
            selectedText: null,

            // Định dạng văn bản
            textStyles: {
                fontFamily: 'Arial, sans-serif',
                fontSize: '14px',
                textColor: '#000000',
                themeColor: '#4f46e5',
                bold: false,
                italic: false,
                underline: false,
            },

            // Actions
            setEditMode: (value) => set({isEditMode: value}),
            setActiveSection: (section) => set({activeSection: section}),
            setSelectedText: (text) => set({selectedText: text}),

            // Cập nhật style
            updateTextStyle: (styleKey, value) => {
                set(state => ({
                    textStyles: {
                        ...state.textStyles,
                        [styleKey]: value
                    }
                }));
            },

            // Toggle định dạng
            toggleFormat: (format) => {
                set(state => ({
                    textStyles: {
                        ...state.textStyles,
                        [format]: !state.textStyles[format]
                    }
                }));

                // Áp dụng định dạng cho text được chọn
                const selection = window.getSelection();
                if (selection.toString()) {
                    const range = selection.getRangeAt(0);
                    const span = document.createElement('span');

                    switch (format) {
                        case 'bold':
                            span.style.fontWeight = get().textStyles.bold ? 'normal' : 'bold';
                            break;
                        case 'italic':
                            span.style.fontStyle = get().textStyles.italic ? 'normal' : 'italic';
                            break;
                        case 'underline':
                            span.style.textDecoration = get().textStyles.underline ? 'none' : 'underline';
                            break;
                    }

                    range.surroundContents(span);
                }
            },

            // Reset styles
            resetStyles: () => set({
                textStyles: {
                    fontFamily: 'Arial, sans-serif',
                    fontSize: '14px',
                    textColor: '#000000',
                    themeColor: '#4f46e5',
                    bold: false,
                    italic: false,
                    underline: false,
                }
            }),

            // Thêm action để áp dụng style cho phần tử được chọn
            applyStyleToSelection: (styleKey, value) => {
                const selection = window.getSelection();
                if (selection.toString()) {
                    const range = selection.getRangeAt(0);
                    const span = document.createElement('span');

                    switch (styleKey) {
                        case 'fontFamily':
                            span.style.fontFamily = value;
                            break;
                        case 'fontSize':
                            span.style.fontSize = value;
                            break;
                    }

                    range.surroundContents(span);
                }
            },
        }),
        {
            name: 'cv-editor-storage',
            getStorage: () => localStorage,
        }
    )
);

export default useEditMode;
