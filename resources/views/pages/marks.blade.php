<x-app-layout>
    <x-slot name="header">Add Marks</x-slot>

    <div class="py-6 px-4">
        @if(session('success'))
            <p class="text-green-600">{{ session('success') }}</p>
        @endif

        @foreach($user->award->modules as $module)
            <h2 class="text-xl font-bold mt-6">{{ $module->name }}</h2>

            @foreach($module->assignments as $assignment)
                @php
                    $existing = $assignment->marks
                        ->where('user_id', $user->id)
                        ->first();
                @endphp

                <form method="POST" action="{{ route('marks.store') }}" class="mb-2">
                    @csrf
                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                    <label>{{ $assignment->name }} (max: {{ $assignment->max_marks }})</label>
                    <input type="number" name="mark" 
                           value="{{ $existing?->mark ?? '' }}"
                           min="0" max="{{ $assignment->max_marks }}">
                    <button type="submit">Save</button>
                </form>
            @endforeach
        @endforeach
    </div>
</x-app-layout>