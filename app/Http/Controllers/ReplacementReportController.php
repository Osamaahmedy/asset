<?php

namespace App\Http\Controllers;

use App\Models\AssetReplacementRequest;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Table as TableStyle;

class ReplacementReportController extends Controller
{
    // ── أبعاد ثابتة (DXA) ──────────────────────────────────
    private int $fullWidth = 9906;
    private int $labelW    = 3000;  // عمود التسمية (يمين)

    public function export($id)
    {
        $record = AssetReplacementRequest::with([
            'asset.department.administration.sector',
            'asset.assetType',
            'asset.location',
            'asset.employee',
            'requester',
            'approver',
            'targetLocation',
        ])->findOrFail($id);

        \PhpOffice\PhpWord\Settings::setDefaultRtl(true);
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);

        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(10);

        $section = $phpWord->addSection([
            'pageSizeW'    => 11906,
            'pageSizeH'    => 16838,
            'marginTop'    => 500,
            'marginBottom' => 500,
            'marginLeft'   => 700,
            'marginRight'  => 700,
            'bidi'         => true,
        ]);

        // ─── أنماط الخطوط ──────────────────────────────────
        $titleFont    = ['bold' => true,  'size' => 13, 'name' => 'Arial', 'rtl' => true];
        $subtitleFont = ['bold' => true,  'size' => 9,  'name' => 'Arial'];
        $headerFont   = ['bold' => true,  'size' => 10, 'name' => 'Arial', 'rtl' => true];
        $labelFont    = ['bold' => true,  'size' => 9.5, 'name' => 'Arial', 'rtl' => true];
        $valueFont    = ['size' => 9.5, 'name' => 'Arial', 'rtl' => true];
        $smallFont    = ['size' => 8.5,  'name' => 'Arial'];

        // ─── أنماط الفقرات ─────────────────────────────────
        $centerRtl = ['alignment' => Jc::CENTER, 'bidi' => true];
        $rightRtl  = ['alignment' => Jc::RIGHT,  'bidi' => true];
        $leftLtr   = ['alignment' => Jc::LEFT,   'bidi' => false];

        // ─── حدود موحدة ────────────────────────────────────
        $border = [
            'borderTopSize'    => 6, 'borderTopColor'    => '999999',
            'borderBottomSize' => 6, 'borderBottomColor' => '999999',
            'borderLeftSize'   => 6, 'borderLeftColor'   => '999999',
            'borderRightSize'  => 6, 'borderRightColor'  => '999999',
        ];

        // رأس القسم: رمادي داكن بدون ألوان صارخة
        $sectionHdrCell = array_merge($border, [
            'bgColor' => '404040',
            'valign'  => 'center',
        ]);
        // خلية التسمية: رمادي فاتح جداً
        $labelCell = array_merge($border, [
            'bgColor' => 'F0F0F0',
            'valign'  => 'center',
        ]);
        // خلية القيمة: بيضاء
        $valueCell = array_merge($border, [
            'bgColor' => 'FFFFFF',
            'valign'  => 'center',
        ]);
        // خلية نص طويل
        $noteCell = array_merge($border, [
            'bgColor' => 'FFFFFF',
            'valign'  => 'top',
        ]);

        $headerFontWhite = array_merge($headerFont, ['color' => 'FFFFFF']);
        $valueW = $this->fullWidth - $this->labelW;
        $rowH   = 340;
        $rowHL  = 600;

        // ═══════════════════════════════════════════════════
        // الترويسة
        // ═══════════════════════════════════════════════════
        $tblOpts = ['alignment' => Jc::CENTER, 'cellMargin' => 60, 'bidiVisual' => true];

        $hdrTbl = $section->addTable($tblOpts);
        $hdrTbl->addRow(1200);

        // الخلية اليمنى: شعار الجمهورية
        $republicLogoPath = public_path('images/logos/republic_emblem.jpg');
        $c1 = $hdrTbl->addCell(2200, ['valign' => 'center']);
        if (file_exists($republicLogoPath)) {
            $c1->addImage($republicLogoPath, ['width' => 80, 'height' => 65, 'alignment' => Jc::CENTER]);
        } else {
            $c1->addText('الجمهورية اليمنية', $labelFont, $centerRtl);
        }

        // الخلية الوسطى: العنوان
        $c2 = $hdrTbl->addCell(5506, ['valign' => 'center']);
        $c2->addText('طلب استبدال أصل', $titleFont, $centerRtl);
        $c2->addText('Asset Replacement Request', $subtitleFont, ['alignment' => Jc::CENTER]);
        $c2->addText('رقم: ' . str_pad($record->id, 5, '0', STR_PAD_LEFT), $labelFont, $centerRtl);

        // الخلية اليسرى: شعار الوزارة
        $ministryLogoPath = public_path('images/logos/ministry_logo.jpg');
        $c3 = $hdrTbl->addCell(2200, ['valign' => 'center']);
        if (file_exists($ministryLogoPath)) {
            $c3->addImage($ministryLogoPath, ['width' => 80, 'height' => 80, 'alignment' => Jc::CENTER]);
        } else {
            $c3->addText('وزارة التعليم', $labelFont, $centerRtl);
        }

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════
        // القسم 1: بيانات الطلب
        // ═══════════════════════════════════════════════════
        $this->sectionHeader($section, 'بيانات الطلب  |  Request Information', $this->fullWidth, $sectionHdrCell, $headerFontWhite, $centerRtl, $tblOpts);

        $statusText = match ($record->status) {
            'pending'  => 'قيد الانتظار',
            'approved' => 'مقبول',
            'rejected' => 'مرفوض',
            default    => $record->status,
        };
        $reasonText = match ($record->reason) {
            'completely_damaged' => 'تالف نهائياً',
            'expired'            => 'منتهي الصلاحية',
            'other'              => 'أخرى',
            default              => $record->reason ?? '—',
        };

        $reqRows = [
            ['مقدم الطلب',      $record->requester?->name                         ?? '—'],
            ['تاريخ الطلب',     $record->created_at?->format('Y/m/d')             ?? '—'],
            ['حالة الطلب',      $statusText],
            ['سبب الاستبدال',   $reasonText],
            ['الموقع المستهدف', $record->targetLocation?->name                    ?? '—'],
        ];
        $this->dataTable($section, $reqRows, $this->labelW, $valueW, $rowH, $labelCell, $valueCell, $labelFont, $valueFont, $rightRtl, $tblOpts);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════
        // القسم 2: بيانات الأصل
        // ═══════════════════════════════════════════════════
        $this->sectionHeader($section, 'بيانات الأصل  |  Asset Information', $this->fullWidth, $sectionHdrCell, $headerFontWhite, $centerRtl, $tblOpts);

        $assetRows = [
            ['اسم الأصل',          $record->asset?->name                                        ?? '—'],
            ['نوع الأصل',          $record->asset?->assetType?->name                            ?? '—'],
            ['الرقم التسلسلي',     $record->asset?->serial_number                               ?? '—'],
            ['القطاع',             $record->asset?->department?->administration?->sector?->name ?? '—'],
            ['الإدارة',            $record->asset?->department?->administration?->name          ?? '—'],
            ['المكتب / القسم',     $record->asset?->department?->name                          ?? '—'],
            ['الموقع الحالي',      $record->asset?->location?->name                            ?? '—'],
            ['حالة الأصل',         $record->asset?->status                                     ?? '—'],
            ['السعر (ريال)',        $record->asset?->price ? number_format($record->asset->price, 2) : '—'],
        ];
        $this->dataTable($section, $assetRows, $this->labelW, $valueW, $rowH, $labelCell, $valueCell, $labelFont, $valueFont, $rightRtl, $tblOpts);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════
        // القسم 3: الوصف والملاحظات
        // ═══════════════════════════════════════════════════
        $this->sectionHeader($section, 'الوصف والملاحظات  |  Description & Notes', $this->fullWidth, $sectionHdrCell, $headerFontWhite, $centerRtl, $tblOpts);

        $descTbl = $section->addTable(array_merge($tblOpts, ['cellMargin' => 80]));

        // الوصف
        $descTbl->addRow($rowH);
        $descTbl->addCell($this->labelW, $labelCell)->addText('الوصف التفصيلي', $labelFont, $rightRtl);
        $descTbl->addCell($valueW, $labelCell)->addText('', $labelFont, $rightRtl);

        $descTbl->addRow($rowHL);
        $dv = $descTbl->addCell($this->fullWidth, array_merge($noteCell, ['gridSpan' => 2]));
        $dv->addText($record->description ?? '—', $valueFont, $rightRtl);

        // الملاحظات
        $descTbl->addRow($rowH);
        $descTbl->addCell($this->labelW, $labelCell)->addText('ملاحظات إضافية', $labelFont, $rightRtl);
        $descTbl->addCell($valueW, $labelCell)->addText('', $labelFont, $rightRtl);

        $descTbl->addRow($rowHL);
        $nv = $descTbl->addCell($this->fullWidth, array_merge($noteCell, ['gridSpan' => 2]));
        $nv->addText($record->notes ?? '—', $valueFont, $rightRtl);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════
        // القسم 4: قرار الاستبدال
        // ═══════════════════════════════════════════════════
        if ($record->status !== 'pending') {
            $this->sectionHeader($section, 'قرار الاستبدال  |  Replacement Decision', $this->fullWidth, $sectionHdrCell, $headerFontWhite, $centerRtl, $tblOpts);

            $decRows = [
                ['القرار',               $statusText],
                ['المسؤول عن القرار',    $record->approver?->name                    ?? '—'],
                ['تاريخ القرار',         $record->actioned_at?->format('Y/m/d H:i')  ?? '—'],
            ];
            if ($record->status === 'rejected' && $record->rejection_reason) {
                $decRows[] = ['سبب الرفض', $record->rejection_reason];
            }
            $this->dataTable($section, $decRows, $this->labelW, $valueW, $rowH, $labelCell, $valueCell, $labelFont, $valueFont, $rightRtl, $tblOpts);

            $section->addTextBreak(1);
        }

        // ═══════════════════════════════════════════════════
        // القسم 5: التوقيعات
        // ═══════════════════════════════════════════════════
        $this->sectionHeader($section, 'التوقيعات  |  Signatures', $this->fullWidth, $sectionHdrCell, $headerFontWhite, $centerRtl, $tblOpts);

        $half   = intdiv($this->fullWidth, 2);
        $sigTbl = $section->addTable(array_merge($tblOpts, ['cellMargin' => 80]));

        // صف العناوين: المسؤول المعتمد أولاً (يسار) ثم مقدم الطلب ثانياً (يمين)
        $sigTbl->addRow($rowH);
        $sigTbl->addCell($half, $labelCell)->addText('المسؤول المعتمد', $labelFont, $centerRtl);
        $sigTbl->addCell($half, $labelCell)->addText('مقدم الطلب', $labelFont, $centerRtl);

        // صف الأسماء: المسؤول المعتمد أولاً (يسار) ثم مقدم الطلب ثانياً (يمين)
        $sigTbl->addRow($rowH);
        $sigTbl->addCell($half, $valueCell)->addText($record->approver?->name  ?? '..................', $valueFont, $centerRtl);
        $sigTbl->addCell($half, $valueCell)->addText($record->requester?->name ?? '..................', $valueFont, $centerRtl);

        // صف التوقيع (مساحة فارغة)
        $sigTbl->addRow(500);
        $sigTbl->addCell($half, $valueCell)->addText('التوقيع: ................................', $valueFont, $rightRtl);
        $sigTbl->addCell($half, $valueCell)->addText('التوقيع: ................................', $valueFont, $rightRtl);

        // صف التاريخ: المسؤول المعتمد أولاً (يسار) ثم مقدم الطلب ثانياً (يمين)
        $sigTbl->addRow($rowH);
        $sigTbl->addCell($half, $valueCell)->addText('التاريخ: ' . ($record->actioned_at?->format('Y/m/d') ?? '    /    /    '), $valueFont, $rightRtl);
        $sigTbl->addCell($half, $valueCell)->addText('التاريخ: ' . ($record->created_at?->format('Y/m/d')   ?? '    /    /    '), $valueFont, $rightRtl);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════
        // التذييل
        // ═══════════════════════════════════════════════════
        $ftTbl = $section->addTable(array_merge($tblOpts, ['cellMargin' => 40]));
        $ftTbl->addRow(280);
        $ftTbl->addCell($half, $border)->addText('Website: www.moheye.net',       $smallFont, $leftLtr);
        $ftTbl->addCell($half, $border)->addText('E-Mail: mohesr.it.ye@gmail.com', $smallFont, $rightRtl);

        // ─── حفظ وتنزيل ────────────────────────────────────
        $fileName = 'طلب_استبدال_' . str_pad($record->id, 5, '0', STR_PAD_LEFT) . '.docx';
        $tempPath = storage_path('app/' . $fileName);

        IOFactory::createWriter($phpWord, 'Word2007')->save($tempPath);

        if (ob_get_level()) {
            ob_end_clean();
        }

        return response()->download($tempPath, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ])->deleteFileAfterSend(true);
    }

    // ──────────────────────────────────────────────────────
    // Helpers
    // ──────────────────────────────────────────────────────

    /** رأس قسم بخلفية داكنة */
    private function sectionHeader($section, string $text, int $width, array $cellStyle, array $fontStyle, array $paraStyle, array $tblOpts): void
    {
        $tbl  = $section->addTable(array_merge($tblOpts, ['cellMargin' => 60]));
        $tbl->addRow(370);
        $tbl->addCell($width, $cellStyle)->addText($text, $fontStyle, $paraStyle);
    }

    /**
     * جدول بيانات ثنائي الأعمدة مع تقسيمها إلى 4 أعمدة مضغوطة
     * الترتيب الصحيح RTL: التسمية يمين (تُضاف أولاً) ← القيمة يسار
     */
    private function dataTable(
        $section,
        array $rows,
        int $labelW,
        int $valueW,
        int $rowH,
        array $labelCell,
        array $valueCell,
        array $labelFont,
        array $valueFont,
        array $paraStyle,
        array $tblOpts
    ): void {
        $tbl = $section->addTable(array_merge($tblOpts, ['cellMargin' => 60]));
        
        // تقسيم البيانات إلى أزواج (كل زوج يمثل عمودين: التسمية والقيمة)
        $chunked = array_chunk($rows, 2);
        
        $lW = 1600;
        $vW = 3353;
        
        foreach ($chunked as $rowPairs) {
            $tbl->addRow($rowH);
            
            if (count($rowPairs) === 2) {
                $p1 = $rowPairs[0];
                $p2 = $rowPairs[1];
                
                // في bidiVisual الخلية المضافة أولاً تظهر يساراً.
                // لذا للحصول على الترتيب RTL (الزوج الأول يميناً والثاني يساراً):
                // نضيف الزوج الثاني أولاً: [القيمة] ثم [التسمية]
                $tbl->addCell($vW, $valueCell)->addText((string)$p2[1], $valueFont, $paraStyle);
                $tbl->addCell($lW, $labelCell)->addText($p2[0] . ':', $labelFont, $paraStyle);
                
                // ثم نضيف الزوج الأول: [القيمة] ثم [التسمية]
                $tbl->addCell($vW, $valueCell)->addText((string)$p1[1], $valueFont, $paraStyle);
                $tbl->addCell($lW, $labelCell)->addText($p1[0] . ':', $labelFont, $paraStyle);
            } else {
                $p1 = $rowPairs[0];
                
                // إذا كان هناك زوج واحد متبقي، نترك المساحة اليسرى فارغة (مدمجة)
                $tbl->addCell($vW + $lW, $valueCell)->addText('', $valueFont, $paraStyle);
                $tbl->addCell($vW, $valueCell)->addText((string)$p1[1], $valueFont, $paraStyle);
                $tbl->addCell($lW, $labelCell)->addText($p1[0] . ':', $labelFont, $paraStyle);
            }
        }
    }
}