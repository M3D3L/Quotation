<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Quotation</title>
      <link rel="stylesheet" href="assets/css/main.css" />
      <link
         rel="stylesheet"
         href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap"
         />
   </head>
   <body class="body">
      <div class="container">
         <!-- Header -->
         <div class="header">
            <div class="quote-top" id="quote-top"></div>
            <!-- Table Components -->
            <div id="table-desktop" class="hide-on-mobile"></div>
            <ul id="table-card" class="table-card hide-on-desktop"></ul>
            <!-- Description -->
            <div class="description">
               <p><strong>Description:</strong></p>
               <p id="description"></p>
            </div>
            <!-- Cost Breakdown -->
            <div id="breakdown-desktop" class="hide-on-mobile"></div>
            <div class="breakdown-container">
               <!-- Breakdown List -->
               <ul id="breakdown-list" class="breakdown-list hide-on-desktop"></ul>
               <!-- Total Card -->
               <div class="total-card" id="total-card"></div>
            </div>
            <!-- Footer -->
            <div class="footer">
               <p>Thank you for your business!</p>
               <p>
                  If you have any questions about this quotation, please contact us at
                  855-393-8950.
               </p>
            </div>
         </div>
      </div>
      <script type="module">
         import { renderClientInfoSection } from "./assets/js/clientInfoSection.js";
         import { renderUnitCards } from "./assets/js/unitCard.js";
         import { renderDescriptionSection } from "./assets/js/descriptionSection.js";
         import { renderBreakdownCards } from "./assets/js/breakdownCard.js";
         import { renderTotalCostCard } from "./assets/js/totalCostCard.js";
         import { renderDynamicTable } from "./assets/js/dynamicTable.js";
         
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
         renderClientInfoSection("quote-top", clientData);
         renderUnitCards("table-card", tableData);
         renderDynamicTable("table-desktop", tableData);
         renderDescriptionSection("description", description);
         renderBreakdownCards("breakdown-list", breakdownData);
         renderDynamicTable("breakdown-desktop", breakdownData);
         renderTotalCostCard("total-card", breakdownData);
         });
      </script>
   </body>
</html>