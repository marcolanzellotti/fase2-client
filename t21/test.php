<?php
header('Content-type: application/excel');
$filename = 'filename.xls';
header('Content-Disposition: attachment; filename=' . $filename);

$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>

<body>
   <table><tr><td style="background: red;padding:1em;width:100px;">Cell 1</td><td>Cell 2</td></tr></table>
</body></html>';

echo $data;
