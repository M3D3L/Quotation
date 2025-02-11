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
         <main class="main">
            <header id="client-info-section" class="quote-top"></header>
            <!-- Table Components -->
            <div id="dynamic-table-desktop" class="hide-on-mobile"></div>
            <ul id="unit-cards" class="table-card hide-on-desktop"></ul>
            <!-- Description -->
            <div class="description">
               <p><strong>Description:</strong></p>
               <p id="description-section"></p>
            </div>
            <!-- Cost Breakdown -->
            <div id="breakdown-table-desktop" class="hide-on-mobile"></div>
            <div class="breakdown-container">
               <!-- Breakdown List -->
               <ul id="breakdown-cards" class="breakdown-list hide-on-desktop"></ul>
               <!-- Total Card -->
               <div id="total-cost-card" class="total-card"></div>
            </div>
            <!-- Footer -->
            <footer class="footer">
               <p>Thank you for your business!</p>
               <p>
                  If you have any questions about this quotation, please contact us at
                  855-393-8950.
               </p>
            </footer>
         </main>
      </div>
      <script type="module">
         import { renderClientInfoSection } from "./assets/js/components/clientInfoSection.js";
         import { renderUnitCards } from "./assets/js/components/unitCard.js";
         import { renderDescriptionSection } from "./assets/js/components/descriptionSection.js";
         import { renderBreakdownCards } from "./assets/js/components/breakdownCard.js";
         import { renderTotalCostCard } from "./assets/js/components/totalCostCard.js";
         import { renderDynamicTable } from "./assets/js/components/dynamicTable.js";
         
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