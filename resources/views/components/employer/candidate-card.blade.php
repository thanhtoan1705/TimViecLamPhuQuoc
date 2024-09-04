@if(isset($candidate) && $candidate)
    <div class="bg-white shadow rounded-lg p-4 flex flex-col items-center text-center">
        @if(isset($candidate->user))
            <img class="w-24 h-24 rounded-full mb-4" src="{{ $candidate->user->profile_photo_url }}"
                 alt="{{ $candidate->user->name }}">
            <div class="font-bold text-lg">{{ $candidate->user->name }}</div>
        @else
            <div class="font-bold text-lg">No User Data</div>
        @endif

        @if(isset($candidate->description))
            <div class="text-sm mt-2">{{ $candidate->description }}</div>
        @else
            <div class="text-sm mt-2">No Description</div>
        @endif

        <div class="flex mt-4 space-x-2">
            @forelse($candidate->skills as $skill)
                <span class="px-2 py-1 bg-gray-100 text-sm rounded">{{ $skill->name }}</span>
            @empty
                <span class="px-2 py-1 bg-gray-100 text-sm rounded">No Skills</span>
            @endforelse
        </div>

        <div class="flex items-center justify-between w-full mt-4">
            <div class="text-sm text-gray-500">
                @if(isset($candidate->location))
                    <i class="heroicon-o-location-marker"></i> {{ $candidate->location }}
                @else
                    <i class="heroicon-o-location-marker"></i> No Location
                @endif
            </div>
            <div class="font-bold text-lg">
                @if(isset($candidate->salary))
                    {{ number_format($candidate->salary, 0, ',', '.') }} VND
                @else
                    No Salary Info
                @endif
            </div>
        </div>
    </div>
@else
    <div>No Candidate Data Available</div>
@endif
