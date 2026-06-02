<x-filament-panels::page>
    <style>
        .audit-container {
            font-family: system-ui, -apple-system, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};
        }
        .audit-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #eaeaea;
            padding: 24px;
            margin-bottom: 24px;
        }
        .dark .audit-card {
            background: #18181b;
            border-color: #27272a;
        }
        
        /* Header */
        .audit-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }
        .audit-title {
            font-size: 24px;
            font-weight: bold;
            color: #111827;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .dark .audit-title { color: #f9fafb; }
        .audit-meta {
            color: #6b7280;
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Progress Bar */
        .progress-wrapper { margin-top: 16px; }
        .progress-header {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .progress-track {
            background: #f3f4f6;
            border-radius: 999px;
            height: 12px;
            overflow: hidden;
        }
        .dark .progress-track { background: #374151; }
        .progress-fill {
            background: var(--primary-500, #3b82f6);
            height: 100%;
            border-radius: 999px;
            transition: width 0.5s ease;
        }
        .progress-footer {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }

        /* Scanner */
        .scanner-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }
        .dark .scanner-card { background: #1f2937; border-color: #374151; }
        .scanner-form {
            display: flex;
            gap: 16px;
            align-items: flex-end;
            max-width: 800px;
            margin: 0 auto;
        }
        .scanner-input-group { flex: 1; }
        .scanner-label {
            display: block;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #1e293b;
        }
        .dark .scanner-label { color: #f8fafc; }
        .scanner-input {
            width: 100%;
            height: 56px;
            padding: 0 16px 0 48px;
            font-size: 18px;
            border-radius: 12px;
            border: 2px solid #cbd5e1;
            outline: none;
            transition: all 0.2s;
        }
        .dark .scanner-input {
            background: #111827;
            border-color: #374151;
            color: white;
        }
        .scanner-input:focus { border-color: var(--primary-500, #3b82f6); }
        .scanner-btn {
            height: 56px;
            padding: 0 32px;
            font-size: 18px;
            font-weight: bold;
        }

        /* Tabs */
        .tabs-container {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #eaeaea;
            overflow: hidden;
        }
        .dark .tabs-container {
            background: #18181b;
            border-color: #27272a;
        }
        .tabs-header {
            display: flex;
            border-bottom: 1px solid #eaeaea;
            overflow-x: auto;
        }
        .dark .tabs-header { border-color: #27272a; }
        .tab-btn {
            flex: 1;
            padding: 16px;
            font-size: 16px;
            font-weight: bold;
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: #6b7280;
            transition: all 0.2s;
        }
        .tab-btn:hover { color: #111827; }
        .dark .tab-btn:hover { color: white; }
        
        .tab-missing.active { color: #dc2626; border-bottom-color: #dc2626; background: #fef2f2; }
        .dark .tab-missing.active { color: #f87171; background: rgba(220,38,38,0.1); }
        
        .tab-found.active { color: #16a34a; border-bottom-color: #16a34a; background: #f0fdf4; }
        .dark .tab-found.active { color: #4ade80; background: rgba(22,163,74,0.1); }
        
        .tab-misplaced.active { color: #ea580c; border-bottom-color: #ea580c; background: #fff7ed; }
        .dark .tab-misplaced.active { color: #fb923c; background: rgba(234,88,12,0.1); }

        .tab-badge {
            padding: 2px 8px;
            border-radius: 999px;
            font-size: 12px;
        }
        .tab-missing .tab-badge { background: #fee2e2; color: #991b1b; }
        .tab-found .tab-badge { background: #dcfce7; color: #166534; }
        .tab-misplaced .tab-badge { background: #ffedd5; color: #9a3412; }

        .tabs-content {
            padding: 24px;
            background: #f9fafb;
            min-height: 400px;
        }
        .dark .tabs-content { background: #111827; }

        /* Items Grid */
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 16px;
        }
        .asset-card {
            background: #ffffff;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid #eaeaea;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            display: flex;
            align-items: flex-start;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }
        .dark .asset-card { background: #1f2937; border-color: #374151; }
        .asset-icon-box {
            padding: 8px;
            border-radius: 8px;
        }
        .asset-title {
            font-weight: bold;
            font-size: 14px;
            margin: 0 0 4px 0;
            color: #111827;
        }
        .dark .asset-title { color: white; }
        .asset-serial {
            background: #f3f4f6;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 12px;
            color: #6b7280;
        }
        .dark .asset-serial { background: #111827; color: #9ca3af; }
        
        .card-missing { border-color: #fca5a5; }
        .card-missing .asset-icon-box { background: #fee2e2; color: #ef4444; }
        
        .card-found { border-color: #86efac; }
        .card-found .asset-icon-box { background: #dcfce7; color: #22c55e; }
        .card-found::before { content: ''; position: absolute; top: 0; right: 0; width: 4px; height: 100%; background: #22c55e; }
        
        .card-misplaced { border-color: #fdba74; }
        .card-misplaced .asset-icon-box { background: #ffedd5; color: #f97316; }
        .card-misplaced::before { content: ''; position: absolute; top: 0; right: 0; width: 4px; height: 100%; background: #f97316; }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 48px 0;
            color: #9ca3af;
        }
        
        /* Search results dropdown styling */
        .search-dropdown-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 50;
            max-height: 250px;
            overflow-y: auto;
            margin-top: 4px;
        }
        .dark .search-dropdown-results {
            background: #1f2937;
            border-color: #374151;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
        }
        .search-result-item {
            padding: 10px 16px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
            transition: all 0.2s;
            text-align: right;
        }
        .dark .search-result-item {
            border-bottom-color: #374151;
        }
        .search-result-item:last-child {
            border-bottom: none;
        }
        .search-result-item:hover {
            background: #f8fafc;
        }
        .dark .search-result-item:hover {
            background: #374151;
        }
        .result-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        .result-name {
            font-weight: 600;
            font-size: 14px;
            color: #1e293b;
        }
        .dark .result-name {
            color: #f8fafc;
        }
        .result-serial {
            font-family: monospace;
            font-size: 12px;
            color: #64748b;
        }
        .dark .result-serial {
            color: #94a3b8;
        }
        .result-meta {
            font-size: 11px;
            color: #4f46e5;
            background: #eeebff;
            padding: 2px 8px;
            border-radius: 999px;
            font-weight: 600;
        }
        .dark .result-meta {
            color: #a5b4fc;
            background: #312e81;
        }

        /* Filter list input styling */
        .filter-bar {
            padding: 16px;
            border-bottom: 1px solid #eaeaea;
            background: #ffffff;
        }
        .dark .filter-bar {
            border-color: #27272a;
            background: #18181b;
        }
        .filter-input {
            width: 100%;
            height: 46px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            outline: none;
            transition: all 0.2s;
        }
        .dark .filter-input {
            background: #111827;
            border-color: #374151;
            color: white;
        }
        .filter-input:focus {
            border-color: var(--primary-500, #3b82f6);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        @media (max-width: 768px) {
            .scanner-form { flex-direction: column; }
            .scanner-btn { width: 100%; }
        }
    </style>

    <div class="audit-container">
        <!-- Progress & Header Widget -->
        <div class="audit-card">
            <div class="audit-header">
                <div>
                    <h1 class="audit-title">
                        <x-heroicon-o-map-pin style="width: 24px; height: 24px; color: var(--primary-500, #3b82f6);" />
                        {{ __('messages.audit.session_title') }}: {{ $audit->location?->name ?? __('messages.audit.unspecified_location') }}
                    </h1>
                    <p class="audit-meta">
                        <x-heroicon-o-calendar style="width: 16px; height: 16px;" />
                        {{ __('messages.audit.date') }}: {{ $audit->audit_date }}
                        <span>|</span>
                        <x-heroicon-o-document-text style="width: 16px; height: 16px;" />
                        {{ $audit->name ?? __('messages.audit.routine_audit') }}
                    </p>
                </div>
                
                <div>
                    @if($audit->status !== 'Completed')
                        <x-filament::button wire:click="completeAudit" color="primary" size="lg">
                            {{ __('messages.audit.complete_action') }}
                        </x-filament::button>
                    @else
                        <div style="padding: 8px 16px; background: rgba(34,197,94,0.1); color: #16a34a; border-radius: 8px; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                            <x-heroicon-s-check-circle style="width: 20px; height: 20px;" />
                            {{ __('messages.audit.closed_status') }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="progress-wrapper">
                <div class="progress-header">
                    <span style="color: #6b7280;">{{ __('messages.audit.progress_rate') }}</span>
                    <span style="color: var(--primary-500, #3b82f6);">{{ $stats['progress'] }}%</span>
                </div>
                <div class="progress-track">
                    <div class="progress-fill" style="width: {{ $stats['progress'] }}%"></div>
                </div>
                <div class="progress-footer">
                    <span>{{ __('messages.audit.found_count', ['count' => $stats['found']]) }}</span>
                    <span>{{ __('messages.audit.remaining_count', ['missing' => $stats['missing'], 'total' => $stats['total']]) }}</span>
                </div>
            </div>
        </div>

        <!-- Scanner Section -->
        @if($audit->status !== 'Completed')
        <div class="audit-card scanner-card">
            <form wire:submit.prevent="scanBarcode" class="scanner-form" autocomplete="off">
                <div class="scanner-input-group">
                    <label class="scanner-label">
                        {{ __('messages.audit.scan_label') }}
                    </label>
                    <div style="position: relative;">
                        <input 
                            type="text" 
                            wire:model.live.debounce.250ms="scannedBarcode" 
                            autofocus 
                            class="scanner-input"
                            placeholder="{{ __('messages.audit.scan_placeholder') }}"
                        >
                        <x-heroicon-o-qr-code style="position: absolute; left: 16px; top: 16px; width: 24px; height: 24px; color: #9ca3af; pointer-events: none;" />

                        @if(!empty($searchResults))
                            <div class="search-dropdown-results">
                                @foreach($searchResults as $result)
                                    <div wire:click="selectAsset({{ $result['id'] }})" class="search-result-item">
                                        <div class="result-info">
                                            <span class="result-name">{{ $result['name'] }}</span>
                                            <span class="result-serial">{{ $result['serial_number'] }}</span>
                                        </div>
                                        <span class="result-meta">
                                            {{ $result['location']['name'] ?? __('messages.audit.unspecified_location') }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <x-filament::button type="submit" color="primary" class="scanner-btn">
                        {{ __('messages.audit.register_action') }}
                    </x-filament::button>
                </div>
            </form>
        </div>
        @endif

        <!-- Tabs Section using Alpine.js -->
        <div x-data="{ activeTab: 'missing' }" class="tabs-container">
            
            <!-- Search Filter Bar -->
            <div class="filter-bar">
                <div style="position: relative; width: 100%;">
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="searchQuery" 
                        class="filter-input"
                        placeholder="{{ __('messages.audit.filter_placeholder') }}"
                        style="padding-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 44px; padding-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}: 44px;"
                    >
                    <x-heroicon-o-magnifying-glass style="position: absolute; {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 16px; top: 13px; width: 20px; height: 20px; color: #9ca3af; pointer-events: none;" />
                    @if(!empty($searchQuery))
                        <button 
                            type="button"
                            wire:click="$set('searchQuery', '')" 
                            style="position: absolute; {{ app()->getLocale() === 'ar' ? 'left' : 'right' }}: 16px; top: 13px; color: #9ca3af;"
                            class="hover:text-gray-700 dark:hover:text-gray-300"
                        >
                            <x-heroicon-o-x-mark style="width: 20px; height: 20px;" />
                        </button>
                    @endif
                </div>
            </div>

            <!-- Tabs Header -->
            <div class="tabs-header">
                <button 
                    @click="activeTab = 'missing'" 
                    :class="activeTab === 'missing' ? 'active' : ''"
                    class="tab-btn tab-missing"
                >
                    <x-heroicon-s-x-circle style="width: 20px; height: 20px;" />
                    {{ __('messages.audit.missing_tab') }}
                    <span class="tab-badge">{{ $stats['missing'] }}</span>
                </button>
                
                <button 
                    @click="activeTab = 'found'" 
                    :class="activeTab === 'found' ? 'active' : ''"
                    class="tab-btn tab-found"
                >
                    <x-heroicon-s-check-circle style="width: 20px; height: 20px;" />
                    {{ __('messages.audit.found_tab') }}
                    <span class="tab-badge">{{ $stats['found'] }}</span>
                </button>

                <button 
                    @click="activeTab = 'misplaced'" 
                    :class="activeTab === 'misplaced' ? 'active' : ''"
                    class="tab-btn tab-misplaced"
                >
                    <x-heroicon-s-exclamation-triangle style="width: 20px; height: 20px;" />
                    {{ __('messages.audit.misplaced_tab') }}
                    <span class="tab-badge">{{ $stats['misplaced'] }}</span>
                </button>
            </div>

            <!-- Tabs Content -->
            <div class="tabs-content">
                
                <!-- Missing Tab -->
                <div x-show="activeTab === 'missing'" style="display: none;">
                    <div class="items-grid">
                        @forelse($auditItems['Missing'] ?? [] as $item)
                            <div class="asset-card card-missing">
                                <div class="asset-icon-box">
                                    <x-heroicon-o-cube style="width: 24px; height: 24px;" />
                                </div>
                                <div>
                                    <p class="asset-title">{{ $item['asset']['name'] }}</p>
                                    <span class="asset-serial">{{ $item['asset']['serial_number'] }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <x-heroicon-o-face-smile style="width: 48px; height: 48px; color: #4ade80; margin: 0 auto 12px;" />
                                <span style="font-size: 18px; font-weight: 500;">{{ __('messages.audit.missing_empty') }}</span>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Found Tab -->
                <div x-show="activeTab === 'found'" style="display: none;">
                    <div class="items-grid">
                        @forelse($auditItems['Found'] ?? [] as $item)
                            <div class="asset-card card-found">
                                <div class="asset-icon-box">
                                    <x-heroicon-o-check style="width: 24px; height: 24px;" />
                                </div>
                                <div>
                                    <p class="asset-title">{{ $item['asset']['name'] }}</p>
                                    <span class="asset-serial">{{ $item['asset']['serial_number'] }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <x-heroicon-o-qr-code style="width: 48px; height: 48px; color: #9ca3af; opacity: 0.5; margin: 0 auto 12px;" />
                                <span style="font-size: 18px; font-weight: 500;">{{ __('messages.audit.found_empty') }}</span>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Misplaced Tab -->
                <div x-show="activeTab === 'misplaced'" style="display: none;">
                    <div class="items-grid">
                        @forelse($auditItems['Misplaced'] ?? [] as $item)
                            <div class="asset-card card-misplaced">
                                <div class="asset-icon-box">
                                    <x-heroicon-o-exclamation-triangle style="width: 24px; height: 24px;" />
                                </div>
                                <div>
                                    <p class="asset-title">{{ $item['asset']['name'] }}</p>
                                    <span class="asset-serial">{{ $item['asset']['serial_number'] }}</span>
                                    <p style="font-size: 12px; color: #ea580c; margin-top: 8px; font-weight: bold;">{{ __('messages.audit.should_be_moved_to') }}: {{ $item['asset']['location']['name'] ?? __('messages.audit.unknown_location') }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="empty-state">
                                <x-heroicon-o-check-badge style="width: 48px; height: 48px; color: #9ca3af; opacity: 0.5; margin: 0 auto 12px;" />
                                <span style="font-size: 18px; font-weight: 500;">{{ __('messages.audit.misplaced_empty') }}</span>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-filament-panels::page>
