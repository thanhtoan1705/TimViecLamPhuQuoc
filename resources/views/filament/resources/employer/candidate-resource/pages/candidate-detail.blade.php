<x-filament-panels::page>
    <div class="content-wrapper">
        <div class="application-content">
            <!-- Status Banner -->
            <div class="status-banner">
                <div class="status-icon">
                    <x-heroicon-o-document-check class="h-6 w-6"/>
                </div>
                <div class="status-info">
                    <span class="step-label">Bước 1: Đã nhận hồ sơ</span>
                    <span class="date-received">Ngày nhận: {{ $record->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="main-content-grid">
                <!-- Left Column -->
                <div class="left-column">
                    <div class="card job-info">
                        <h3 class="card-title">Thông tin việc làm</h3>
                        <div class="job-title">{{ $record->jobPost->title }}</div>
                        <div class="job-meta">
                            <span class="salary">{{ $record->jobPost->salary->name}} VNĐ</span>
                            <span class="location">{{ $record->jobPost->address }}</span>
                        </div>
                    </div>

                    <div class="card candidate-info">
                        <h3 class="card-title">Thông tin ứng viên</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="label">Họ và tên</span>
                                <span class="value">{{ $record->candidate->user->name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Vị trí ứng tuyển</span>
                                <span class="value">{{ $record->jobPost->title }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Số điện thoại</span>
                                <span class="value">{{ $record->candidate->user->phone }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Email</span>
                                <span class="value">{{ $record->candidate->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="right-column">
                    <div class="card message-content">
                        <h3 class="card-title">Thư xin việc</h3>
                        <div class="message-body">
                            {!! $record->description !!}
                        </div>
                    </div>

                    @if($record->file)
                        <div class="card attachment">
                            <h3 class="card-title">Tài liệu đính kèm</h3>
                            <div class="file-card">
                                <div class="file-icon">
                                    <x-heroicon-o-document class="w-8 h-8 text-primary-600"/>
                                </div>
                                <div class="file-info">
                                    <span class="file-name">{{ basename($record->file) }}</span>
                                    <a href="{{ Storage::url($record->file) }}"
                                       target="_blank"
                                       class="download-button">
                                        <x-heroicon-o-arrow-down-tray class="w-5 h-5"/>
                                        Tải xuống
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="{{ route('client.candidate.detail', ['slug' => $record->candidate->slug]) }}"
                   class="btn btn-secondary">
                    <x-heroicon-o-user class="w-5 h-5 mr-2"/>
                    Xem hồ sơ chi tiết
                </a>
                <button class="btn btn-primary">
                    <x-heroicon-o-envelope class="w-5 h-5 mr-2"/>
                    Liên hệ ứng viên
                </button>
            </div>
        </div>
    </div>

    <style>
        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .application-content {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .status-banner {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            background-color: #f0f9ff;
            border-bottom: 1px solid #e5e7eb;
            border-radius: 12px 12px 0 0;
        }

        .status-icon {
            color: #0284c7;
        }

        .status-info {
            display: flex;
            flex-direction: column;
        }

        .step-label {
            font-weight: 600;
            color: #0284c7;
        }

        .date-received {
            font-size: 0.875rem;
            color: #64748b;
        }

        .main-content-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 24px;
            padding: 24px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 16px;
        }

        .job-title {
            font-size: 1rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .job-meta {
            display: flex;
            gap: 16px;
            color: #64748b;
            font-size: 0.875rem;
        }

        .info-grid {
            display: grid;
            gap: 16px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .label {
            font-size: 0.875rem;
            color: #64748b;
        }

        .value {
            font-weight: 500;
            color: #1e293b;
        }

        .message-body {
            line-height: 1.6;
            color: #334155;
        }

        .file-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            background-color: #f8fafc;
            border-radius: 6px;
        }

        .file-info {
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .file-name {
            font-weight: 500;
            color: #0f172a;
        }

        .download-button {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 6px 12px;
            background-color: #0284c7;
            color: white;
            border-radius: 6px;
            font-size: 0.875rem;
            transition: background-color 0.2s;
        }

        .download-button:hover {
            background-color: #0369a1;
        }

        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        .btn-primary {
            background-color: #0284c7;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0369a1;
        }
    </style>
</x-filament-panels::page>
