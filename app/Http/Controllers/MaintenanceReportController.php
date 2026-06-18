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

        // ─── Default font ──────────────────────────────────────
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(11);

        // ─── Section (A4 with margins) ─────────────────────────
        // ─── Section (A4 with margins) ─────────────────────────
        $section = $phpWord->addSection([
            'pageSizeW'    => 11906,  // A4 width in twips
            'pageSizeH'    => 16838,  // A4 height in twips
            'marginTop'    => 600,
            'marginBottom' => 600,
            'marginLeft'   => 800,
            'marginRight'  => 800,
        ]);

        // ─── Styles ────────────────────────────────────────────
        $titleStyle = ['bold' => true, 'size' => 14, 'name' => 'Arial', 'rtl' => true];
        $subtitleStyle = ['bold' => true, 'size' => 10, 'name' => 'Arial'];
        $headerFontAr = ['bold' => true, 'size' => 11, 'name' => 'Arial', 'rtl' => true];
        $headerFontEn = ['bold' => true, 'size' => 9, 'name' => 'Arial'];
        $normalFont = ['size' => 11, 'name' => 'Arial', 'rtl' => true];
        $smallFont = ['size' => 9, 'name' => 'Arial'];
        $boldFont = ['bold' => true, 'size' => 11, 'name' => 'Arial', 'rtl' => true];
        $centerPara = ['alignment' => Jc::CENTER, 'bidi' => true];
        $rtlPara = ['alignment' => Jc::RIGHT, 'bidi' => true];
        $leftPara = ['alignment' => Jc::START, 'bidi' => false];

        $borderStyle = [
            'borderTopSize' => 6, 'borderTopColor' => '000000',
            'borderBottomSize' => 6, 'borderBottomColor' => '000000',
            'borderLeftSize' => 6, 'borderLeftColor' => '000000',
            'borderRightSize' => 6, 'borderRightColor' => '000000',
        ];

        $headerCellStyle = array_merge($borderStyle, [
            'bgColor' => 'D9D9D9',
            'valign' => 'center',
        ]);

        $cellStyle = array_merge($borderStyle, [
            'valign' => 'center',
        ]);

        $fullWidth = 10300; // total table width in twips

        // ═══════════════════════════════════════════════════════
        // HEADER: Logos + Title
        // ═══════════════════════════════════════════════════════
        $headerTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);

        $headerTable->addRow(1200);

        // Republic Emblem (left side in RTL) - added first so it appears on the left
        $republicLogoPath = public_path('images/logos/republic_emblem.jpg');
        $leftCell = $headerTable->addCell(2500, ['valign' => 'center']);
        if (file_exists($republicLogoPath)) {
            $leftCell->addImage($republicLogoPath, [
                'width' => 70,
                'height' => 55,
                'alignment' => Jc::CENTER,
            ]);
        }

        // Title (center)
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

        // Ministry Logo (right side in RTL) - added third so it appears on the right
        $ministryLogoPath = public_path('images/logos/ministry_logo.jpg');
        $rightCell = $headerTable->addCell(2500, ['valign' => 'center']);
        if (file_exists($ministryLogoPath)) {
            $rightCell->addImage($ministryLogoPath, [
                'width' => 80,
                'height' => 80,
                'alignment' => Jc::CENTER,
            ]);
        }

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 1: Main Data (البيانات الأساسية)
        // ═══════════════════════════════════════════════════════
        $mainDataHeader = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 30,
            'bidiVisual' => true,
        ]);
        $mainDataHeader->addRow(350);
        $mdCell = $mainDataHeader->addCell($fullWidth, array_merge($headerCellStyle, ['gridSpan' => 1]));
        $mdCell->addText('البيانات الأساسية    Main data', $headerFontAr, $centerPara);

        $mainTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);

        // Row 1: Division / القطاع/الإدارة العامة
        $mainTable->addRow(400);
        $c1 = $mainTable->addCell($fullWidth, $cellStyle);
        $sectorName = $record->asset?->department?->administration?->sector?->name ?? '—';
        $adminName = $record->asset?->department?->administration?->name ?? '—';
        $c1->addText(
            "القطاع/الإدارة العامة:  {$sectorName} / {$adminName}",
            $normalFont,
            $rtlPara
        );

        // Row 2: Office / المكتب
        $mainTable->addRow(400);
        $c2 = $mainTable->addCell($fullWidth, $cellStyle);
        $officeName = $record->asset?->department?->name ?? '—';
        $c2->addText(
            "المكتب:  {$officeName}",
            $normalFont,
            $rtlPara
        );

        // Row 3: Date / التاريخ
        $mainTable->addRow(400);
        $c3 = $mainTable->addCell($fullWidth, $cellStyle);
        $dateStr = $record->problem_date ? $record->problem_date->format('Y/m/d') : '—';
        $c3->addText(
            "التاريخ:  {$dateStr}",
            $normalFont,
            $rtlPara
        );

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 2: Failure Information (معلومات العطل)
        // ═══════════════════════════════════════════════════════
        $failHeader = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 30,
            'bidiVisual' => true,
        ]);
        $failHeader->addRow(350);
        $fhCell = $failHeader->addCell($fullWidth, $headerCellStyle);
        $fhCell->addText('معلومات العطل    Failure Information', $headerFontAr, $centerPara);

        $failTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 30,
            'bidiVisual' => true,
        ]);

        // Determine the asset type for checkbox
        $assetTypeName = $record->asset?->assetType?->name ?? '';
        $assetName = $record->asset?->name ?? '';

        // Failure type checkboxes row
        $failTable->addRow(500);

        $types = [
            ['العطل', 'Failure'],
            ['برامج', 'Software'],
            ['جهاز كمبيوتر', 'PC'],
            ['شبكة', 'Network'],
            ['طابعة', 'Printer'],
            ['أخرى', 'Other'],
        ];

        foreach ($types as $type) {
            $cell = $failTable->addCell(intval($fullWidth / 6), $cellStyle);
            $cell->addText($type[0] . ' - ' . $type[1], $smallFont, $centerPara);
        }

        // Checkmarks row
        $failTable->addRow(400);
        foreach ($types as $type) {
            $cell = $failTable->addCell(intval($fullWidth / 6), $cellStyle);
            // Try to match asset type
            $checked = false;
            $lowerType = mb_strtolower($type[0]);
            $lowerAsset = mb_strtolower($assetTypeName . ' ' . $assetName);
            if (mb_strpos($lowerAsset, $lowerType) !== false) {
                $checked = true;
            }
            $cell->addText($checked ? '☑' : '☐', ['size' => 16, 'name' => 'Arial'], $centerPara);
        }

        // Asset type row
        $failTable->addRow(400);
        $assetCell = $failTable->addCell($fullWidth, array_merge($cellStyle, ['gridSpan' => 6]));
        $assetCell->addText(
            "نوع الجهاز:  {$assetTypeName}          اسم الأصل:  {$assetName}",
            $normalFont,
            $rtlPara
        );

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 3: Report of the maintenance technician (تقرير فني الصيانة)
        // ═══════════════════════════════════════════════════════
        $repHeader = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 30,
            'bidiVisual' => true,
        ]);
        $repHeader->addRow(350);
        $rhCell = $repHeader->addCell($fullWidth, $headerCellStyle);
        $rhCell->addText('تقرير فني الصيانة    Report of the maintenance technician', $headerFontAr, $centerPara);

        $repTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);
        $repTable->addRow(1200);
        $repCell = $repTable->addCell($fullWidth, array_merge($cellStyle, ['vMerge' => 'restart']));
        // Show technical_description from external request (التقرير الفني)
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
        // SECTION 4: Recommendation (توصيات في الصيانة)
        // ═══════════════════════════════════════════════════════
        $recHeader = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 30,
            'bidiVisual' => true,
        ]);
        $recHeader->addRow(350);
        $rcCell = $recHeader->addCell($fullWidth, $headerCellStyle);
        $rcCell->addText('توصيات في الصيانة    Recommendation of a maintenance technician', $headerFontAr, $centerPara);

        $recTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);
        $recTable->addRow(1200);
        $recCell = $recTable->addCell($fullWidth, $cellStyle);
        // Show required_parts from external request (توصيات فني الصيانة)
        $recommendation = $record->externalRequest?->required_parts ?? '';
        if (empty($recommendation)) {
            $recommendation = '—';
        }
        $recCell->addText($recommendation, $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 5: Technician Info & Signature
        // ═══════════════════════════════════════════════════════
        $sigTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);

        // Tec. Name row (English added first -> shows left, Arabic second -> shows right)
        $sigTable->addRow(400);
        $nameCell2 = $sigTable->addCell(intval($fullWidth / 2), $cellStyle);
        $techName = $record->employee?->name ?? '..................';
        $nameCell2->addText("Tec. Name:  {$techName}", $normalFont, $leftPara);
        $nameCell1 = $sigTable->addCell(intval($fullWidth / 2), $cellStyle);
        $nameCell1->addText("اسم الفني:  {$techName}", $normalFont, $rtlPara);

        // Date row (English added first -> shows left, Arabic second -> shows right)
        $sigTable->addRow(400);
        $sigDate = $record->updated_at ? $record->updated_at->format('Y/m/d') : '    /    /    ';
        $dateCell2 = $sigTable->addCell(intval($fullWidth / 2), $cellStyle);
        $dateCell2->addText("Date:  {$sigDate}                    Signature: ..................", $normalFont, $leftPara);
        $dateCell1 = $sigTable->addCell(intval($fullWidth / 2), $cellStyle);
        $dateCell1->addText("التاريخ:  {$sigDate}", $normalFont, $rtlPara);

        // Signature label (English added first -> shows left, Arabic second -> shows right)
        $sigTable->addRow(400);
        $sigLabelCell2 = $sigTable->addCell(intval($fullWidth / 2), $cellStyle);
        $sigLabelCell2->addText('', $normalFont, $leftPara);
        $sigLabelCell1 = $sigTable->addCell(intval($fullWidth / 2), $cellStyle);
        $sigLabelCell1->addText('التوقيع: ..................', $normalFont, $rtlPara);

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // SECTION 6: Department Head Signature
        // ═══════════════════════════════════════════════════════
        $deptHead = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);

        $deptHead->addRow(400);
        $dhCell = $deptHead->addCell($fullWidth, $headerCellStyle);
        $dhCell->addText(
            'لاستخدام وحدة الصيانة و الدعم الفني',
            $headerFontAr,
            $centerPara
        );

        $deptHead->addRow(350);
        $dhCell2 = $deptHead->addCell($fullWidth, $headerCellStyle);
        $dhCell2->addText(
            'To use the Department of Maintenance and Technical Support',
            $headerFontEn,
            ['alignment' => Jc::CENTER]
        );

        $deptSig = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);

        $deptSig->addRow(600);
        $dsCell = $deptSig->addCell($fullWidth, $cellStyle);
        $dsCell->addText(
            'توقيع رئيس وحدة الصيانة والدعم الفني',
            $normalFont,
            $centerPara
        );
        $dsCell->addText(
            'Signature of Director of Department of Maintenance and Technical Support',
            $smallFont,
            ['alignment' => Jc::CENTER]
        );

        // Date for director
        $deptSig->addRow(400);
        $dirDateCell = $deptSig->addCell($fullWidth, $cellStyle);
        $dirDate = now()->format('Y/m/d');
        $dirDateCell->addText(
            "التاريخ:  {$dirDate}",
            $normalFont,
            $rtlPara
        );

        $section->addTextBreak(1);

        // ═══════════════════════════════════════════════════════
        // FOOTER: Website & Email
        // ═══════════════════════════════════════════════════════
        $footerTable = $section->addTable([
            'alignment' => Jc::CENTER,
            'cellMargin' => 50,
            'bidiVisual' => true,
        ]);

        $footerTable->addRow(300);
        $fc1 = $footerTable->addCell(intval($fullWidth / 2), $borderStyle);
        $fc1->addText('Website: www.moheye.net', $smallFont, $leftPara);
        $fc2 = $footerTable->addCell(intval($fullWidth / 2), $borderStyle);
        $fc2->addText('E-Mail: mohesr.it.ye@gmail.com', $smallFont, $rtlPara);

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
