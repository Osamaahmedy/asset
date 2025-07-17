<?php if (isset($component)) { $__componentOriginald489e48d6214ecaf87e4b6a8ce684ad1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald489e48d6214ecaf87e4b6a8ce684ad1 = $attributes; } ?>
<?php $component = Filament\View\LegacyComponents\Widget::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Filament\View\LegacyComponents\Widget::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal9b945b32438afb742355861768089b04 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9b945b32438afb742355861768089b04 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <h3 class="text-xl font-bold mb-5 text-center">توزيع الأصول حسب حالة الصيانة</h3>
        <canvas id="assetStatusChart" style="max-height: 400px;"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('assetStatusChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: <?php echo json_encode($chartData, 15, 512) ?>,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    font: {
                                        size: 14,
                                        weight: 'bold',
                                    },
                                },
                            },
                            tooltip: {
                                enabled: true,
                            },
                            title: {
                                display: false,
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: {
                                        size: 13,
                                    },
                                },
                                title: {
                                    display: true,
                                    text: 'عدد الأصول',
                                    font: {
                                        size: 14,
                                        weight: 'bold',
                                    },
                                },
                            },
                            x: {
                                ticks: {
                                    font: {
                                        size: 14,
                                    },
                                },
                            },
                        },
                    },
                });
            });
        </script>

        <div class="mt-6">
            <table class="table-auto w-full text-sm border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border border-gray-300 text-center">الحالة</th>
                        <th class="p-2 border border-gray-300 text-center">اللون</th>
                        <th class="p-2 border border-gray-300 text-center">الوصف</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 border border-gray-300">✅ جيدة</td>
                        <td class="p-2 border border-gray-300 bg-green-500"></td>
                        <td class="p-2 border border-gray-300">لا حاجة للصيانة</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300">🔔 أقل من شهرين</td>
                        <td class="p-2 border border-gray-300 bg-purple-600"></td>
                        <td class="p-2 border border-gray-300">قريب من موعد الصيانة</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300">⚠️ أقل من شهر</td>
                        <td class="p-2 border border-gray-300 bg-yellow-400"></td>
                        <td class="p-2 border border-gray-300">ينصح بالصيانة قريباً</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300">⚠️ أقل من أسبوع</td>
                        <td class="p-2 border border-gray-300 bg-orange-400"></td>
                        <td class="p-2 border border-gray-300">الوقت حرج جداً</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300">❌ متأخرة</td>
                        <td class="p-2 border border-gray-300 bg-red-600"></td>
                        <td class="p-2 border border-gray-300">الصيانة متأخرة</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300">❓ غير معروف</td>
                        <td class="p-2 border border-gray-300 bg-gray-400"></td>
                        <td class="p-2 border border-gray-300">بيانات غير مكتملة</td>
                    </tr>
                </tbody>
            </table>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9b945b32438afb742355861768089b04)): ?>
<?php $attributes = $__attributesOriginal9b945b32438afb742355861768089b04; ?>
<?php unset($__attributesOriginal9b945b32438afb742355861768089b04); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9b945b32438afb742355861768089b04)): ?>
<?php $component = $__componentOriginal9b945b32438afb742355861768089b04; ?>
<?php unset($__componentOriginal9b945b32438afb742355861768089b04); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald489e48d6214ecaf87e4b6a8ce684ad1)): ?>
<?php $attributes = $__attributesOriginald489e48d6214ecaf87e4b6a8ce684ad1; ?>
<?php unset($__attributesOriginald489e48d6214ecaf87e4b6a8ce684ad1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald489e48d6214ecaf87e4b6a8ce684ad1)): ?>
<?php $component = $__componentOriginald489e48d6214ecaf87e4b6a8ce684ad1; ?>
<?php unset($__componentOriginald489e48d6214ecaf87e4b6a8ce684ad1); ?>
<?php endif; ?>
<?php /**PATH /home/osama/Downloads/EduBridge-main/back-end/resources/views/filament/widgets/asset-status-chart.blade.php ENDPATH**/ ?>