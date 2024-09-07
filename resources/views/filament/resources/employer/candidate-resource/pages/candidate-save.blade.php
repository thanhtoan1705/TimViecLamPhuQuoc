<x-filament-panels::page>
    <div class="content-wrapper">
        <div class="form-container">
            {{ $this->form }}
        </div>
        <div class="candidate-grid">
            @foreach($savedCandidates as $candidate)
                <div class="candidate-card"><i class="fa-solid fa-user"></i>
                    <div class="card-content">
                        <img src="{{ asset('storage/' . $candidate->candidate->user->image) }}"
                             alt="{{ $candidate->candidate->user->name }}" class="candidate-avatar">
                        <div class="candidate-info">
                            <h3 class="candidate-name">{{ $candidate->candidate->user->name }}</h3>
                            <span class="candidate-major">
                                    @if ($candidate->candidate->major->name)
                                    <span>{{ $candidate->candidate->major->name }}</span>
                                @else
                                    <span>N/A</span>
                                @endif
                                </span>
                        </div>
                    </div>
                    <div>
                        <p class="candidate-description">{{ $candidate->candidate->description }}</p>
                    </div>
                    <div class="candidate-details">
                        <div class="skills">
                            @foreach($candidate->candidate->skills->take(4) as $skill)
                                <span class="skill-tag">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                        <div class="location-price">
                            <span class="location">
                                <i class="fas fa-info-circle"></i>
                                @if ($candidate->candidate->address)
                                    {{ $candidate->candidate->address->province->name }}
                                @else
                                    N/A
                                @endif
                            </span>
                            <span class="price">{{ number_format($candidate->candidate->salary) }} VNĐ</span>
                        </div>

                        <button wire:click="unsaveCandidate({{ $candidate->candidate->id }})" class="button-un-save">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </button>
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

        .button-un-save {
            position: absolute;
            top: 16px;
            right: 16px;
            background-color: #3C65F5;
            color: #fff;
            border: none;
            padding: 6px 10px;
            border-radius: 50%;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .button-un-save svg {
            width: 16px;
            height: 18px;
        }

        .button-un-save:hover {
            background-color: #3358c5;
        }
    </style>

</x-filament-panels::page>
