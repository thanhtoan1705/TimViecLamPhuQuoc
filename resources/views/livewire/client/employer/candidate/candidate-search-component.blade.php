<div>
    @livewireStyles
    <div class="content-wrapper">
        <div class="filter-container">
            <div class="filter-container">
                <input type="text" wire:model="filters.search" placeholder="Nhập tên ứng viên hoặc chuyên ngành">
            </div>
        </div>

        <div class="candidate-grid">
            @foreach($candidates as $candidate)
                <div class="candidate-card">
                    <div class="card-content">
                        <img src="{{ asset('storage/' . $candidate->user->image) }}"
                             alt="{{ $candidate->user->name }}" class="candidate-avatar">
                        <div class="candidate-info">
                            <h3 class="candidate-name">{{ $candidate->user->name }}</h3>
                            <span class="candidate-major">
                                    @if ($candidate->major)
                                    <span>{{ $candidate->major->name }}</span>
                                @else
                                    <span>N/A</span>
                                @endif
                                </span>
                        </div>
                    </div>
                    <div>
                        <p class="candidate-description">{{ $candidate->description }}</p>
                    </div>
                    <div class="candidate-details">
                        <div class="skills">
                            @foreach($candidate->skills->take(4) as $skill)
                                <span class="skill-tag">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                        <div class="location-price">
                                <span class="location">
                                    <i class="fas fa-info-circle"></i>
                                    @if ($candidate->address)
                                        {{ $candidate->address->province->name }}
                                    @else
                                        N/A
                                    @endif
                                </span>
                            <span class="price">{{ number_format($candidate->salary) }} VNĐ</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @livewireScripts


    <style>
        /* Styling content-wrapper and candidate cards */
        .content-wrapper {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            margin-bottom: 20px;
        }

        .candidate-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .candidate-card {
            flex: 0 0 calc(25% - 13px);
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .candidate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-content {
            display: flex;
            align-items: center;
            padding: 16px;
        }

        .candidate-avatar {
            border-radius: 50%;
            width: 85px;
            height: 85px;
            margin-right: 16px;
        }

        .candidate-info {
            text-align: left;
            word-wrap: break-word;
        }

        .candidate-description {
            color: #666;
            padding: 0 16px;
            margin: 4px 0 16px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .candidate-major, .candidate-description {
            font-size: 12px;
        }

        .candidate-name {
            font-size: 1.25em;
            margin: 0;
        }

        .candidate-details {
            padding: 0 16px 16px;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
        }

        .skill-tag {
            background-color: #f1f1f1;
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 11px;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .location-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #999;
            flex-wrap: wrap;
        }

        .location-price .price {
            font-weight: bold;
            color: #333;
        }
    </style>
</div>
