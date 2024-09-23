<x-filament-panels::page>
    <div class="content-wrapper">
        <div class="application-content">
            <div class="header">
                <span class="step-label">Bước 1: Đã nhận hồ sơ</span>
                <span class="date-received">(Ngày nhận: {{ now()->format('d-m-Y H:i:s') }})</span>
            </div>

            <div class="title">
                <h3 class="section-title">TIÊU ĐỀ</h3>
                <p class="job-title">{{ $record->jobPost->title }}</p>
            </div>

            <div class="candidate-info">
                <h3 class="section-title">THÔNG TIN ỨNG VIÊN</h3>
                <table class="info-table">
                    <tr>
                        <td>Tên ứng viên</td>
                        <td>{{ $record->candidate->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td>{{ $record->candidate->user->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $record->candidate->user->email }}</td>
                    </tr>
                    <tr>
                        <td>Vị trí ứng tuyển</td>
                        <td>{{ $record->jobPost->title }}</td>
                    </tr>
                </table>
            </div>

            <div class="message-content">
                <h3 class="section-title">Nội dung</h3>
                <div class="message-body">
                    {!! $record->description !!}
                </div>
            </div>

            <div class="attachment">
                <h3>File đính kèm</h3>
                @if($record->file)
                    <div class="file-card">
                        <div class="file-icon">
                            <x-heroicon-o-document class="icon-hero" />
                        </div>
                        <div class="file-info">
                            <span class="file-name">{{ basename($record->file) }}</span>
                            <a href="{{ Storage::url($record->file) }}" target="_blank" class="download-icon">
                                ⬇️
                            </a>
                        </div>
                    </div>
                @else
                    <p>Không có file đính kèm</p>
                @endif
            </div>

            <div class="buttons">
                <button class="btn btn-primary">Xem thông tin ứng viên</button>
                <button class="btn btn-success">Xem tin tuyển dụng</button>
            </div>
        </div>
    </div>

    <style>
        .content-wrapper {
            max-width: 100%;
        }

        .application-content {
            background-color: #f9fafb;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
        }

        .step-label {
            color: #007bff;
            font-weight: 700;
        }

        .date-received {
            color: #6c757d;
        }

        .title {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 20px;
            color: #343a40;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .job-title {
            font-size: 18px;
            font-weight: 500;
            color: #495057;
        }

        .candidate-info {
            margin-bottom: 25px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            vertical-align: middle;
        }

        .info-table td:first-child {
            font-weight: 600;
            color: #495057;
            width: 30%;
        }

        .info-table td:last-child {
            color: #212529;
            width: 70%;
        }

        .message-body {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            line-height: 1.7;
            color: #495057;
        }

        .buttons {
            display: flex;
            justify-content: flex-start;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .attachment {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .file-card {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .file-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .file-icon {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }

        .file-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .file-name {
            font-weight: 600;
            color: #495057;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            max-width: 150px;
        }

        .download-icon {
            margin-left: 10px;
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .download-icon:hover {
            color: #0056b3;
        }

        /* Điều chỉnh kích thước icon Filament Hero */
        .icon-hero {
            width: 32px;
            height: 32px;
            color: #6c757d;
        }

        .buttons {
            display: flex;
            justify-content: center; /* Căn giữa các nút */
            gap: 15px;
        }

    </style>
</x-filament-panels::page>
