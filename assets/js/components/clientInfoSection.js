export function generateClientInfoSection(client) {
  return `
      <div class="client-info">
         <div>
            <p class="client-address">${client.address}</p>
            <p class="client-city-state-zip">${client.cityStateZip}</p>
            <p class="client-phone">${client.phone}</p>
         </div>
         <div class="quotation-info">
            <h1 class="quotation-title">Quotation</h1>
            <p class="quotation-date"><strong>Date:</strong> ${client.quotationDate}</p>
            <p class="quotation-number"><strong>Quotation #:</strong> ${client.quotationNumber}</p>
            <p class="customer-id"><strong>Customer ID:</strong> ${client.customerId}</p>
         </div>
         <div class="quotation-details">
            <p><strong>Quotation For:</strong></p>
            <p>${client.quotationFor}</p>
            <p class="valid-until"><strong>Quotation valid until:</strong> ${client.quotationValidUntil}</p>
            <p><strong>Prepared by:</strong> ${client.preparedBy}</p>
         </div>
         <div class="originating-po">
            <p><strong>Originating P.O:</strong> ${client.originatingPO}</p>
         </div>
      </div>
    `;
}

export function renderClientInfoSection(containerId, client) {
  const container = document.getElementById(containerId);
  if (container) {
    container.innerHTML = generateClientInfoSection(client);
  }
}
