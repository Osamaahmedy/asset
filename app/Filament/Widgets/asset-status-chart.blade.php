<x-filament::widget>
    <x-filament::card>
        {{ $widget->chart }}

        <div class="mt-6">
            <h3 class="text-lg font-bold mb-2 text-gray-800">🗂️ دلالات الألوان:</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-right">الحالة</th>
                            <th class="px-4 py-2 text-right">اللون</th>
                            <th class="px-4 py-2 text-right">المعنى</th>
                            <th class="px-4 py-2 text-right">عدد الأصول</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($legendTable as $label => $info)
                            <tr class="border-t">
                                <td class="px-4 py-2 font-semibold text-right">{{ $label }}</td>
                                <td class="px-4 py-2 text-right">
                                    <span class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $info['color'] }}"></span>
                                </td>
                                <td class="px-4 py-2 text-right">{{ $info['label'] }}</td>
                                <td class="px-4 py-2 text-right">{{ $info['count'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
