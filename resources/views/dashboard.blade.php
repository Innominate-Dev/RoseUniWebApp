<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>
    {{-- No award selected --}}
    @if(!$user->award_id)
        <div class="card" style="max-width:480px;">
            <div class="card-title">Select Your Award</div>
            <form method="POST" action="{{ route('dashboard.award') }}">
                @csrf
                <select name="award_id" class="select-input">
                    @foreach($awards as $award)
                        <option value="{{ $award->id }}">{{ $award->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn" style="width:100%;">Confirm Award</button>
            </form>
        </div>

    @else

        {{-- Classification banner --}}
        @php
            $level5 = $user->award->modules->where('module_level', 5);
            $level6 = $user->award->modules->where('module_level', 6);

            $service = app(\App\Services\ClassificationService::class);

            $getModuleResult = function($module) use ($user, $service) {
                $marks = $module->assignments->map(function($a) use ($user) {
                    $mark = $a->marks->where('user_id', $user->id)->first();
                    return $mark ? ['score' => $mark->mark, 'weighting' => $a->weighting, 'max_marks' => $a->max_marks] : null;
                })->filter()->values()->toArray();
                return $service->calculateModuleResult($marks);
            };

            $l5Avg = $level5->map($getModuleResult)->filter()->avg() ?? 0.0;
            $l6Avg = $level6->map($getModuleResult)->filter()->avg() ?? 0.0;
            $overall = ($l5Avg > 0 || $l6Avg > 0)
                ? $service->calculateOverallClassification($l5Avg, $l6Avg)
                : null;
        @endphp

        @if($overall)
            <div class="classification-banner">
                <div>
                    <div style="font-size:13px;opacity:0.8;margin-bottom:4px;">Current Classification</div>
                    <div style="font-size:28px;font-weight:700;">{{ $overall }}</div>
                </div>
                <div style="font-size:13px;opacity:0.8;">{{ $user->award->name }}</div>
            </div>
        @endif

        {{-- Prediction result --}}
        @if(session('prediction'))
            <div class="card">
                <div style="font-size:13px;color:#166534;margin-bottom:4px;">Predicted Classification</div>
                <div style="font-size:24px;font-weight:700;color:#166534;">{{ session('prediction') }}</div>
            </div>
        @endif

        {{-- Module cards --}}
        <div class="module-grid">
            @foreach($user->award->modules as $module)
                @php $result = $getModuleResult($module); @endphp
                <div class="card">
                    <div class="module-header">
                        <div>
                            <div class="module-level">Level {{ $module->module_level }}</div>
                            <div style="font-size:15px;font-weight:600;">{{ $module->name }}</div>
                        </div>
                        @if($result > 0)
                            <span class="badge">{{ $result }}%</span>
                        @endif
                    </div>

                    @foreach($module->assignments as $assignment)
                        @php $mark = $assignment->marks->where('user_id', $user->id)->first(); @endphp
                        <div class="assignment-row">
                            <span>{{ $assignment->name }}</span>
                            <span style="font-weight:600;color:{{ $mark ? '#0f172a' : '#94a3b8' }}">
                                {{ $mark ? $mark->mark . '/' . $assignment->max_marks : 'Not submitted' }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        {{-- Predict form --}}
        <div class="card">
            <div class="card-title">Predict Your Classification</div>
            <p style="font-size:13px;color:#475569;margin-bottom:16px;">
                Enter a predicted percentage for each module to see your projected degree classification.
            </p>
            <form method="POST" action="{{ route('dashboard.predict') }}">
                @csrf
                <div class="predict-grid">
                    @foreach($user->award->modules as $module)
                        @php $result = $getModuleResult($module); @endphp
                        <div>
                            <label class="form-label">
                                {{ $module->name }}
                                <span style="color:#94a3b8;font-weight:400;">(L{{ $module->module_level }})</span>
                            </label>
                            <input
                                type="number"
                                name="predictions[{{ $module->id }}]"
                                class="form-input"
                                min="0" max="100" step="0.1"
                                value="{{ $result > 0 ? $result : '' }}"
                                placeholder="{{ $result > 0 ? 'Current: ' . $result . '%' : 'Enter %' }}">
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn">Predict Classification</button>
            </form>
        </div>

    @endif
</x-app-layout>