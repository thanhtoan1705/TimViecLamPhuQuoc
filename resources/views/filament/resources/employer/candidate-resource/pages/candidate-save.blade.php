<x-filament-panels::page>
    <div class="content-wrapper">
        <div class="form-container">
            {{ $this->form }}
        </div>
        <div class="candidate-grid">
            @foreach($savedCandidates as $candidate)
                <div class="candidate-card">
                    <button wire:click="unsaveCandidate({{ $candidate->candidate->id }})" class="save-button saved">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM20.25 5.507v11.561L5.853 2.671c.15-.043.306-.075.467-.094a49.255 49.255 0 0 1 11.36 0c1.1.128 1.907 1.077 1.907 2.185V5.507ZM4.5 19.93l.75-11.25a.75.75 0 0 0-.75.75v10.5Z" />
                        </svg>
                    </button>

                    <div class="card-header">
                        <img src="{{ getStorageImageUrl($candidate->candidate->user->avatar_url, config('image.avatar')) }}"
                             alt="{{ $candidate->candidate->user->name }}" class="candidate-avatar">
                        <div class="candidate-info">
                            <a href='{{ route('client.candidate.detail', $candidate->candidate->slug) }}'>
                                <h3 class="candidate-name">{{ $candidate->candidate->user->name }}</h3>
                            </a>
                            <span class="candidate-major">
                                @if ($candidate->candidate->major)
                                    {{ $candidate->candidate->major->name }}
                                @else
                                    N/A
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="candidate-description">{!! $candidate->candidate->description !!}</div>

                        <div class="skills">
                            @foreach($candidate->candidate->skills->take(4) as $skill)
                                <span class="skill-tag">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="location">
                            <i class="fas fa-info-circle"></i>
                            @if ($candidate->candidate->address)
                                {{ $candidate->candidate->address->province->name }}
                            @else
                                Chưa cập nhật
                            @endif
                        </div>
                        @if(optional(optional($candidate->candidate)->salary)->name)
                            <div class="price">{{ optional(optional($candidate->candidate)->salary)->name }}</div>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
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
            transition: all 0.3s ease;
            position: relative;
            height: 280px;
        }

        .candidate-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(60, 101, 245, 0.1);
        }

        .card-header {
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .candidate-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .candidate-info {
            flex: 1;
        }

        .candidate-name {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
            color: #333;
        }

        .candidate-major {
            font-size: 12px;
            color: #666;
        }

        .card-body {
            padding: 0 16px;
        }

        .candidate-description {
            font-size: 12px;
            line-height: 1.5;
            color: #666;
            margin: 8px 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 54px;
        }

        .candidate-description p,
        .candidate-description span,
        .candidate-description div {
            font-size: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin: 12px 0;
        }

        .skill-tag {
            background-color: #f0f4ff;
            color: #3C65F5;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            transition: all 0.3s ease;
        }

        .skill-tag:hover {
            background-color: #3C65F5;
            color: white;
        }

        .card-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 12px 16px;
            background-color: #fafbff;
            border-top: 1px solid #eef2ff;
            border-radius: 0 0 12px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .location {
            font-size: 12px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .price {
            font-size: 13px;
            font-weight: 600;
            color: #3C65F5;
        }

        .save-button {
            position: absolute;
            top: 12px;
            right: 12px;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #e0e0e0;
            color: #666;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .save-button:hover {
            background-color: #3C65F5;
            border-color: #3C65F5;
            color: white;
            transform: scale(1.1);
        }

        .save-button svg {
            width: 16px;
            height: 16px;
            transition: all 0.3s ease;
        }

        .save-button.saved {
            background-color: #3C65F5;
            border-color: #3C65F5;
            color: white;
        }

        .save-button.saved:hover {
            background-color: #ff4444;
            border-color: #ff4444;
        }
    </style>
</x-filament-panels::page>
