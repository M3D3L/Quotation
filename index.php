<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quotation</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap">
</head>
<body class="body">
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="quote-top" id="quote-top"></div>
            <!-- Table Card -->
            <ul id="table-card" class="table-card"></ul>
            <!-- Description -->
            <div class="description">
                <p><strong>Description:</strong></p>
                <p id="description"></p>
            </div>
            <!-- Cost Breakdown -->
            <div class="breakdown-container">
                <!-- Breakdown List -->
                <ul id="breakdown-list" class="breakdown-list"></ul>

                <!-- Total Card -->
                <div class="total-card" id="total-card"></div>
            </div>
            <!-- Footer -->
            <div class="footer">
                <p>Thank you for your business!</p>
                <p>If you have any questions about this quotation, please contact us at 855-393-8950.</p>
            </div>
        </div>
    </div>

    <script type="module">
        import {
            renderClientInfoSection,
            renderUnitCards,
            renderDescriptionSection,
            renderBreakdownCards,
            renderTotalCostCard,
        } from "./assets/js/components.js";

        // PHP variables passed to JavaScript
        const clientData = {
            address: '<?php echo $clientData["address"]; ?>',
            cityStateZip: '<?php echo $clientData["cityStateZip"]; ?>',
            phone: '<?php echo $clientData["phone"]; ?>',
            quotationDate: '<?php echo $clientData["quotationDate"]; ?>',
            quotationNumber: '<?php echo $clientData["quotationNumber"]; ?>',
            customerId: '<?php echo $clientData["customerId"]; ?>',
            quotationFor: '<?php echo $clientData["quotationFor"]; ?>',
            quotationValidUntil: '<?php echo $clientData["quotationValidUntil"]; ?>',
            preparedBy: '<?php echo $clientData["preparedBy"]; ?>',
            originatingPO: '<?php echo $clientData["originatingPO"]; ?>'
        };

        const description = `<?php echo addslashes($description); ?>`;

        const tableData = <?php echo json_encode($tableData); ?>;

        const breakdownData = <?php echo json_encode($breakdownData); ?>;

        document.addEventListener("DOMContentLoaded", () => {
            // Render client info section
            renderClientInfoSection("quote-top", clientData);
            // Render unit cards
            renderUnitCards("table-card", tableData);
            // Render description section
            renderDescriptionSection("description", description);

            // Render breakdown cards and total cost card
            renderBreakdownCards("breakdown-list", breakdownData);
            renderTotalCostCard("total-card", breakdownData);
        });
    </script>
</body>
</html>

<?php
$clientData = [
    'address' => '105 E. Robinson St Ste.208',
    'cityStateZip' => 'Orlando, FL 32801',
    'phone' => '855-393-8950',
    'quotationDate' => '5/23/2024',
    'quotationNumber' => '52344627',
    'customerId' => '27623929',
    'quotationFor' => 'Sodexo Roth\nJos A Banks 362',
    'quotationValidUntil' => '6/22/2024',
    'preparedBy' => 'John Doe',
    'originatingPO' => '1409539'
];

$description = "On the PO referenced above...";

$tableData = [
    [
        "unit" => "RTU 1",
        "areaServed" => "N/A",
        "manufacturer" => "Carrier",
        "model" => "50HCQA06C2M5A0F1F0",
        "serial" => "2414C87880",
        "year" => "2014",
    ],
    [
        "unit" => "RTU 2",
        "areaServed" => "N/A",
        "manufacturer" => "Carrier",
        "model" => "50HCQA07C1M5A0F1F0",
        "serial" => "2614P87723",
        "year" => "2014",
    ]
];

$breakdownData = [
    [
        "description" => "Labor",
        "unitPrice" => 85.0,
        "quantity" => 2,
        "code" => "L",
        "amount" => 170.0,
    ],
    [
        "description" => "Materials",
        "unitPrice" => 50.0,
        "quantity" => 10,
        "code" => "M",
        "amount" => 500.0,
    ],
    [
        "description" => "Equipment Rental",
        "unitPrice" => 120.0,
        "quantity" => 3,
        "code" => "E",
        "amount" => 360.0,
    ],
    [
        "description" => "Transport",
        "unitPrice" => 75.0,
        "quantity" => 4,
        "code" => "T",
        "amount" => 300.0,
    ],
    [
        "description" => "Subcontractor",
        "unitPrice" => 150.0,
        "quantity" => 2,
        "code" => "SC",
        "amount" => 300.0,
    ],
    [
        "description" => "Permits",
        "unitPrice" => 500.0,
        "quantity" => 1,
        "code" => "P",
        "amount" => 500.0,
    ],
    [
        "description" => "Inspection",
        "unitPrice" => 150.0,
        "quantity" => 1,
        "code" => "I",
        "amount" => 150.0,
    ]
];
?>
