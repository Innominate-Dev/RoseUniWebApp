<x-app-layout>
    <x-slot name="header">Add Marks</x-slot>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    @if(!$user->award_id)
        <div class="card">
            <p style="color:#64748b;">Please select an award on your dashboard first.</p>
        </div>
    @else
        {{-- Level 5 --}}
    <div style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;color:#64748b;margin-bottom:12px; align-items:items-center;">Level 5 Modules</div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(420px,1fr));gap:20px;margin-bottom:32px;">
            @foreach($user->award->modules->where('module_level', 5) as $module)
                <div class="card" style="margin-bottom:0;">
                    <div class="card-title">{{ $module->name }}</div>

                    @foreach($module->assignments as $assignment)
                        @php $mark = $assignment->marks->where('user_id', $user->id)->first(); @endphp
                        <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid #f1f5f9;gap:12px;">
                            <div style="flex:1;">
                                <div style="font-size:13px;font-weight:500;">{{ $assignment->name }}</div>
                                <div style="font-size:11px;color:#94a3b8;margin-top:2px;">
                                    {{ $assignment->weighting }}% weighting &middot; max {{ $assignment->max_marks }}
                                </div>
                            </div>
                            <form method="POST" action="{{ route('marks.store') }}" style="display:flex;gap:8px;align-items:center;">
                                @csrf
                                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                <input type="number" name="mark" min="0" max="{{ $assignment->max_marks }}"
                                    value="{{ $mark?->mark ?? '' }}" placeholder="—"
                                    style="width:65px;padding:6px 8px;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;text-align:center;">
                                <button type="submit" class="btn btn-sm">Save</button>
                            </form>
                        </div>
                    @endforeach

                    {{-- Marks needed --}}
                    @if(isset($marksNeeded[$module->id]))
                        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-top:16px;">
                            @foreach($marksNeeded[$module->id] as $grade => $needed)
                                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:10px;text-align:center;">
                                    <div style="font-size:10px;font-weight:600;color:#94a3b8;text-transform:uppercase;margin-bottom:4px;">{{ $grade }}</div>
                                    <div style="font-size:13px;font-weight:700;color:{{ $needed === 'Not achievable' ? '#ef4444' : ($needed === 'Completed' || $needed === 'Already achieved' ? '#22c55e' : '#1d4ed8') }}">
                                        {{ $needed }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Level 6 --}}
        <div style="font-size:12px;font-weight:600;text-transform:uppercase;letter-spacing:0.08em;color:#64748b;margin-bottom:12px;">Level 6 Modules</div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(420px,1fr));gap:20px;">
            @foreach($user->award->modules->where('module_level', 6) as $module)
                <div class="card" style="margin-bottom:0;">
                    <div class="card-title">{{ $module->name }}</div>

                    @foreach($module->assignments as $assignment)
                        @php $mark = $assignment->marks->where('user_id', $user->id)->first(); @endphp
                        <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid #f1f5f9;gap:12px;">
                            <div style="flex:1;">
                                <div style="font-size:13px;font-weight:500;">{{ $assignment->name }}</div>
                                <div style="font-size:11px;color:#94a3b8;margin-top:2px;">
                                    {{ $assignment->weighting }}% weighting &middot; max {{ $assignment->max_marks }}
                                </div>
                            </div>
                            <form method="POST" action="{{ route('marks.store') }}" style="display:flex;gap:8px;align-items:center;">
                                @csrf
                                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                                <input type="number" name="mark" min="0" max="{{ $assignment->max_marks }}"
                                    value="{{ $mark?->mark ?? '' }}" placeholder="—"
                                    style="width:65px;padding:6px 8px;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;text-align:center;">
                                <button type="submit" class="btn btn-sm">Save</button>
                            </form>
                        </div>
                    @endforeach

                    @if(isset($marksNeeded[$module->id]))
                        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-top:16px;">
                            @foreach($marksNeeded[$module->id] as $grade => $needed)
                                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:10px;text-align:center;">
                                    <div style="font-size:10px;font-weight:600;color:#94a3b8;text-transform:uppercase;margin-bottom:4px;">{{ $grade }}</div>
                                    <div style="font-size:13px;font-weight:700;color:{{ $needed === 'Not achievable' ? '#ef4444' : ($needed === 'Completed' || $needed === 'Already achieved' ? '#22c55e' : '#1d4ed8') }}">
                                        {{ $needed }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

</x-app-layout>