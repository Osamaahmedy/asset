<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\Cell;

class MaintenanceReportController extends Controller
{
    public function export($id)
    {
        $record = MaintenanceRequest::with([
            'asset.department.administration.sector',
            'asset.assetType',
            'asset.employee',
            'employee',
            'externalRequest',
        ])->findOrFail($id);

        \PhpOffice\PhpWord\Settings::setDefaultRtl(true);
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);

        $phpWord = new PhpWord();

        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(11);

        $section = $phpWord->addSection([
            'pageSizeW'    => 11906,
            'pageSizeH'    => 16838,
            'marginTop'    => 600,
            'marginBottom' => 600,
            'marginLeft'   => 800,
            'marginRight'  => 800,
        ]);

        $titleStyle      = ['bold' => true, 'size' => 14, 'name' => 'Arial', 'rtl' => true];
        $subtitleStyle   = ['bold' => true, 'size' => 10, 'name' => 'Arial'];
        $headerFontAr    = ['bold' => true, 'size' => 11, 'name' => 'Arial', 'rtl' => true];
        $headerFontEn    = ['bold' => true, 'size' => 9,  'name' => 'Arial'];
        $normalFont      = ['size' => 11, 'name' => 'Arial', 'rtl' => true];
        $smallFont       = ['size' => 9,  'name' => 'Arial'];
        $boldFont        = ['bold' => true, 'size' => 11, 'name' => 'Arial', 'rtl' => true];
        $centerPara      = ['alignment' => Jc::CENTER, 'bidi' => true];
        $rtlPara         = ['alignment' => Jc::RIGHT,  'bidi' => true];
        $leftPara        = ['alignment' => Jc::START,  'bidi' => false];

        $borderStyle = [
            'borderTopSize'    => 6, 'borderTopColor'    => '000000',
            'borderBottomSize' => 6, 'borderBottomColor' => '000000',
            'borderLeftSize'   => 6, 'borderLeftColor'   => '000000',
            'borderRightSize'  => 6, 'borderRightColor'  => '000000',
        ];

        $headerCellStyle = array_merge($borderStyle, ['bgColor' => 'D9D9D9', 'valign' => 'center']);
        $cellStyle       = array_merge($borderStyle, ['valign' => 'center']);

        $fullWidth = 10300;

        // ═══════════════════════════════════════════════════════
        // HEADER: Logos + Title
        // ═══════════════════════════════════════════════════════
        $headerTable = $section->addTable([
            'alignment'  => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);
        $headerTable->addRow(1200);

        $republicLogoPath = public_path('images/logos/republic_emblem.jpg');
        $leftCell = $headerTable->addCell(2500, ['valign' => 'center']);
        if (file_exists($republicLogoPath)) {
            $leftCell->addImage($republicLogoPath, ['width' => 70, 'height' => 55, 'alignment' => Jc::CENTER]);
        }

        $centerCell = $headerTable->addCell(5300, ['valign' => 'center']);
        $centerCell->addText(
            'تقرير صيانة أجهزة الحاسب الآلي وملحقاتها',
            ['bold' => true, 'size' => 13, 'name' => 'Arial', 'rtl' => true],
            $centerPara
        );
        $centerCell->addText(
            'Report for maintenance of a computer and its peripherals',
            ['bold' => true, 'size' => 9, 'name' => 'Arial'],
            ['alignment' => Jc::CENTER]
        );

        $ministryLogoPath = public_path('images/logos/ministry_logo.jpg');
        $rightCell = $headerTable->addCell(2500, ['valign' => 'center']);
        if (file_exists($ministryLogoPath)) {
            $rightCell->addImage($ministryLogoPath, ['width' => 80, 'height' => 80, 'alignment' => Jc::CENTER]);
        }

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 1: Main Data
        // ═══════════════════════════════════════════════════════
        $mainDataHeader = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 30, 'bidiVisual' => true]);
        $mainDataHeader->addRow(350);
        $mainDataHeader->addCell($fullWidth, $headerCellStyle)->addText('البيانات الأساسية    Main data', $headerFontAr, $centerPara);

        $mainTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);

        $mainTable->addRow(400);
        $sectorName = $record->asset?->department?->administration?->sector?->name ?? '—';
        $adminName  = $record->asset?->department?->administration?->name ?? '—';
        $mainTable->addCell($fullWidth, $cellStyle)->addText("القطاع/الإدارة العامة:  {$sectorName} / {$adminName}", $normalFont, $rtlPara);

        $mainTable->addRow(400);
        $officeName = $record->asset?->department?->name ?? '—';
        $mainTable->addCell($fullWidth, $cellStyle)->addText("المكتب:  {$officeName}", $normalFont, $rtlPara);

        $mainTable->addRow(400);
        $dateStr = $record->problem_date ? $record->problem_date->format('Y/m/d') : '—';
        $mainTable->addCell($fullWidth, $cellStyle)->addText("التاريخ:  {$dateStr}", $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 2: Failure Information
        // ═══════════════════════════════════════════════════════
        $failHeader = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 30, 'bidiVisual' => true]);
        $failHeader->addRow(350);
        $failHeader->addCell($fullWidth, $headerCellStyle)->addText('معلومات العطل    Failure Information', $headerFontAr, $centerPara);

        $failTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 30, 'bidiVisual' => true]);

        $assetTypeName = $record->asset?->assetType?->name ?? '';
        $assetName     = $record->asset?->name ?? '';

        $types = [
            ['العطل', 'Failure'],
            ['برامج', 'Software'],
            ['جهاز كمبيوتر', 'PC'],
            ['شبكة', 'Network'],
            ['طابعة', 'Printer'],
            ['أخرى', 'Other'],
        ];

        $failTable->addRow(500);
        foreach ($types as $type) {
            $failTable->addCell(intval($fullWidth / 6), $cellStyle)
                      ->addText($type[0] . ' - ' . $type[1], $smallFont, $centerPara);
        }

        $failTable->addRow(400);
        foreach ($types as $type) {
            $cell    = $failTable->addCell(intval($fullWidth / 6), $cellStyle);
            $checked = mb_strpos(mb_strtolower($assetTypeName . ' ' . $assetName), mb_strtolower($type[0])) !== false;
            $cell->addText($checked ? '☑' : '☐', ['size' => 16, 'name' => 'Arial'], $centerPara);
        }

        $failTable->addRow(400);
        $failTable->addCell($fullWidth, array_merge($cellStyle, ['gridSpan' => 6]))
                  ->addText("نوع الجهاز:  {$assetTypeName}          اسم الأصل:  {$assetName}", $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 3: Report of the maintenance technician
        // ═══════════════════════════════════════════════════════
        $repHeader = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 30, 'bidiVisual' => true]);
        $repHeader->addRow(350);
        $repHeader->addCell($fullWidth, $headerCellStyle)->addText('تقرير فني الصيانة    Report of the maintenance technician', $headerFontAr, $centerPara);

        $repTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);
        $repTable->addRow(1200);
        $repCell        = $repTable->addCell($fullWidth, $cellStyle);
        $techDescription = $record->externalRequest?->technical_description ?? $record->problem_description ?? '—';
        $repCell->addText($techDescription, $normalFont, $rtlPara);
        if ($record->supervisor_note) {
            $repCell->addTextBreak(1);
            $repCell->addText('ملاحظات المشرف: ' . $record->supervisor_note, $smallFont, $rtlPara);
        }
        if ($record->it_note) {
            $repCell->addTextBreak(1);
            $repCell->addText('ملاحظات تقنية المعلومات: ' . $record->it_note, $smallFont, $rtlPara);
        }

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 4: Recommendation
        // ═══════════════════════════════════════════════════════
        $recHeader = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 30, 'bidiVisual' => true]);
        $recHeader->addRow(350);
        $recHeader->addCell($fullWidth, $headerCellStyle)->addText('توصيات في الصيانة    Recommendation of a maintenance technician', $headerFontAr, $centerPara);

        $recTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);
        $recTable->addRow(1200);
        $recommendation = $record->externalRequest?->required_parts ?? '—';
        $recTable->addCell($fullWidth, $cellStyle)->addText($recommendation ?: '—', $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 5: Technician Info & Signature
        // ═══════════════════════════════════════════════════════
        $sigTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);

        // اسم فني الصيانة (ثابت) + اسم صاحب الطلب (من الداتابيز)
        $technicianName  = 'سامر صالح احمد الدابيه'; // ثابت
        $requesterName   = $record->employee?->name ?? '..................';

        // Row: اسم الفني (ثابت) | اسم صاحب الطلب (من الداتابيز)
        $sigTable->addRow(400);
        $sigTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("Tec. Name:  {$technicianName}", $normalFont, $leftPara);
        $sigTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("اسم الفني:  {$technicianName}", $normalFont, $rtlPara);

        // Row: التاريخ
        $sigDate = $record->updated_at ? $record->updated_at->format('Y/m/d') : '    /    /    ';
        $sigTable->addRow(400);
        $sigTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("Date:  {$sigDate}", $normalFont, $leftPara);
        $sigTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("التاريخ:  {$sigDate}", $normalFont, $rtlPara);

        // Row: التوقيع
        $sigTable->addRow(400);
        $sigTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText('Signature: ..................', $normalFont, $leftPara);
        $sigTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText('التوقيع: ..................', $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 6: صاحب الطلب (Requester)
        // ═══════════════════════════════════════════════════════
        $reqHeader = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 30, 'bidiVisual' => true]);
        $reqHeader->addRow(350);
        $reqHeader->addCell($fullWidth, $headerCellStyle)
                  ->addText('بيانات صاحب الطلب    Requester Information', $headerFontAr, $centerPara);

        $reqTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);

        // Row: اسم صاحب الطلب
        $reqTable->addRow(400);
        $reqTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("Requester Name:  {$requesterName}", $normalFont, $leftPara);
        $reqTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("اسم صاحب الطلب:  {$requesterName}", $normalFont, $rtlPara);

        // Row: التاريخ
        $reqTable->addRow(400);
        $reqTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("Date:  {$sigDate}", $normalFont, $leftPara);
        $reqTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText("التاريخ:  {$sigDate}", $normalFont, $rtlPara);

        // Row: التوقيع
        $reqTable->addRow(400);
        $reqTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText('Signature: ..................', $normalFont, $leftPara);
        $reqTable->addCell(intval($fullWidth / 2), $cellStyle)
                 ->addText('التوقيع: ..................', $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 7: Department Head Signature
        // ═══════════════════════════════════════════════════════
        $deptHead = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);

        $deptHead->addRow(400);
        $deptHead->addCell($fullWidth, $headerCellStyle)
                 ->addText('لاستخدام وحدة الصيانة و الدعم الفني', $headerFontAr, $centerPara);

        $deptHead->addRow(350);
        $deptHead->addCell($fullWidth, $headerCellStyle)
                 ->addText('To use the Department of Maintenance and Technical Support', $headerFontEn, ['alignment' => Jc::CENTER]);

        $deptSig = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);

        $deptSig->addRow(600);
        $dsCell = $deptSig->addCell($fullWidth, $cellStyle);
        $dsCell->addText('توقيع رئيس وحدة الصيانة والدعم الفني', $normalFont, $centerPara);
        $dsCell->addText('Signature of Director of Department of Maintenance and Technical Support', $smallFont, ['alignment' => Jc::CENTER]);

        $deptSig->addRow(400);
        $dirDate = now()->format('Y/m/d');
        $deptSig->addCell($fullWidth, $cellStyle)
                ->addText("التاريخ:  {$dirDate}", $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // FOOTER
        // ═══════════════════════════════════════════════════════
        $footerTable = $section->addTable(['alignment' => Jc::CENTER, 'cellMargin' => 50, 'bidiVisual' => true]);
        $footerTable->addRow(300);
        $footerTable->addCell(intval($fullWidth / 2), $borderStyle)
                    ->addText('Website: www.moheye.net', $smallFont, $leftPara);
        $footerTable->addCell(intval($fullWidth / 2), $borderStyle)
                    ->addText('E-Mail: mohesr.it.ye@gmail.com', $smallFont, $rtlPara);

        // ─── Generate & Download ───────────────────────────────
        $fileName = 'تقرير_الصيانة_ رقم_' . $record->id . '.docx';
        $tempPath = storage_path('app/' . $fileName);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempPath);

        if (ob_get_level()) {
            ob_end_clean();
        }

        return response()->download($tempPath, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ])->deleteFileAfterSend(true);
    }
}
