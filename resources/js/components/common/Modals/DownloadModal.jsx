import React, {useState} from 'react';
import './Modal.css';

const DownloadModal = ({isOpen, onClose, onDownload}) => {
    const [fileName, setFileName] = useState('my-cv');

    const handleSubmit = (e) => {
        e.preventDefault();
        if (!fileName.trim()) {
            alert('Vui lòng nhập tên file');
            return;
        }
        onDownload(fileName.trim());
        onClose();
    };

    if (!isOpen) return null;

    return (
        <div className="modal-overlay">
            <div className="modal-content">
                <h2>Tải xuống CV</h2>
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="fileName">Tên file:</label>
                        <input
                            type="text"
                            id="fileName"
                            value={fileName}
                            onChange={(e) => setFileName(e.target.value)}
                            placeholder="Nhập tên file"
                            required
                        />
                        <span className="file-extension">.pdf</span>
                    </div>
                    <div className="modal-actions">
                        <button type="button" onClick={onClose} className="btn-secondary">
                            Hủy
                        </button>
                        <button type="submit" className="btn-primary">
                            Tải xuống
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
};

export default DownloadModal;
