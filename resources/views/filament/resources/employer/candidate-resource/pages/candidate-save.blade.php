<x-filament-panels::page>
    <div class="content-wrapper">
        <div class="form-container">
            {{ $this->form }}
        </div>
        <div class="candidate-grid">
            @foreach($savedCandidates as $candidate)
                <div class="candidate-card">
                    <button wire:click="unsaveCandidate({{ $candidate->candidate->id }})" class="save-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
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
    </style>
</x-filament-panels::page>
